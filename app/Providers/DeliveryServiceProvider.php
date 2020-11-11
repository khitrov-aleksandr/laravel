<?php

namespace App\Providers;

use App\Delivery\Dostavista\HttpClient;
use Illuminate\Support\ServiceProvider;
use App\Delivery\Dostavista\Order as DostavistaOrder;
use App\Delivery\Dostavista\HttpClient as DostavistaHttpClient;
use App\SummerOnSnow\Http\HttpClient as HttpClientAdapter;

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

        $this->app->when(DostavistaHttpClient::class)
            ->needs(HttpClient::class)
            ->give('App\SummerOnSnow\Http\HttpClient');

        $this->app->when(HttpClientAdapter::class)
            ->needs('$baseUrl')
            ->give(config('app.dostavista_base_url'));

        $this->app->when(DostavistaHttpClient::class)
            ->needs('$token')
            ->give(config('app.dostavista_token'));
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
