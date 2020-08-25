<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlugType extends Model
{
    
	/**
	 * @Author    Pudding
	 * @DateTime  2020-08-05
	 * @copyright [copyright]
	 * @license   [license]
	 * @version   [ 关联轮播图 ]
	 * @return    [type]      [description]
	 */
    public function plugs()
    {
    	return $this->hasMany('App\Plug', 'type_id', 'id');
    }
}
