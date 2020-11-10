<?php


namespace App\SummerOnSnow\Http;


use App\Contracts\Delivery\Dostavista\HttpClient as DostavistaHttpClientInterface;


class DostavistaHttpClient implements DostavistaHttpClientInterface
{
    private $httpClient,
        $baseUrl,
        $headers,
        $token;

    public function __construct()
    {
        $this->baseUrl = $this->getBaseUrl();
        $this->token = $this->getToken();
        $this->setHeaders();
        $this->httpClient = new \App\SummerOnSnow\Http\HttpClient($this->baseUrl);
    }

    public function get($path = '')
    {
        return $this->httpClient->get($path, $this->headers);
    }

    public function post($path = '')
    {
        return $this->httpClient->post($path, $this->headers);
    }

    private function getBaseUrl()
    {
        return config('app.dostavista_base_url');
    }

    private function getToken()
    {
        return config('app.dostavista_token');
    }

    private function setHeaders()
    {
        $this->headers = [
            'X-DV-Auth-Token' => $this->token
        ];
    }
}
