<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Successfully logout '
        ]);
    }

    public function register(Request $request)
    {

        // Validating data that user store
        $validator  =   Validator::make($request->all(), [
            'nis' => 'required',
            'fullname' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
        ]);

        if ($validator->fails()) {

            //Rules for error
            $error = $validator->errors();

            return response()->json(

                [
                    "message" => $error
                ]
            );
        } else {
            $kode = User::where('role', 'user')->count();

            $user = User::create(
                [
                    'kode' => 'AA00' . $kode + 1,
                    'nis' => $request->nis,
                    'fullname' => $request->fullname,
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'kelas' => $request->kelas,
                    'alamat' => $request->alamat,
                    'verif' => 'unverified',
                    'role' => 'user',
                    'join_date' => Carbon::now()
                ]
            );
            return response()->json([
                'message' => "Berhasil Register",
                "data" => $user,
            ]);
        }
    }
}
