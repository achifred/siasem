<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Newcomment implements ShouldBroadcast
{
    
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $comment;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('podcast.'.$this->comment[0]->podcast_id);
    }

    public function broadcastWith(){
        return[
            'body'=>$this->comment[0]->body,
            'id'=>$this->comment[0]->id,
            'created_at'=>$this->comment[0]->created_at,
            'username'=>$this->comment[0]->username,
            'picture'=>$this->comment[0]->picture,
            'commenter'=>$this->comment[0]->commenter

        ];
    }
}
