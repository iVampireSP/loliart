<?php

namespace Modules\FrpTunnel\Http\Controllers;

use App\Http\Controllers\OrderController;
use App\Models\Order;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FrpTunnelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user = auth()->user();
//        $checkout = $user->checkout('price_1K7aOIKX2JWJed1K2GC3crSr', [
//            'success_url' => route('order.success'),
//            'cancel_url' => route('order.cancel'),
//        ]);
//        dd($checkout);

        $order = new OrderController();
        $checkout = $order->checkout(100, 'Test', 1);
        return view('order.checkout', [
            'checkout' => $checkout,
        ]);
//        dd($user->checkoutCharge(1200, 'T-Shirt', 5)->toArray());
//        dd($user->balance());

//        return auth()->user()->redirectToBillingPortal();
//        return view('frptunnel::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('frptunnel::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('frptunnel::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('frptunnel::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}