<?php

namespace App\Delivery;

use App\Contracts\Delivery;
use Illuminate\Http\Request;

class Cdek implements Delivery
{
    public function registerOrder(Request $request)
    {
        return 'It\'s ' . $request->service . ' registerOrder function from Cdek';
    }
}
