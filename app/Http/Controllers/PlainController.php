<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlainController extends Controller
{

    /**
     * @version [<vector>] [< 科一科四 顺序练习控制器 >]
     */
    public function subject(Request $request)
    {
    	if(!$request->sub) abort(404);

    	if($request->sub != "1" && $request->sub != "4") abort(404);

    	/**
    	 * @var 获取到当前城市 如果session中不存在。默认为山东济南 
    	 */
    	$area = $request->session()->get('area',function () {
		    return ['name' => '济南市', 'code' => '370100', 'parent' => '山东省'];
		});

    	/**
    	 * @var 获取到当前车型 如果session中不存在 默认为小车
    	 */
    	$car  =  $request->session()->get('cars',function () {
		    return ['name' => "小车", "code" => 1 ];
		});

    	/**
    	 * @var [科目一顺序练习]
    	 */
    	if($request->sub == "1" ){
    		// 网页标题
    		$title = "科目一";


    	}

    	/**
    	 * @var [科目四顺序练习]
    	 */
    	if($request->sub == "4"){
    		// 网页标题
    		$title = "科目四";

    	}

    	$title = $car['name'].$title."练习";

    	return view('plain', compact('title'));
    }
}
