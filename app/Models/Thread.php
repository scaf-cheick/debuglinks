<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'subject', 'link', 'views', 'user_id','category_id','ref','slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function author(){

        return $this->belongsTo('App\User', 'user_id');
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class, 'thread_tag');
    }

    public function category(){

        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function comments(){

        return $this->morphMany('App\Models\Comment', 'commentable'); 
    }
}
