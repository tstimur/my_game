<?php

namespace App\Events;

use App\Models\LotteryGameMatch;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MatchFinishEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private LotteryGameMatch $gameMatch;
    /**
     * Create a new event instance.
     */
    public function __construct(LotteryGameMatch $gameMatch)
    {
        $this->gameMatch = $gameMatch;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }

    public function getGameMatch(): LotteryGameMatch
    {
        return $this->gameMatch;
    }
}
