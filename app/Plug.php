<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plug extends Model
{
    
	/**
	 * @Author    Pudding
	 * @DateTime  2020-08-05
	 * @copyright [copyright]
	 * @license   [license]
	 * @version   [ 关联类型 ]
	 * @return    [type]      [description]
	 */
    public function types()
    {
    	return $this->belongsTo('App\PlugType', 'type_id', 'id');
    }
}
