<?php

namespace App\Contracts\Delivery;


interface DeleteOrder extends Delivery
{
    public function delete();
}
