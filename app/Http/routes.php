<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Route Patterns
|--------------------------------------------------------------------------
|
*/

Route::pattern('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);
    Route::get('about', ['as' => 'about.index', 'uses' => 'AboutController@index']);
    Route::get('posts', ['as' => 'posts.index', 'uses' => 'PostsController@index']);
    Route::get('posts/create', ['as' => 'posts.create', 'uses' => 'PostsController@create']);
    Route::get('posts/{id}/edit', ['as' => 'posts.edit', 'uses' => 'PostsController@edit']);
    Route::get('posts/{id}', ['as' => 'posts.destroy', 'uses' => 'PostsController@destroy']);
    Route::get('posts/hot', ['as' => 'posts.hot', 'uses' => 'PostsController@hot']);
    Route::get('posts/random', ['as' => 'posts.random', 'uses' => 'PostsController@random']);
    Route::get('posts/{id}', ['as' => 'posts.show', 'uses' => 'PostsController@show']);
});
