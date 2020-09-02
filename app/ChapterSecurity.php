<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChapterSecurity extends Model
{
    /** 关联节模型**/
    public function sections()
    {
    	return $this->hasMany('App\SectionSecurity', 'chapter_id', 'id')->orderBy('section_sort', 'asc');
    }
}
