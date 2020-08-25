<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	// 黑名单
    protected $guarded = [];


    public function province()
    {
    	return $this->belongsTo('\App\Province', 'province_id', 'id');
    }
}
