<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;

class CommentController extends Controller
{
    function store (Request $request) {
    	$comment = new Comment;
    	$comment->content = $request->content;
    	$comment->user_id = Auth::id();
    	$comment->post_id = $request->post_id;
    	$comment->save();

    	return redirect()->back();
    }
}
