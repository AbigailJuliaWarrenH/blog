<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
