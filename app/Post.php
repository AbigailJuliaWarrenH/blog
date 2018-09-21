<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
    function user () {
    	return $this->belongsTo('App\User');
    }

    function category () {
    	return $this->belongsTo('App\Category');
    }

    function comments () {
    	return $this->hasMany('App\Comment');
    }

    function likes() {
    	return $this->belongsToMany('App\User','post_likes');
    }

    function isLikedByAuthUser() {
    	return $this->likes()->where('user_id',Auth::id())->get()->count();
    }
}
