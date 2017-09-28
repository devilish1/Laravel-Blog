<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
	//this line will make sure that the data in the database is not saved after the tests
	use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testMonthlySidebarGenerator()
    {

        //given: 2 posts , 1 from this month, 1 from month  before
    	$firstPost = factory(Post::class)->create();
    	$secondPost = factory(Post::class)->create([
    		'created_at' => \Carbon\Carbon::now()->subMonth(rand(0, 1000))
    		]);

        // when: i fetch the archives
    	$posts = Post::getPostsYearsAndMonths();
    	
        //then: i should have an appropriate table
        $this->assertCount(2, $posts);
        $this->assertEquals(
        	[
	        	[
	        		'year' => $firstPost->created_at->year,
	        		'month' => $firstPost->created_at->format('F'),
	        		'published' => 1
	        	],
	        	[
	        		'year' => $secondPost->created_at->year,
	        		'month' => $secondPost->created_at->format('F'),
	        		'published' => 1
	        	]
        	], $posts);
    }
}
