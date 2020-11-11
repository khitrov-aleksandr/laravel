<?php


namespace App\Delivery\Dostavista;


use App\Contracts\Delivery\Dostavista\HttpClient as DostavistaHttpClientInterface;
use App\SummerOnSnow\Http\HttpClient as HttpClientAdapter;


class HttpClient implements DostavistaHttpClientInterface
{
    private $httpClient,
        $headers,
        $token;

    public function __construct(HttpClientAdapter $httpClient, $token)
    {
        $this->httpClient = $httpClient;
        $this->token = $token;
        $this->setHeaders();
    }

    public function get($path = '')
    {
        return $this->httpClient->get($path, $this->headers);
    }

    public function post($path = '')
    {
        return $this->httpClient->post($path, $this->headers);
    }

    private function setHeaders()
    {
        $this->headers = [
            'X-DV-Auth-Token' => $this->token
        ];
    }
}
