<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {

            $role = Auth::user()->role;

            if ($role == "admin") {

                return $next($request);

            } else {

                return back()->with('error', 'Vous n\'avez pas les droits necessaires pour afficher cette page!');
            }

        } else {
            
            return redirect(route('login'))->with("error", "Veuillez vous connecter");
        }
    }
}
