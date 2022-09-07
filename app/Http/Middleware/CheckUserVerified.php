<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use App\Models\User;

class CheckUserVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userId = Session::get('loginId');;
        $user = User::where('id','=', $userId)->first();
        if($user){
            if(Session::has('loginId') && $user->verified == false || $user->verified == null  && (url('/') == $request->url())){
                Session::forget('loginId');
                return redirect('/')->with('fail','You have to log in first.');
            }
    
            if(Session::has('loginId') && $user->verified == false || $user->verified == null && (url('/adminlogin') == $request->url())){
                Session::forget('loginId');
                return redirect('/adminlogin')->with('fail','You have to log in first.'); 
            }
        }
        

        return $next($request);
    }
}