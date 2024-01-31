<?php

namespace App\Http\Controllers;

use App\Models\LotteryGameMatchUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LotteryGameMatchUserController extends Controller
{
    public function recordMatch(Request $request)
    {
        $userRecord = new LotteryGameMatchUser;
            $userRecord->user_id = Auth::id();
            $userRecord->lottery_game_match_id = $request->input('lottery_game_match_id');
            $userRecord->save();
            return response()->json([
                "message" => "You have successfully registered for the game!",
            ], 201);
    }
}
