<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
