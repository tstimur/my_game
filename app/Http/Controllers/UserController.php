<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(Request $request, $id)
    {
        Auth::id();


        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->first_name = is_null($request->first_name) ? $user->first_name : $request->first_name;
            $user->last_name = is_null($request->last_name) ? $user->last_name : $request->last_name;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->save();
            return response()->json([
                "message" => "User update."
            ], 404);
        }
        else {
            return response()->json([
                "message" => "User not found."
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                "message" => "User deleted."
            ], 202);
        }
        else {
            return response()->json([
                "message" => "User not found."
            ], 404);
        }
    }

    public function getAll()
    {
        $user = User::all();
        return response()->json($user);
    }
}
