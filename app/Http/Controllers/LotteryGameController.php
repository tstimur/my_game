<?php

namespace App\Http\Controllers;

use App\Models\LotteryGame;
use Illuminate\Http\Request;

class LotteryGameController extends Controller
{
    public function getAllGames()
    {
        $lotteryGame = LotteryGame::all();
        return response()->json($lotteryGame);
    }
}
