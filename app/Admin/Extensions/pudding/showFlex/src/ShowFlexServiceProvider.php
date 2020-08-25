<?php

namespace Encore\ShowFlex;

use Illuminate\Support\ServiceProvider;

class ShowFlexServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(ShowFlex $extension)
    {
        if (! ShowFlex::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'showFlex');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/pudding/showFlex')],
                'showFlex'
            );
        }
    }
}