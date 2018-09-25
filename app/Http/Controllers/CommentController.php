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

        return view('comments.comment',compact('comment'));
    }

    function destroy ($comment_id) {
        $comment = Comment::find($comment_id);
        $comment->delete();
    }

    function getContent ($comment_id) {
        $comment = Comment::find($comment_id);
        return $comment->content;
    }

    function update (Request $request, $comment_id) {
        $comment = Comment::find($comment_id);
        $comment->content = $request->content;
        $comment->save();
    }
}
