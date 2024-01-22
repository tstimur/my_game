<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/users/register', [\App\Http\Controllers\AuthController::class, 'register']);

Route::group(['namespace' => 'Controllers', 'middleware' => 'jwt.auth'], function () {
    Route::put('/users/{id}', [\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/users/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);
    Route::get('users',[\App\Http\Controllers\UserController::class, 'getAll']);
    Route::post('/lottery_game_matches',[\App\Http\Controllers\LotteryGameMatchController::class, 'createMatch']);
    Route::put('/lottery_game_matches/{id}',[\App\Http\Controllers\LotteryGameMatchController::class, 'finishMatch']);
    Route::post('/lottery_game_match_users',[\App\Http\Controllers\LotteryGameMatchUserController::class, 'recordMatch']);
});

Route::get('/lottery_games', [\App\Http\Controllers\LotteryGameController::class, 'getAllGames']);
Route::get('/lottery_game_matches', [\App\Http\Controllers\LotteryGameMatchController::class, 'getAllMatchOfGame']);

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
//    Route::post('register', 'AuthController@register');
});
