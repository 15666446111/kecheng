<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // 默认微信打开路由
    public function index(Request $request)
    {
    	// 获取轮播图
    	$plug = \App\Plug::where('active', '1')->orderBy('sort', 'desc')->get();

    	// 获取科目二视频
    	$sub2 = \App\SubjectTwoThree::where('subject', 2)->orderBy('id', 'desc')->get();

    	// 获取科目三视频
    	$sub3 = \App\SubjectTwoThree::where('subject', 3)->orderBy('id', 'desc')->get();

    	return view('Home', compact('plug', 'sub2', 'sub3'));
    }
}
