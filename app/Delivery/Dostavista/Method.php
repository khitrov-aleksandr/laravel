<?php


namespace App\Delivery\Dostavista;

use App\Contracts\Delivery\ApiMethod as ApiMethodInterface;
use App\Contracts\Delivery\Dostavista\HttpClient as DostavistaHttpClientInterface;

class Method implements ApiMethodInterface
{
    public function __construct(DostavistaHttpClientInterface $httpClient) {
        $this->httpClient = $httpClient;
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
