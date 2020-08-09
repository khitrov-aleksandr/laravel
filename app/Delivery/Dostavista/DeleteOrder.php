<?php

namespace App\Delivery\Dostavista;

use App\Contracts\Delivery\DeleteOrder as DeleteOrderInterface;
use Illuminate\Http\Request;

class DeleteOrder implements DeleteOrderInterface
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function delete()
    {
        return 'It\'s ' . $this->request->service . ' delete order function from Dostavista';
    }
}
