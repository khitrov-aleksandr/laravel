<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface Delivery
{
    public function registerOrder(Request $request);
}
