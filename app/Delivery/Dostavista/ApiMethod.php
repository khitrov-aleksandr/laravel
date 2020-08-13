<?php


namespace App\Delivery\Dostavista;

use App\Contracts\Delivery\ApiMethod as ApiMethodInterface;
use App\Delivery\HttpClient;

class ApiMethod implements ApiMethodInterface
{

    const AUTH_HEADER = 'X-DV-Auth-Token';

    public function __construct() {
        $this->httpClient = new HttpClient(config('app.dostavista_base_url'), [
            self::AUTH_HEADER => config('app.dostavista_token')
        ]);
    }

    public function test()
    {
        return $this->httpClient->get();
    }

    public function getOrderList()
    {
        return $this->httpClient->get('orders');
    }
}
