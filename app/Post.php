<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\User;
use \App\Tag;
use Carbon\Carbon;
class Post extends Model
{
   	protected $fillable = ['user_id', 'title', 'body'];

   	public function comments()
    {
    	//first argument is the path to the model
    	//second argument is the child column name
    	//third id is the parent column name
    	//second and third parameters can be omitted, laravel will
    	//automatically look for id in parent and classNameWithSmallALetters_id in child
    	return $this->hasMany(Comment::class);
    	#return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body, $user_id){
		$this->comments()->create(compact('body', 'user_id'));
	}

    public static function getPostsForYearAndMonth($month=NULL, $year=NULL){
        $queryBuilder = Post::latest();

        if($month){
            $queryBuilder->whereMonth('created_at', Carbon::parse($month)->month);

        }
        if($year){
            $queryBuilder->whereYear('created_at', $year);
        }
        
        $posts = $queryBuilder->get();

        return $posts;
    }

    public static function getPostsYearsAndMonths(){
        return static::selectRaw(
                'year(created_at) as year,
                monthname(created_at) as month,
                count(*) published')
                //->orderBy('created_at', 'desc')
                ->groupBy('year', 'month')
                ->get()
                ->sortByDesc(function($product, $key) {return $product['year']*100 + (int)date("m",strtotime($product['month']));})
                ->toArray();

    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
