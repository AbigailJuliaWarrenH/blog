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
    	$posts = Post::where('category_id',$category_id)->orderBy('created_at','desc')->get();
    	return view('posts.categorized_posts',compact('posts'));
    }

    function destroy ($post_id) {
        $post = Post::find($post_id);
        $post->delete();

        return redirect()->back();
    }

    function getContent ($post_id) {
        $post = Post::find($post_id);
        return $post;
    }

    function update (Request $request, $post_id) {
        $post = Post::find($post_id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        
        return redirect('home');
    }

    function edit (Request $request, $post_id) {
        $post = Post::find($post_id);
        // dd('hi');
        return view('posts.post_edit_form',compact('post'));
    }

    function like (Request $request) {
        $post = Post::find($request->post_id);
        $post->likes()->attach($request->user_id);
    }

    function unlike (Request $request) {
        $post = Post::find($request->post_id);
        $post->likes()->detach($request->user_id);
    }
}
