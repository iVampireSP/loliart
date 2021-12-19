<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function checkout($value, $name, $num) {
        $user = auth()->user();

        $checkout = $user->checkoutCharge(1200, 'T-Shirt', 5);

        return view('order.checkout', [
            'checkout' => $checkout,
        ]);

    }

    public function all(Request $request)
    {
    }

    public function you(Request $request)
    {
    }

    public function team(Request $request)
    {
    }

    public function cancel(Request $request)
    {
    }

    public function success(Request $request)
    {
    }
}
