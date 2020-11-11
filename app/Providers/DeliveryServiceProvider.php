<?php

namespace App\Providers;

use App\Delivery\Dostavista\HttpClient;
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
            'App\Delivery\Dostavista\Order'
        );

        $this->app->when(DostavistaOrder::class)
            ->needs(HttpClient::class)
            ->give('App\Delivery\Dostavista\HttpClient');
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
