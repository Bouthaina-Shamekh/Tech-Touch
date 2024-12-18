<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ConsultationMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_id;
    public $data;
    public $source;

    /**
     * Create a new event instance.
     */
    public function __construct($user_id,$data,$source = 'contact')
    {
        $this->user_id = $user_id;
        $this->data = $data;
        $this->source = $source;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {

       return [ 'contact'

    ];

    }

    public function broadcastAs()
    {
        return 'notify';


    }


    public function broadcastWith()
    {
        return [
            'user_id' => $this->user_id,
            'data' => $this->data,
            'source' => $this->source,
        ];
    }
}
