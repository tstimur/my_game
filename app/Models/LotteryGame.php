<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function matches(): HasMany
    {
        return $this->hasMany(LotteryGameMatch::class,'game_id', 'id')->orderBy('start_date')->orderBy('start_time');
    }
}
