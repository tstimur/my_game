<?php

namespace App\Models;

use App\Events\MatchFinishEvent;
use App\Listeners\CalculationWinnerPointsListener;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotteryGameMatch extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'lottery_game_matches';

    protected $fillable = [
        'id',
        'game_id',
        'start_date',
        'start_time',
        'winner_id',
        'is_finished'
    ];

    protected $dispatchesEvents = [
        'updating' => MatchFinishEvent::class,
    ];
}
