<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Tag;
use App\Models\Category;
use App\User;

class WelcomeController extends Controller
{
    public function welcome(){

    	$threads = Thread::orderBy('id','desc')->paginate(30);
        $categories = Category::all();
        $tags = Tag::all();

        $members = User::all()->where('email_verified_at', '!=', null);
        $contributions = Thread::all();

        return view('welcome', compact('threads', 'categories', 'tags','members','contributions'));
    }
}
