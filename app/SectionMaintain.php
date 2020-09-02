<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionMaintain extends Model
{
    /** 关联课程 **/
    public function maints()
    {
    	return $this->hasMany('App\Maintain', 'section_id', 'id')->orderBy('sort', 'asc');
    }

    /** 关联节 **/
    public function chapters()
    {
    	return $this->belongsTo('App\ChapterMaintain', 'chapter_id', 'id');
    }
}
