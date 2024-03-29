<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update(Request $request, $id)
    {
        if (Auth::id() == $id) {
            if(User::where('id', $id)->exists()) {
                $user = User::find($id);
                $user->first_name = is_null($request->first_name) ? $user->first_name : $request->first_name;
                $user->last_name = is_null($request->last_name) ? $user->last_name : $request->last_name;
                $user->email = is_null($request->email) ? $user->email : $request->email;
                $user->save();
                return response()->json([
                    "message" => "User update."
                ], 202);
            }
            else {
                return response()->json([
                    "message" => "User not found."
                ], 404);
            }
        }
        else {
            return response()->json([
                "message" => "User is not authorized."
            ], 403);
        }
    }

    public function destroy($id)
    {
        if (Auth::id() == $id) {
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
        else {
            return response()->json([
                "message" => "User is not authorized."
            ], 403);
        }
    }

    public function getAll()
    {
        $admin = Auth::user();
        if ($admin->is_admin) {
            $user = User::with('matchesOfUsers')->get();
            return response()->json($user);
        }
        else {
            return response()->json([
                "message" => "Not enough permissions."
            ], 403);
        }
    }
}
