<?php

namespace App\Listeners;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    private $order;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(WebhookReceived $event)
    {
        $this->order = Order::where('order_id', $event->payload['data']['object']['id'])->first();
        $user = User::where('stripe_id', $event->payload['data']['object']['customer'])->first();
        switch ($event->payload['type']) {
            case 'payment_intent.created':
                // 更新订单状态
                $this->status('created');
                write('Order updated.', $user->id);
                break;

            case 'payment_intent.succeeded':
                $this->order->update([
                    'amount_received' => $event->payload['data']['object']['amount_received'],
                    'status' => 'intent.succeeded',
                ]);
                write('Payment status updated.', $user->id);
                break;
            case 'charge.succeeded':
                userEvent('balance.update');
                write('Charge succeed.', $user->id);
                break;

        }
        // if ($event->payload['type'] === 'invoice.payment_succeeded') {
        //     // Handle the incoming event...
        // }
    }

    protected function status($status)
    {
        $this->order->query()->update([
            'status' => $status,
        ]);
    }
}
