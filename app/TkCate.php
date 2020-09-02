<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TkCate extends Model
{
    protected $table = 'lx_tk_category';

    // 黑名单
    protected $guarded = [];
}
