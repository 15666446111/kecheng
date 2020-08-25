<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminApiController extends Controller
{
    //
	/** 后台联动选择所属章和所属节**/
    public function getSection(Request $request)
    {
    	return \App\SectionMaintain::where('chapter_id', $request->get('q'))->where('section_open', '1')->get(['id', 'section_title as text'])->toArray();
    }
    
    /** 后台联动选择所属章和所属节**/
    public function getSectionSec(Request $request)
    {
    	return \App\SectionSecurity::where('chapter_id', $request->get('q'))->where('section_open', '1')->get(['id', 'section_title as text'])->toArray();
    }

    /** @Author Pudding  后台联动选择省市 */ 
    public function getCity(Request $request)
    {
        return \App\City::where('province_id', $request->get('q'))->get(['code as id', 'name as text'])->toArray();
    }
}
