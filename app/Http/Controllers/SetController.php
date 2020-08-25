<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetController extends Controller
{	
	/**
	 * @Author    Pudding
	 * @DateTime  2020-06-27
	 * @copyright [copyright]
	 * @license   [license]
	 * @version   [设置当前城市]
	 * @param     Request     $request [description]
	 */
    public function setCity(Request $request)
    {
    	if(!$request->code) return json_encode(['code' => -1, 'msg' => '参数错误!']);

    	// 获取到该code的城市
    	$city = \App\City::where('code', $request->code)->first();

    	if(!$city or empty($city)) return json_encode(['code' => -1, 'msg' => '参数错误!']);

    	$request->session()->put('area', ['name' => $city->name, 'code' => $city->code, 'parent' => $city->province->name]);

    	return json_encode(['code' => 1, 'msg' => '设置成功!']);
    }

    /**
     * @Author    Pudding
     * @DateTime  2020-06-27
     * @copyright [copyright]
     * @license   [license]
     * @version   [设置车类型]
     * @param     Request     $request [description]
     */
    public function setCars(Request $request)
    {
    	if(!$request->code) return json_encode(['code' => -1, 'msg' => '参数错误!']);

    	$car = array();

    	if($request->code == "小车"){
    		$car = ['name' => "小车", "code" => 1 ];
    	}

    	if($request->code == "客车"){
    		$car = ['name' => "客车", "code" => 2 ];
    	}

    	if($request->code == "货车"){
    		$car = ['name' => "货车", "code" => 3 ];
    	}

    	if($request->code == "摩托车"){
    		$car = ['name' => "摩托车", "code" => 4 ];
    	}

    	$request->session()->put('cars', $car);

    	return json_encode(['code' => 1, 'msg' => '设置成功!']);
    }
}
