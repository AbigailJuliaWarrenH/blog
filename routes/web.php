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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/posts', 'PostController@store');
Route::delete('/posts/{post_id}', 'PostController@destroy');
Route::get('/posts/category/{category_id}', 'PostController@showCategorizedPosts');
Route::get('/posts/{post_id}/get_content', 'PostController@getContent');
Route::patch('/posts/{post_id}', 'PostController@update');

Route::post('/comments', 'CommentController@store');
Route::delete('/comments/{comment_id}', 'CommentController@destroy');
Route::patch('/comments/{comment_id}', 'CommentController@update');
Route::get('/comments/{comment_id}/get_content', 'CommentController@getContent');