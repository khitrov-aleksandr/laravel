<?php

namespace App\Delivery\Dostavista;


use Illuminate\Http\Request;

use App\Contracts\Delivery\Order as DeliveryOrder;
use App\Delivery\Dostavista\HttpClient;

class Order implements DeliveryOrder
{
    private $httpClient,
        $path = 'orders';

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function test()
    {
        return $this->httpClient->get($this->path);
    }

    public function create()
    {
        return 'It\'s ' . $this->request->service . ' registerOrder function from Order';
    }

    public function cancel()
    {
        return 'It\'s ' . $this->request->service . ' registerOrder function from Order';
    }
}

