<?php

namespace App\Providers;

use App\SummerOnSnow\Http\DostavistaHttpClient;
use Illuminate\Support\ServiceProvider;
use App\Delivery\Dostavista\Order as DostavistaOrder;
use App\SummerOnSnow\Http\HttpClient;

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
            'App\Contracts\Delivery\Dostavista\HttpClient',
            function ($app) {
                return new DostavistaHttpClient();
            }
        );

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
