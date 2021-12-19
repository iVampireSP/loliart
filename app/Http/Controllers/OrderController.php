<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function checkout($amount, $name, $quantity) {
        $user = auth()->user();

        $checkout = $user->checkoutCharge($amount, $name, $quantity);

        return $checkout;
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
