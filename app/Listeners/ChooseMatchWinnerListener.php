<?php

namespace App\Listeners;

use App\Events\MatchFinishEvent;
use App\Models\LotteryGameMatchUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChooseMatchWinnerListener
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
    public function handle(MatchFinishEvent $event)
    {
        $match = $event->getGameMatch();
        $match->winner_id = LotteryGameMatchUser::where('lottery_game_match_id', $match->id)->inRandomOrder()->first()->user_id;
    }
}
