<?php

namespace App\Http\Controllers\API\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileApiController extends Controller
{
    public function index()
    {
        return response()->json([
            "message" => "Successfully get data",
            'data' => Auth::user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $id = Auth::user()->id;

        $imageName = time() . '.' . $request->foto->extension();

        $request->foto->move(public_path('img'), $imageName);

        $user = User::find(Auth::user()->id)->update($request->all());

        $user2 = User::find($id)->update([
            "password" => Hash::make($request->password),
            "foto" => "/img/" . $imageName
        ]);
        if ($user && $user2) {
            return response()->json([
                "message" => "Successfully edit data",
            ]);
        }
    }
}
