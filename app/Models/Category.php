<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title', 'icone',
    ];

    public function thread(){

        return $this->hasMany('App\Models\Thread');
    }

    public function tags(){

        return $this->hasMany('App\Models\Tag');
    }
}
