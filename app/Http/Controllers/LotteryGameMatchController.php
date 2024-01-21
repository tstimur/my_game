<?php

namespace App\Http\Controllers;

use App\Models\LotteryGame;
use App\Models\LotteryGameMatch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LotteryGameMatchController extends Controller
{
    public function createMatch(Request $request)
    {
        $admin = Auth::user();
        if ($admin->is_admin) {

            $match = new LotteryGameMatch;
            $match->game_id = $request->game_id;
            $match->start_date = now()->toDateString();
            $match->start_time = now()->toTimeString();
            $match->winner_id = "-";
            $match->is_finished = false;
            $match->save();

            return response()->json([
                "message" => "Match created.",
                "LotteryGameMatch" => $match

            ], 201);
        }
        else {
            return response()->json([
                "message" => "Not enough permissions."
            ], 403);
        }
    }

    public function finishMatch($id)
    {
        $admin = Auth::user();
        if ($admin->is_admin) {
            if(LotteryGameMatch::where('id', $id)->exists()) {
                $match = LotteryGameMatch::find($id);
                if ($match->is_finished) {
                    return response()->json(['error' => 'The match has already been completed.'], 400);
                }
                $match->is_finished = true;
                $match->winner_id = User::inRandomOrder()->first()->id;
                $match->save();
                return response()->json([
                    "message" => "Match finished."
                ], 202);
            }
            else {
                return response()->json([
                    "message" => "Match not found."
                ], 404);
            }
        }
        else {
            return response()->json([
                "message" => "Not enough permissions."
            ], 403);
        }
    }

    public function getAllMatchOfGame(Request $request)
    {
        $match = new LotteryGameMatch;
        $match->game_id = $request->game_id;
        if(LotteryGameMatch::where('game_id', $match->game_id)->exists()) {
            $match = LotteryGameMatch::all();
            return response()->json($match);
        }
        else {
            return response()->json([
                "message" => "There are no match records for this game."
            ], 403);
        }
    }
}
