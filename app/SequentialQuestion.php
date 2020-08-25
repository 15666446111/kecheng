<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SequentialQuestion extends Model
{
    //
    protected $guarded = [];


    /**
     * @Author    Pudding
     * @DateTime  2020-08-25
     * @copyright [copyright]
     * @license   [license]
     * @version   [version]
     * @return    [type]      [description]
     */
    public function subjects()
    {
    	return $this->belongsTo('App\SubjectOneFour', 'question_id', 'id');
    }
}
