<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        //if(!$request->session()->has('wechat_user')){

            $user = \App\User::first();

            $request->session()->put('wechat_user', $user);

            //return redirect('/wxLogin');
        //}
        return $next($request);
    }
}
