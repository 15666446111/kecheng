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
     * @DateTime  2020-08-28
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 车型获取器 ]
     * @param     [type]      $value [description]
     * @return    [type]             [description]
     */
    public function getCarAttribute($value)
    {
        return explode(',', $value);
    }

    /**
     * @Author    Pudding
     * @DateTime  2020-08-28
     * @copyright [copyright]
     * @license   [license]
     * @version   [ 车型设置器 ]
     * @param     [type]      $value [description]
     */
    public function setCarAttribute($value)
    {
        $this->attributes['car'] = implode(',', $value);
    }
}
