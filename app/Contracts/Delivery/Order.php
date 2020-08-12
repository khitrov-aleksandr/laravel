<?php

namespace App\Contracts\Delivery;


interface Order
{
    public function create();
    public function cancel();
    public function test();
}
