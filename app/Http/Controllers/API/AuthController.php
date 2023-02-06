<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'username' => $request['username'],
            'password' => $request['password'],
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json(
                [
                    "message" => "Invalid Credential"
                ]
            );
        }

        if (Auth::user()->verif == 'unverified') {
            return response()->json(
                [
                    'message' => 'Unverified User'
                ]
            );
        }

        $last_login = Carbon::now();

        $user = tap(User::where('id', Auth::user()->id))
            ->update(
                ['terakhir_login' => $last_login]
            )
            ->first();

        return response()->json(
            [
                "data" => $user,
                "token" => auth()->user()->createToken('secret')->plainTextToken
            ]
        );
    }
}
