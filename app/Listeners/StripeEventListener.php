<?php

namespace App\Listeners;

use App\Models\Order;
use App\Models\User;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    protected $order, $order_orm;
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
        $this->order_orm = Order::where('order_id', $event->payload['data']['object']['id']);
        $this->order = $this->order_orm->first();
        $metadata = [];
        if (isset($event->payload['data']['object']['metadata'])) {
            $metadata = $event->payload['data']['object']['metadata'];
        }
        $user_class = new User();
        $user = $user_class->where('stripe_id', $event->payload['data']['object']['customer'])->first();
        switch ($event->payload['type']) {
            case 'payment_intent.created':
                // 更新订单状态
                $this->metadata($metadata);
                $this->status('created');
                write('Order updated.', $user->id);
                break;

            case 'payment_intent.succeeded':
                $this->update([
                    'amount_received' => $event->payload['data']['object']['amount_received'],
                    'status' => 'intent.succeeded',
                ]);
                if (isset($metadata['type']) && $metadata['type'] == 'charge_to_account') {
                    $user_class->addBalance($event->payload['data']['object']['amount_received'], $user->id);
                    userEvent('balance.updated', null, $user->id);
                    write('Charge successfully.', $user->id);
                }

                write('Order paid successfully.', $user->id);

                break;

            case 'customer.subscription.updated':
            case 'customer.subscription.created':
                write('Subscription updated.', $user->id);
                userEvent('subscription.updated', null, $user->id);

                break;

        }
        // if ($event->payload['type'] === 'invoice.payment_succeeded') {
        //     // Handle the incoming event...
        // }
    }

    protected function update($data)
    {
        $this->order_orm->update($data);
    }

    protected function status($status)
    {
        $this->update(['status' => $status]);
    }

    protected function metadata($status)
    {
        $this->update(['metadata' => $status]);
    }
}
