<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class formSubmitted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    public $receiver;
    public $sender;
    public $dmid;



    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message, $receiver, $sender, $dmid)
    {
        //maakt het globaal
        $this->message = $message;
        $this->receiver = $receiver;
        $this->sender = $sender;
        $this->dmid = $dmid;


    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel($this->dmid);
    }
    public function broadcastAs()
    {
        return 'form-submitted';
    }
}
