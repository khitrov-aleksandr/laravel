<?php


namespace App\Delivery\Dostavista;


use App\Contracts\HttpClient as HttpClientInterface;
use GuzzleHttp\Client;


class HttpClient implements HttpClientInterface
{
    private $client,
        $headers;

    public function __construct($baseUrl, $headers = [])
    {
        $this->client = new Client([
            'base_uri' => $baseUrl . '/'
        ]);
        $this->headers = $headers;
    }

    public function get($uri = '')
    {
        $response = $this->client->get($uri, ['headers' => $this->headers]);
        return $response->getBody();
    }

    public function post($uri = '')
    {
        $response = $this->client->post($uri, ['headers' => $this->headers]);
        return $response->getBody();
    }
}
