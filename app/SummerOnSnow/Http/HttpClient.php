<?php


namespace App\SummerOnSnow\Http;


use App\SummerOnSnow\Contracts\HttpClient as HttpClientInterface;
use GuzzleHttp\Client;


class HttpClient implements HttpClientInterface
{
    private $client;

    public function __construct($baseUrl)
    {
        $this->client = new Client([
            'base_uri' => $baseUrl . '/'
        ]);
    }

    public function get($path = '', $headers = [])
    {
        $response = $this->client->get($path, ['headers' => $headers]);
        return $response->getBody();
    }

    public function post($path = '', $headers = [])
    {
        $response = $this->client->post($path, ['headers' => $headers]);
        return $response->getBody();
    }
}
