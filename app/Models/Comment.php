<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $fillable = [
        'commentable_id', 'commentable_type', 'body','user_id',
    ];

    public function commentable(){

    	return $this->morphTo();
    }

    public function comments(){

    	return $this->morphMany('App\Models\Comment', 'commentable'); 
    }

    public function author(){

        return $this->belongsTo('App\User', 'user_id');
    }
}
