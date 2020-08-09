<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Delivery\Dostavista\CreateOrder as DostavistaCreateOrder;
use App\Delivery\Dostavista\DeleteOrder as DostavistaDeleteOrder;
use App\Delivery\Cdek\CreateOrder as CdekCreateOrder;

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
            'App\Contracts\Delivery\Delivery',
            function ($app) {
                switch ($app->request->service) {
                    case 'cdek':
                        return new CdekCreateOrder($app->request);
                    default:
                        return new DostavistaCreateOrder($app->request);
                }
            }
        );

        $this->app->bind(
            'App\Contracts\Delivery\Delivery',
            function ($app) {
                switch ($app->request->service) {
                    case 'cdek':
                        //return new CdekCreateOrder($app->request);
                    default:
                        return new DostavistaDeleteOrder($app->request);
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
