<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('sidebars.sidebar2', function($view){
            $view->with('archives', \App\Post::getPostsYearsAndMonths());
        });

        view()->composer('sidebars.sidebar3', function($view){
            $tags = \App\Tag::has('posts')->pluck('name');
            $view->with(compact('tags'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
