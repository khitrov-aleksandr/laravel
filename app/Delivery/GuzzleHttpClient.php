<?php


namespace App\Delivery;


use App\Contracts\HttpClient;
use GuzzleHttp\Client;


class GuzzleHttpClient implements HttpClient
{

    private $baseUrl, $headers;

    public function __construct($baseUrl, $headers = [])
    {
        $this->client = Client();
        $this->baseUrl = $baseUrl;
        $this->headers = $headers;
    }

    public function get($uri)
    {
        return $this->client->get($uri, ['headers' => $this->headers]);
    }

    public function post()
    {
        return $this->client->post($uri, ['headers' => $this->headers]);
    }
}
