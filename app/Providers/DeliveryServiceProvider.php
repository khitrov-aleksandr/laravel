<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Delivery\Dostavista\Order as DostavistaOrder;

class DeliveryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Contracts\Delivery\Order',
            function ($app) {
                return new DostavistaOrder($app->request);
            }
        );
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
