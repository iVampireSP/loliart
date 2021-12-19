@extends('layouts.app')

@section('title', tr('Checkout'))

@section('content')
    <h1 class="mdui-typo-display-2">{{ tr('Checkout') }}</h1>
    <div id="stripe-button">
        {{ $checkout->button('Buy') }}
    </div>

    <script>
        $(() => {
            $('#stripe-button button').attr('disable', true)
            $.getScript("https://js.stripe.com/v3/", function() {
                Stripe('{{ config('cashier.key') }}');
                $('#stripe-button button').attr('disable', false)
            });
        });
    </script>
@endsection
