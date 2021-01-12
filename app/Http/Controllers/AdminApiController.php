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

    /** 后台联动选择顺序练习的车型与章节**/
    public function getMaintain(Request $request)
    {
        return \App\SequentialMaintain::where('exercise_id', $request->get('q'))->get(['id', 'title as text'])->toArray();
    }

    /** 后台联动选择保过600题的车型与章节**/
    public function getMaintainSix(Request $request)
    {
        return \App\SixMaintain::where('exercise_id', $request->get('q'))->get(['id', 'title as text'])->toArray();
    }

    /** 后台联动选择懒人速学的车型与章节**/
    public function getMaintainLrsx(Request $request)
    {
        return \App\LrsxMaintain::where('exercise_id', $request->get('q'))->get(['id', 'title as text'])->toArray();
    }

     /** 后台联动选择三力测试的车型与章节**/
    public function getMaintainSanli(Request $request)
    {
        return \App\SanliMaintain::where('exercise_id', $request->get('q'))->get(['id', 'title as text'])->toArray();
    }

    /** 后台联动选择考前密卷一的车型与章节 */  
    public function getMaintainSecret(Request $request)
    {
        return \App\SecretMaintain::where('exercise_id', $request->get('q'))->get(['id', 'title as text'])->toArray();
    }

    /** 后台联动选择考前密卷二的车型与章节 */  
    public function getMaintainSecret2(Request $request)
    {
        return \App\Secret2Maintain::where('exercise_id', $request->get('q'))->get(['id', 'title as text'])->toArray();
    }
}
