<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SequentialMaintain extends Model
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
    	return $this->belongsTo('App\SequentialExercise', 'exercise_id', 'id');
    }
}
