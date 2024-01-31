<?php

namespace App\Models;

use App\Events\RecordUserOnMatchEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\String\s;

class LotteryGameMatchUser extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'lottery_game_match_users';

    protected $fillable = [
        'id',
        'user_id',
        'lottery_game_match_id'
    ];

    protected $dispatchesEvents = [
        'saving' => RecordUserOnMatchEvent::class,
    ];
}
