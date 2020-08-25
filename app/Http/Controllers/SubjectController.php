<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{

	/**
	 * @Author    Pudding
	 * @DateTime  2020-08-03
	 * @copyright [copyright]
	 * @license   [license]
	 * @version   [ 科目二 ]
	 * @param     Request     $request [description]
	 * @return    [type]               [description]
	 */
	public function sub2(Request $request)
	{
		return view('subject_2');
	}

}