<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Mail\Welcome;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('registration.create');
    }

    public function store()
    {
    	//validate the form
    	$this->validate(request(), [
    			'name' => 'required|unique:users',
    			'email' => 'required|unique:users|email',
    			'password' => 'required|confirmed'
    		]);
    	//create and save the user
    	$user = User::create(request(['name', 'email', 'password']));
    	//sign in
    	auth()->login($user);

    	//send welcoming email
    	\Mail::to($user)->send(new Welcome);

    	//redirect
    	return redirect()->action('PostController@showLast5');
    }
}
