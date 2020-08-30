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
    	$area = $request->session()->get('area',function () { return ['name' => '济南市', 'code' => '370100', 'parent' => '山东省']; });

    	/**
    	 * @var 获取到当前车型 如果session中不存在 默认为小车
    	 */
    	$car  =  $request->session()->get('cars',function () { return ['name' => "小车", "code" => 1 ]; });

        $title = $request->sub == "1" ? "科目一" : "科目四";

        $info = \App\SequentialExercise::where('car_type', $car['code'])->where('subject_id', $request->sub)->where('area', $area['code'])->first();

    	return view('plain', compact('title', 'info'));
    }


    /**
     * @Author    Pudding
     * @DateTime  2020-08-26
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 科一科四 顺序练习 某地区车型的总练习题 ]
     * @param     Request     $request [description]
     * @return    [type]               [description]
     */
    public function practice(Request $request)
    {
        if(!$request->id) abort(404);

        $info = \App\SequentialExercise::where('id', $request->id)->first();

        return view('public.answer', compact('info'));
    }
}
