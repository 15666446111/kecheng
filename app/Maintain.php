<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintain extends Model
{
    //
    //
    public function sectionMaintain()
    {
    	return $this->belongsTo('App\SectionMaintain', 'section_id', 'id');
    }
}
