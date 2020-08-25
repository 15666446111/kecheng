<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
	// 黑名单
    protected $guarded = [];

	/**
	 * @Author    Pudding
	 * @DateTime  2020-08-14
	 * @copyright [copyright]
	 * @license   [license]
	 * @version   [ 关联顺序练习 ]
	 */
	public function SequentialExercises()
	{
		return $this->hasMany('App\SequentialExercise', 'card_type', 'id');
	}
}
