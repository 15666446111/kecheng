<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuperCourse extends Model
{

    /**
     * @Author    Pudding
     * @DateTime  2020-08-28
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 反向关联章节列表]
     * @return    [type]      [description]
     */
    public function maintains()
    {
        return $this->belongsTo('App\SuperMaintains', 'maintains_id', 'id');
    }
}
