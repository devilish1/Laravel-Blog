<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    /**
     * Test if we are geting the home page
     *
     * @return void
     */
    public function testHomePageResponse()
    {
        // checking if we get the page 

        $response = $this->get('/'); 

        //dd(request()->url());
        /*if (!$response->isSuccessful()) {
            dd('failed');
        }
        else{
            dd('good');
            
            $response->assertStatus(200);
        }   */
        $response->assertStatus(200);
    }

    /**
     * Test if we can see the name of the blog on the home page
     *
     * @return void
     */
    public function testBlogsHomepageName()
    {
        // checking if we get the page 
        $this->get('/')->assertSee('Awesome');
    }
}
