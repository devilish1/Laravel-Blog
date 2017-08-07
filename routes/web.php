<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//tasks routesm unrelated to the blog
Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

Route::get('/', 'PostController@index')->name('home');
Route::get('/home', 'PostController@index')->name('home');
Route::get('/posts', 'PostController@showLast5');
Route::get('/posts/create', 'PostController@create');


Route::get('/posts/{postId}', 'PostController@show');
Route::get('/tags/{name}', 'TagsController@showPosts');
Route::get('/cv', function()
	{
		return view('CV.index');
	})->name('cv');

Route::post('/posts', 'PostController@store');

Route::post('/posts/{postId}/comments', 'CommentsController@store');


Auth::routes();
//registration routes
/*
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');*/

Route::get('/php', function() {
	$shortcuts = array("test" => array(	"Start:" => "CTRL+SHIFT+F9",
										"Stop:" => "CTRL+SHIFT+F10",
										"Add Breakpoint:" => "CTRL+F8",
										"Run:" => "CTRL+SHIFT+F5",
										"Step Over:" => "CTRL+SHIFT+F5",
										"Step Into:" => "CTRL+SHIFT+F7",
										"Step Out:" => "CTRL+SHIFT+F8",
										"New file:" => "CTRL+ALT+N",
										"Change number of columns" => "ALT+SHIFT+(1,2,3,4...)")
						);

	return view('php_shortcuts', $shortcuts);
});
