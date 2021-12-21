@extends('layouts.app')

@section('title', tr('Payments'))

@section('content')

    <div class="mdui-typo-display-1">{{ tr('Balance') }}</div>
    <span class="mdui-typo-display-3 balance"><small>HKD </small>{{ auth()->user()->balance }}</span>
    <div class="mdui-typo-display-1 mdui-m-t-4">{{ tr('Payments') }}</div>

    @if (is_null(auth()->user()->stripe_id))
        <div class="mdui-typo-display-1">{{ tr('Your billing account is not active.') }}</div>
        <p>{{ tr('To active your billing account, please add your billing information to your account.') }}</p>
        <p>{{ tr('If not, you can only use your balance.') }}</p>

        <a href="{{ route('user.balance.add') }}"
            class="mdui-btn mdui-btn-outlined mdui-ripple mdui-m-t-2">{{ tr('New Payment') }}</a>
    @endif


    @if (!is_null(auth()->user()->stripe_id))

        <a href="{{ route('user.balance.add') }}"
            class="mdui-btn mdui-btn-outlined mdui-ripple mdui-m-t-2">{{ tr('New Payment') }}</a>

        <div class="mdui-row payments">
            @foreach ($payments as $payment)
                <div class="mdui-col-xs-12 mdui-col-sm-4 mdui-m-t-3">
                    <div class="mdui-card">
                        <div class="mdui-card-media">
                            <div style="height: 100px;width: 100%"></div>
                            <div class="mdui-card-media-covered mdui-card-media-covered-top">
                                <div class="mdui-card-primary">
                                    <div class="mdui-card-primary-title">{{ $payment->billing_details->name }}</div>
                                    <div class="mdui-card-primary-subtitle"><small
                                            style="font-size: 10%;">{{ Str::upper($payment->card->brand) }}</small>:&nbsp;****
                                        **** **** {{ $payment->card->last4 }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="mdui-card-actions">
                            <button class="mdui-btn mdui-btn-icon mdui-ripple" onclick="m.charge('{{ $payment->id }}')"
                                mdui-tooltip="{content: '{{ tr('Charge') }}', delay: 1000}">
                                <i class="mdui-icon material-icons">add</i>
                            </button>
                            <button class="mdui-btn mdui-ripple"
                                onclick="m.set_default('{{ $payment->id }}')">{{ tr('Set Default') }}</button>
                            <button class="mdui-btn mdui-ripple"
                                onclick="m.remove('{{ $payment->id }}')">{{ tr('Remove') }}</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <script>
            m = {
                set_default: (id) => {
                    $.ajax({
                        url: route('user.balance.payments.update', id),
                        type: 'PUT',
                        success() {
                            util.reload('.payments')
                            util.theme.pop('{{ tr('Set default payment method success.') }}')
                        }
                    })
                },
                remove: (id) => {
                    $.ajax({
                        url: route('user.balance.payments.delete', id),
                        type: 'DELETE',
                        success() {
                            util.reload('.payments')
                        }
                    })
                },
                charge: (id) => {
                    mdui.prompt('{{ tr('Value') }}',
                        (value) => {
                            $.ajax({
                                url: route('user.balance.charge'),
                                type: 'POST',
                                data: {
                                    id: id,
                                    amount: value
                                },
                                success() {
                                    util.reload('.balance')
                                }
                            })
                        }
                    );
                },
                e: (type, data) => {
                    switch (type) {
                        case 'balance.updated':
                            util.reload('.balance')

                            break;
                    }
                }
            }
        </script>
    @endif

@endsection
