<?php

namespace App\Http\Controllers\Contributors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Category;

class MemberController extends Controller
{
    public function home(){

    	$members = User::where('role', 'contributor')->orderBy('id', 'desc')->paginate(15);
    	$categories = Category::all();

    	return view('contributor.member.home', compact('members', 'categories'));
    }

    public function show($ref){

    	$member = User::where('ref', $ref)->firstOrFail();
        $threads = $member->threads()->paginate(10);
    	return view('contributor.member.show', compact('member', 'threads'));

    }

    public function filter(Request $request){

    	$data = $this->validate($request, [
            'criteria' => ['required', 'string'],
        ]);	

        if(strcmp( $request->criteria, 'best')==0 ){
        	$members = User::where('role', 'contributor')->orderBy('rating', 'desc')->paginate(15);
        }else{
        	$members = User::where('role', 'contributor')->orderBy('created_at', 'desc')->paginate(15);
        }
    	$categories = Category::all();

    	return view('contributor.member.home', compact('members', 'categories'));

    }
}
