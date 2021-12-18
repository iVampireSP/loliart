@extends('layouts.app')

@section('title', tr('Payments'))

@section('content')
    <div class="mdui-typo-display-1">{{ tr('Payments') }}</div>

    <a href="{{ route('user.balance.add') }}"
        class="mdui-btn mdui-btn-outlined mdui-ripple mdui-m-t-2+">{{ tr('New Payment') }}</a>

    <div class="mdui-row">
        @foreach ($payments as $payment)
            <div class="mdui-col-xs-12 mdui-col-sm-4 mdui-m-t-3">
                {{-- {{ dd($payment) }} --}}
                <div class="mdui-card">
                    <div class="mdui-card-media">
                        <div style="height: 100px;width: 100%"></div>
                        <div class="mdui-card-media-covered mdui-card-media-covered-top">
                            <div class="mdui-card-primary">
                                <div class="mdui-card-primary-title">{{ Str::upper($payment->card->brand) }}</div>
                                <div class="mdui-card-primary-subtitle">**** **** **** {{ $payment->card->last4 }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="mdui-card-actions">
                        <button class="mdui-btn mdui-ripple">{{ tr('Set Default') }}</button>
                        <button class="mdui-btn mdui-ripple">{{ tr('Remove') }}</button>
                    </div>
                </div>
            </div>

            {{-- {{ dd($payment->card->brand) }} --}}
        @endforeach
    </div>

    <script>
        m = {
            set_default: (id) => {

            },
            remove: (id) => {

            }
        }
    </script>
@endsection
