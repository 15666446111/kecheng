<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    //
    //
    public function sectionMaintain()
    {
    	return $this->belongsTo('App\SectionSecurity', 'section_id', 'id');
    }
}
