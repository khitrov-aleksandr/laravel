<?php

namespace App\Delivery\Dostavista;

use App\Contracts\Delivery\Order as DeliveryOrder;
use Illuminate\Http\Request;

class Order implements DeliveryOrder
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function create()
    {
        return 'It\'s ' . $this->request->service . ' registerOrder function from Order';
    }

    public function cancel()
    {
        return 'It\'s ' . $this->request->service . ' registerOrder function from Order';
    }

    public function test() {
        return 'It\'s test';
    }
}

