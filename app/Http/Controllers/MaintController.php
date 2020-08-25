<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintController extends Controller
{
    /** 汽车保养 **/
    public function index(Request $request)
    {
    	// 查询出所有章
    	$list = \App\ChapterMaintain::where('chapter_open', '1')->orderBy('chapter_sort', 'desc')->get();

    	return view('maint', compact('list'));
    }



    public function safeDriving(Request $request)
    {
    	// 查询出所有章
    	$list = \App\ChapterSecurity::where('chapter_open', '1')->orderBy('chapter_sort', 'desc')->get();

    	return view('security', compact('list'));	
    }

}
