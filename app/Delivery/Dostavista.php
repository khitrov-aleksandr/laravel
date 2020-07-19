<?php

namespace App\Delivery;

use App\Contracts\Delivery;
use Illuminate\Http\Request;

class Dostavista implements Delivery
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function registerOrder()
    {
        return 'It\'s ' . $this->request->service . ' registerOrder function from Dostavista';
    }
}
