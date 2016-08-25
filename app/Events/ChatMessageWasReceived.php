<?php

namespace App\Events;

use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChatMessageWasReceived extends Event implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $chatMessage;

    public $user;

    public function __construct(ChatMessage $chatMessage, User $user)
    {
        $this->chatMessage = $chatMessage;
        $this->user = $user;
    }

    public function broadcastOn()
    {
        return [
            "chat-room.1"
        ];
    }
}