<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperMaintains extends Model
{
    /**
     * @Author    Pudding
     * @DateTime  2020-08-18
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 关联顺序练习 ]
     * @return    [type]      [description]
     */
    public function strategies()
    {
    	return $this->belongsTo('App\SuperStrategy', 'strategies_id', 'id');
    }

    /**
     * @Author    Pudding
     * @DateTime  2020-08-28
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 关联课件列表 ]
     * @return    [type]      [description]
     */
    public function courses()
    {
        return $this->hasMany('App\SuperCourse', 'maintains_id', 'id')->orderBy('sort', 'asc');
    }
}
