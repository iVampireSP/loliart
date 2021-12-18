@extends('layouts.app')

@section('title', tr('Charge'))

@section('content')
    <div class="mdui-typo-display-1">{{ tr('Charge') }}</div>

    <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">{{ tr('Name') }}</label>
        <input class="mdui-textfield-input" id="stripe-holder-name" type="text" />
    </div>

    <div id="stripe-card"></div>

    <button id="stripe-process-button" data-secret="{{ $intent->client_secret }}"
        class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">{{ tr('Process Payment') }}</button>

    <script src="https://js.stripe.com/v3/"></script>

    <script>
        $(() => {
            const stripe = Stripe('{{ config('cashier.key') }}');

            const elements = stripe.elements();
            const cardElement = elements.create('card');

            cardElement.mount('#stripe-card');

            const cardHolderName = document.getElementById('stripe-holder-name');
            const cardButton = document.getElementById('stripe-process-button');

            cardButton.addEventListener('click', async (e) => {
                const {
                    paymentMethod,
                    error
                } = await stripe.createPaymentMethod(
                    'card', cardElement, {
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                );

                if (error) {
                    ui.alert('{{ tr('Add Payment Failed') }}');
                } else {
                    $.ajax({
                        url: route('user.balance.payments.add'),
                        method: 'POST',
                        data: {
                            paymentMethod: paymentMethod.id
                        },
                        success() {
                            util.url.to(route('user.balance.manage'))
                        }
                    });
                }
            });
        })
    </script>

@endsection
