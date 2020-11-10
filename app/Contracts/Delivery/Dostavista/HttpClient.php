<?php


namespace App\Contracts\Delivery\Dostavista;


interface HttpClient
{
    public function get($path = '');

    public function post($path = '');
}
