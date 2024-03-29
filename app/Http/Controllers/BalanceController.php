<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\IncompletePayment;
use Stripe\Exception\InvalidRequestException;

class BalanceController extends Controller
{
    public function payments()
    {
        $user = auth()->user();

        try {
            $payments = $user->paymentMethods();

        } catch (InvalidRequestException $e) {
            $payments = [];
        }
        return view('user.payments.manage', compact('payments'));
    }

    public function paymentMethod()
    {
        return view('user.payments.add', [
            'intent' => auth()->user()->createSetupIntent(),
        ]);
    }

    public function addPayment(Request $request)
    {
        $user = auth()->user();
        if (is_null($user->stripe_id)) {
            $user->createAsStripeCustomer();
            write(tr('Billing account actived.'));
        }
        write(tr('Payment method added.'));
        return $user->addPaymentMethod($request->paymentMethod);
    }

    public function updateDefaultPayment($id)
    {
        $user = auth()->user();
        $paymentMethod = $user->findPaymentMethod($id);
        if (is_null($paymentMethod)) {
            return response()->json(['status' => 0]);
        }
        $user->updateDefaultPaymentMethod($paymentMethod->id);
        return response()->json(['status' => 1]);
    }

    public function removePayment($id)
    {
        $user = auth()->user();
        $paymentMethod = $user->findPaymentMethod($id);
        $paymentMethod->delete();
        write(tr('Payment method successfully removed.'));
        return response()->json(['status' => 1]);
    }

    public function charge(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'amount' => 'integer|min:1|required',
        ]);
        $user = auth()->user();
        try {
            $paymentMethod = $user->findPaymentMethod($request->id);
            try {
                $resp = $user->charge($request->amount * 100, $paymentMethod->id, ['metadata' => [
                    'type' => 'charge_to_account',
                ]]);

            } catch (InvalidRequestException $e) {
                write($e->getMessage());
                return response()->json(['status' => 0]);
            }

            Order::setup($resp->id, $request->amount, 'Charge');
            write(tr('Order created successfully.'));
            return success();
        } catch (IncompletePayment $exception) {
            write(route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('home')]
            ));
            write(tr('Need confirm the payment.'));
            return success();
        }

        return success();
    }

    // public function refund(Order $order)
    // {
    //     if (is_null($order)) {
    //         write('Unable to refund.');
    //         return response()->json(['status' => 0]);
    //     }

    //     if ($order->user_id !== auth()->id()) {
    //         write('Permission denied.');
    //         return response()->json(['status' => 0]);
    //     }

    //     if (!is_null($order->refunded_at)) {
    //         write('The order is already refunded at ' . $order->refunded_at);
    //         return response()->json(['status' => 0]);
    //     }

    //     auth()->user()->refund($order->order_id);
    //     write('Refund successful.');
    //     return response()->json(['status' => 1]);
    // }
}
