<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SessionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'destroy']);
	}
    public function create()
    {
        //dd('test');
    	//$archives = Post::getPostsYearsAndMonths();
    	return view('auth.login');

    }

    public function store()
    {
    	
    	if(! auth()->attempt(request(['email', 'password'])))
    	{

    		return back()->withErrors([
    				'message' => 'Check your credentials'
    			]);
    	}

    	return redirect()->home();
    }

    public function destroy()
    {
    	auth()->logout();

    	return redirect()->home();
    }
}
