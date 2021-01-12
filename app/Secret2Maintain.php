<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secret2Maintain extends Model
{
    /**
     * @Author    Pudding
     * @DateTime  2020-08-18
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 关联顺序练习 ]
     * @return    [type]      [description]
     */
    public function exercises()
    {
        return $this->belongsTo('App\Secret2Exercise', 'exercise_id', 'id');
    }





    /**
     * @Author    Pudding
     * @DateTime  2020-08-25
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 关联题库列表 ]
     * @return    [type]      [description]
     */
    public function questions()
    {
        return $this->hasMany('App\Secret2Question', 'maintain_id', 'id');
    }
}
