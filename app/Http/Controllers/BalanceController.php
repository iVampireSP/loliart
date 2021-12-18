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

    public function updatePayment(Request $request)
    {
        $user = auth()->user();
        return  $user->addPaymentMethod($request->paymentMethod);
        return $user->updateDefaultPaymentMethod($request->paymentMethod);

        // if ($user->hasPaymentMethod()) {
        //     return $user->updateDefaultPaymentMethod($request->paymentMethod);
        // } else {

        // }
        // return $user->updateDefaultPaymentMethod($request->paymentMethod);
    }
}
