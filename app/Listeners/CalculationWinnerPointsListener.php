<?php

namespace App\Listeners;

use App\Events\MatchFinishEvent;
use App\Models\LotteryGame;
use App\Models\LotteryGameMatch;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CalculationWinnerPointsListener
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
        $gamerId = LotteryGameMatch::find($match->id)->game_id;
        $pointsForWin = LotteryGame::find($gamerId)->reward_points;
        $winner = User::find($match->winner_id);
        $winner->points += $pointsForWin;
        $winner->save();
    }
}
