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

        }catch(InvalidRequestException $e) {
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
            'amount' => 'integer|min:50|required',
        ]);
        $user = auth()->user();
        try {
            $paymentMethod = $user->findPaymentMethod($request->id);
            $resp = $user->charge($request->amount, $paymentMethod->id);
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
}
