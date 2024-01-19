<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotteryGame extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $table = 'lottery_games';

    protected $fillable = [
        'id',
        'name',
        'game_count',
        'reward_points'
    ];
}
