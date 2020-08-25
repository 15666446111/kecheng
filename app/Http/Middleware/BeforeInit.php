<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;

class BeforeInit
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

        //if(!$request->session()->has('area')){

            $defaultArea = array('name' => '济南市', 'code' => '370100', 'parent' => '山东省');

            // 如果有用户的信息 并且能够定位
            if($request->session()->has('wechat_user')){

                $city = \App\City::where('name', 'like', '%'.$request->session()->get('wechat_user')->city.'%')->first();

                if(!empty($city)) $defaultArea = array('name' => $city->name, 'code' => $city->code, 'parent' => $city->province->name);

            }

            $request->session()->put('area', $defaultArea);
        //}

        if(!$request->session()->has('cars')){

            $request->session()->put('cars', array('name' => '小车', 'code' => '1'));
            
        }

        return $next($request);
    }
}
