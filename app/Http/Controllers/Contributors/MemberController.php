<?php

namespace App\Http\Controllers\Contributors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Category;

class MemberController extends Controller
{
    public function home($criteria = null){
        $key=1;
        if(!$criteria || strcmp( $criteria, 'best')==0){
            $members = User::where('role', 'contributor')
                            ->withCount('threads')
                            ->orderBy('threads_count', 'DESC')
                            ->paginate(15);
        }
        else{
                $members = User::where('role', 'contributor')->orderBy('created_at', 'desc')->paginate(15);
                $key=2;
        }
    	//$members = User::where('role', 'contributor')->orderBy('id', 'desc')->paginate(25);
    	$categories = Category::all();

    	return view('contributor.member.home', compact('members', 'categories','key'));
    }

    public function show($ref){

    	$member = User::where('ref', $ref)->firstOrFail();
        $threads = $member->threads()->orderBy('id','DESC')->paginate(25);
    	return view('contributor.member.show', compact('member', 'threads'));

    }

    public function filter(Request $request){
    	$data = $this->validate($request, [
            'criteria' => ['required', 'string'],
        ]);
    	return redirect()->route('member.home',$request->criteria);
    }
}
