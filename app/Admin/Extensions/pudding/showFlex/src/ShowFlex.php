<?php

namespace Encore\ShowFlex;

use Encore\Admin\Extension;

class ShowFlex extends Extension
{
    public $name = 'showFlex';

    public $views = __DIR__.'/../resources/views';

    public $assets = __DIR__.'/../resources/assets';

    public $menu = [
        'title' => 'Showflex',
        'path'  => 'showFlex',
        'icon'  => 'fa-gears',
    ];
}