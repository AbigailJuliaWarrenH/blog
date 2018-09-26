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

Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/artists', 'ArtistController@index');
// Route::get('/artists/create', 'ArtistController@create');
// Route::post('/artists', 'ArtistController@store') 	;
// Route::get('/artists/{id}', 'ArtistController@show'); 
// Route::delete('/artists/{id}', 'ArtistController@destroy');
// Route::post('/artists/{id}/edit/', 'ArtistController@edit');
// Route::patch('/artists/{id}', 'ArtistController@update');

Route::post('/posts', 'PostController@store');
Route::delete('/posts/{post_id}', 'PostController@destroy');
Route::get('/posts/category/{category_id}', 'PostController@showCategorizedPosts');
// Route::get('/posts/{post_id}/get_content', 'PostController@getContent');
Route::post('/posts/{post_id}/edit/', 'PostController@edit');
Route::patch('/posts/{post_id}', 'PostController@update');
Route::post('/posts/like', 'PostController@like');
Route::post('/posts/unlike', 'PostController@unlike');

Route::post('/comments', 'CommentController@store');

Route::delete('/comments/{comment_id}', 'CommentController@destroy');
Route::patch('/comments/{comment_id}', 'CommentController@update');
Route::get('/comments/{comment_id}/get_content', 'CommentController@getContent');

Route::post('/images/upload', 'ImageController@store');