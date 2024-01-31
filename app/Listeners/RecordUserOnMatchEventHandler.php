<?php

namespace App\Listeners;

use App\Events\RecordUserOnMatchEvent;
use App\Models\LotteryGameMatchUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class RecordUserOnMatchEventHandler
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RecordUserOnMatchEvent $event)
    {
        $userRecord = $event->getUserRecord();
        $userId = Auth::id();
        $record = LotteryGameMatchUser::where('lottery_game_match_id', $userRecord->lottery_game_match_id)
            ->where('user_id', $userId)
            ->exists();

        if ($record) {
            return false;
        }
    }
}
