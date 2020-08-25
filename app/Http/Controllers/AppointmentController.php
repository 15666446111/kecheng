<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * @Author    Pudding
     * @DateTime  2020-08-04
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 科目一 科目四 预约考试 界面指引 ]
     * @param     Request     $request [description]
     * @return    [type]               [description]
     */
    public function index(Request $request)
    {
    	return view('public.appointment');
    }
}
