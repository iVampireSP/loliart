<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function checkout($amount, $name, $quantity)
    {
        $user = auth()->user();

        $checkout = $user->checkoutCharge($amount, $name, $quantity);

        return $checkout;
    }

    public function all(Request $request)
    {
        $orders = Order::where('user_id', auth()->id())->simplePaginate(15);
        return view('user.orders', compact('orders'));
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

    public function subscriptions()
    {
        $user = auth()->user();

        $cancelled = $user->subscriptions()->cancelled()->get();
        $actives = $user->subscriptions()->active()->get();

        return view('user.subscriptions', compact('cancelled', 'actives'));
    }

    public function redirectToBillingPortal(Request $request)
    {
        return $request->user()->redirectToBillingPortal(route('user.balance.manage'));
    }
}
