<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectOneFour extends Model
{
    protected $table = 'subject_one_fouls';

	// 黑名单
    protected $guarded = [];

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
        return $this->belongsTo('\App\Car', 'car', 'id');
    }
}
