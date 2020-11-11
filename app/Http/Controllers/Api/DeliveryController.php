<?php

namespace App\Http\Controllers\Api;

use App\Contracts\Delivery\Order as DeliveryOrder;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveryController extends Controller
{
    private $order;

    public function __construct(DeliveryOrder $order)
    {
        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \IlFluminate\Http\Response
     */
    public function index()
    {
        return response()
            ->json(json_decode($this->order->test())
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        return $this->order->create();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->order->delete($id);
    }

    /**
     * Test delivery.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        return response()->json(json_decode($this->apiMethod->test()));
    }
}
