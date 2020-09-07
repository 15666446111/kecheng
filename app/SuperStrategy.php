<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperStrategy extends Model
{
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
     * @DateTime  2020-08-28
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 关联章节列表 ]
     * @return    [type]      [description]
     */
    public function maintains()
    {
        return $this->hasMany('App\SuperCourse', 'maintains_id', 'id')->orderBy('sort', 'asc');
    }


}
