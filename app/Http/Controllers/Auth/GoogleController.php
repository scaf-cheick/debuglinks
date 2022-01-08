<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Socialite;
use Auth;
use Exception;
use App\User;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/account');
     
            }else{

                $otherUser = User::where('email', $user->email)->first();
                if($otherUser){
                    $otherUser->google_id =  $user->id;
                    $otherUser->save();
                    Auth::login($otherUser);  
                }else{
                    $newUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id'=> $user->id,
                        'password' => encrypt('fuckou@12$%!GK3456dummy'),
                        'ref' => uniqid(),
                        'email_verified_at' => date('Y-m-d H:i:s')
                    ]);
                    Auth::login($newUser);
                }
     
                return redirect('/account');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
