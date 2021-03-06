<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secret2Exercise extends Model
{
	protected $table   = 'secret2_exercise';
	// 黑名单
    protected $guarded = [];

    /**
     * @Author    Pudding
     * @DateTime  2020-08-14
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 关联车型表 ]
     * @return    [type]      [description]
     */
    public function cars_relation()
    {
    	return $this->belongsTo('App\Car', 'car_type', 'id');
    }


    /**
     * @Author    Pudding
     * @DateTime  2020-08-14
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 关联城市 ]
     * @return    [type]      [description]
     */
    public function citys()
    {
    	return $this->belongsTo('App\City', 'area', 'code');
    }
}
