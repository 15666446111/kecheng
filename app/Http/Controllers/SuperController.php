<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperController extends Controller
{

	/**
	 * @Author    Pudding
	 * @DateTime  2020-08-28
	 * @copyright [copyright]
	 * @license   [license]
	 * @version   [ 超级攻略 显示章节列表]
	 * @param     Request     $request [description]
	 * @return    [type]               [description]
	 */
	public function index(Request $request)
	{

		if(!$request->sub) abort(404);

		$car = $request->session()->get('cars');

		$info = \App\SuperStrategy::where('car_type', $car['code'])->where('subject_id', $request->sub)->first();

		return view('super.index', compact('info'));
	}
}
