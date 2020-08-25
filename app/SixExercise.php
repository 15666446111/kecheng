<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SixExercise extends Model
{
	protected $table   = 'six_exercise';
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

    /**
     * @Author    Pudding
     * @DateTime  2020-08-18
     * @copyright [copyright]
     * @license   [license]
     * @version   [关联顺序练习的章节信息]
     * @return    [type]      [description]
     */
    public function maintains()
    {
        return $this->hasMany('App\SixMaintain', 'exercise_id', 'id');
    }
}
