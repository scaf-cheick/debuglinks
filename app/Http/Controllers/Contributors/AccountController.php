<?php

namespace App\Http\Controllers\Contributors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AccountController extends Controller
{
   
    public function home(){

	    $account = Auth::user();
        $threads = $account->threads()->orderBy('created_at', 'DESC')->paginate(25);
	    return view('contributor.account.home', compact('account', 'threads'));
    }

    public function update(Request $request){

    	$user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string','min:3', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50'],
            'description' => ['nullable', 'string', 'min:5', 'max:180'],
            'password' => ['nullable', 'string', 'min:6','confirmed'],
            'picture' => ['nullable', 'mimes:jpg,jpeg,png,JPG,PNG,JPEG','max:1024'],
        ]);

        if ($validator->fails()) {
            $validator->errors()->add('profilUpdate', 'modal profil edit');
            return back()->withErrors($validator);
        }

        /*
        $data = $this->validate($request, [
            'name' => ['required', 'string','min:3', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50'],
            'description' => ['nullable', 'string', 'min:5', 'max:180'],
            'password' => ['nullable', 'string', 'min:6','confirmed'],
            'picture' => ['nullable', 'mimes:jpg,jpeg,png,JPG,PNG,JPEG','max:1024'],
        ]);
        */

        $imagename = $user->picture;
        if($request->hasfile('picture')){

            $image = $request->file('picture');
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!file_exists('uploads/contributors')){
                mkdir('uploads/contributors',0777,true);       
            }
            $image->move('uploads/contributors',$imagename);

        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description;
        $user->picture = $imagename;
        if(!empty($request->password)){
            $request->password = Hash::make($request->password);
        }

        $user->save();

        $request->session()->flash('status', 'compte modifié avec succès...');
        return redirect()->back();

        //return redirect()->back()->with('status', 'compte modifié avec succès...');
    }
}
