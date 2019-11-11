<?php

namespace Ranjeet\Notifications;

use Illuminate\Support\ServiceProvider;
use Ranjeet\Notifications\Services\NotificationService;
class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('demonotification', function () {

            return new NotificationService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
