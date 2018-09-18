<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostController extends Controller
{
    function store (Request $request) {
    	$post = new Post;
    	$post->title = $request->title;
    	$post->content = $request->content;
    	$post->category_id = $request->category_id;
    	$post->user_id = Auth::id();
    	$post->save();

    	return redirect()->back();
    }

    function showCategorizedPosts ($category_id) {
    	$posts = Post::where('category_id',$category_id)->get();
    	return view('posts.categorized_posts',compact('posts'));
    }
}
