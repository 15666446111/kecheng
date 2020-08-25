<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChapterMaintain extends Model
{
    /** 关联节模型**/
    public function sections()
    {
    	return $this->hasMany('App\SectionMaintain', 'chapter_id', 'id');
    }


}
