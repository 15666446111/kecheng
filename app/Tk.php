<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tk extends Model
{
    protected $table = 'lx_tk';

    // 黑名单
    protected $guarded = [];
}
