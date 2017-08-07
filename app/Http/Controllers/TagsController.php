<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Tag;
use \App\Post;

class TagsController extends Controller
{
    public function showPosts($name){

    	$posts = Tag::where('name', '=', $name)->first()->posts()->get();

    	return view('blogs.last5Posts', compact('posts'));

    }
}
