<?php


namespace App\SummerOnSnow\Contracts;


interface HttpClient
{
    public function get($path = '', $headers = []);
    public function post($path = '', $headers = []);
}
