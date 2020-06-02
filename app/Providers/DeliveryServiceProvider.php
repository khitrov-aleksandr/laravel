<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Delivery\Dostavista;
use App\Delivery\Cdek;

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
            'App\Contracts\Delivery',
            function ($app) {
                switch ($app->request->service) {
                    case 'dv':
                        return new Dostavista($app->request);
                    case 'cdek':
                        return new Cdek($app->request);
                    default:
                        return new Dostavista($app->request);
                }
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
