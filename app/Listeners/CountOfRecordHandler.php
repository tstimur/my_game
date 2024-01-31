<?php

namespace App\Listeners;

use App\Events\RecordUserOnMatchEvent;
use App\Models\LotteryGame;
use App\Models\LotteryGameMatch;
use App\Models\LotteryGameMatchUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CountOfRecordHandler
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
        $gamerId = LotteryGameMatch::find($userRecord->lottery_game_match_id)->game_id;
        $countOfGamer = LotteryGame::find($gamerId)->gamer_count;
        $countRecordMatch = LotteryGameMatchUser::where('lottery_game_match_id', $userRecord->lottery_game_match_id)->count();

        if($countRecordMatch >= $countOfGamer) return false;
    }
}
