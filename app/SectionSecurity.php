<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectionSecurity extends Model
{
    /** 关联课程 **/
    public function maints()
    {
    	return $this->hasMany('App\Security', 'section_id', 'id');
    }

    /** 关联节 **/
    public function chapters()
    {
    	return $this->belongsTo('App\ChapterSecurity', 'chapter_id', 'id');
    }
}
