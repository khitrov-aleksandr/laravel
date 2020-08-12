<?php


namespace App\Delivery\Dostavista;

use App\Contracts\Delivery\ApiRequest as ApiRequestInterface;
use App\Contracts\HttpClient;
use App\Delivery\GuzzleHttpClient;

class ApiRequest implements ApiRequestInterface
{

    const AUTH_HEADER = 'X-DV-Auth-Token';

    public function __construct(HttpClient $client) {

    }

    public function test()
    {
        // TODO: Implement test() method.
    }
}
