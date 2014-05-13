<?php namespace Epiclabs\Presscontrol;

use Illuminate\Support\ServiceProvider;


class PressControlServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PressControl', function()
        {
            return new PressControl();
        });
    }

}