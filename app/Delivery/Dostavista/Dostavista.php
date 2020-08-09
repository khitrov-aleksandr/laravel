<?php

namespace App\Delivery;

use App\Contracts\CreateOrder;
use Illuminate\Http\Request;

class CreateOrder implements CreateOrder
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
