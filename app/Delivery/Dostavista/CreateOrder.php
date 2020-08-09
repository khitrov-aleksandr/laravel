<?php

namespace App\Delivery\Dostavista;

use App\Contracts\Delivery\CreateOrder as CreateOrderInterface;
use Illuminate\Http\Request;

class CreateOrder implements CreateOrderInterface
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function create()
    {
        return 'It\'s ' . $this->request->service . ' registerOrder function from Dostavista';
    }
}
