<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class TeamEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $data;
    private $team;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($team, $data)
    {
        $this->data = $data;
        $this->team = $team;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        if (!isset($this->team->id)) {
            $team_id = $this->team;
        } else {
            $team_id = $this->team->id;
        }

        return new PrivateChannel('team.' . $team_id);
    }
}
