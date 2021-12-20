<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function payments()
    {
        $user = auth()->user();

        $payments = $user->paymentMethods();
        return view('user.payments.manage', compact('payments'));
    }

    public function paymentMethod()
    {
        return view('user.payments.add', [
            'intent' => auth()->user()->createSetupIntent()
        ]);
    }

    public function addPayment(Request $request)
    {
        $user = auth()->user();
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

    public function charge() {

    }
}
