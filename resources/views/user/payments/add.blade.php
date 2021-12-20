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
            $.getScript("https://js.stripe.com/v3/", function() {
                const stripe = Stripe('{{ config('cashier.key') }}');
                const elements = stripe.elements();
                const cardElement = elements.create('card');

                cardElement.mount('#stripe-card');

                const cardHolderName = document.getElementById('stripe-holder-name');
                const cardButton = document.getElementById('stripe-process-button');

                cardButton.addEventListener('click', async () => {
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
                        util.post(
                            route('user.balance.payments.add'), {
                                paymentMethod: paymentMethod.id
                            },
                            route('user.balance.manage')
                        )
                    }
                });
            });
        })
    </script>

@endsection
