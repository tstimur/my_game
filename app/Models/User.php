<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'users';
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'password',
        'is_admin',
        'points'
    ];

    protected $hidden = [
        'password',
        'is_admin'
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }

    public function matchesOfUsers(): HasMany
    {
        return $this->hasMany(LotteryGameMatch::class,'winner_id', 'id');
    }
}
