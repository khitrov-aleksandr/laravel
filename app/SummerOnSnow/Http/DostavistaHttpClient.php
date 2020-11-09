<?php


namespace App\SummerOnSnow\Http;


use App\SummerOnSnow\Http\HttpClient;


class DostavistaHttpClient extends HttpClient
{
    private $token;

    public function __construct($baseUrl, $headers = [])
    {
        parent::__construct($baseUrl, $headers);
        $this->setToken();
    }

    public function get() {

    }

    private function setBaseUrl() {

    }

    private function setToken() {
        $this->token = config('app.dostavista_token');
    }
}
