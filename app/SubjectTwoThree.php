<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectTwoThree extends Model
{
    protected $table = 'subject_two_three';

	// 黑名单
    protected $guarded = [];

    /**
     * @Author    Pudding
     * @DateTime  2020-08-03
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 获取缩略图地址 ]
     * @param     [type]      $value [description]
     * @return    [type]             [description]
     */
    public function getThumbAttribute($value)
    {
    	return config('base.oss_read_path').$value;
    }


    /**
     * @Author    Pudding
     * @DateTime  2020-08-03
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 关联车型 ]
     * @return    [type]      [description]
     */
    public function cars()
    {
        return $this->belongsTo('\App\Car', 'car_id', 'id');
    }
}
