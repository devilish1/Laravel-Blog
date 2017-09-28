<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'showLast5', 'search']);
    }

    public function index(Request $request = null)
    {
        if ($request !== null && $request->search !== null && $request->search === 'games') {
            #dd($request->search);
            return view('games.bugGame');
        }

        if ($request !== null && $request->search !== null && $request->search === 'catclicker') {
            //dd($request->search);
            return view('games.catClicker');
        }
        if ($request !== null && $request->search !== null) {
            $keywords = explode(" ", $request->search);

            $posts = Post::query();

            foreach ($keywords as $keyword) {
                $posts->Where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('body', 'like', '%' . $keyword . '%');
            }

            $posts = $posts->orderBy('created_at', 'DESC')
                ->paginate(5);

            return view('blogs.last5Posts', compact('posts'));
        }

        $posts = Post::getPostsForYearAndMonth(request('month'), request('year'));
        return view('blogs.last5Posts', compact('posts'));

    }

    public function show($postId = "")
    {
        $post = Post::find($postId);
        #$archives = Post::getPostsYearsAndMonths();

        return view('blogs.showBlog', compact('post'));
    }

    public function showLast5()
    {
        $posts = Post::orderBy('id', 'desc')->take(5)->get();

        return view('blogs.last5Posts', compact('posts'));
    }

    public function create()
    {

        $tags = Tag::get()->pluck('name')->toArray();

        return view('tasks.createpost', compact('tags'));
    }

    public function store(Request $request)
    {

        $post = Post::create([
            'title'   => $request->input('postTitle'),
            'body'    => $request->input('postBody'),
            'user_id' => auth()->id(),
        ]);

        $tagsList = explode(";", $request->input('tags'));

        $tags = Tag::whereIn('name', $tagsList)->get();
        //dd($tags);
        $post->tags()->attach($tags);

        $posts = Post::orderBy('id', 'desc')->take(5)->get();

        session()->flash('message', 'Post created successfully');

        return redirect()->action('PostController@showLast5');
        #return view('blogs.last5Posts', compact('posts'));
    }

}
