<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
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
        'password'
    ];
}
