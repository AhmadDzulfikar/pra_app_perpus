<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username(){
        return 'username';
    }

    public function authenticated(Request $request, $user) {
        // if($user->role == "admin"){
        //     return redirect()->route('admin.dashboard');
        // }
        // return redirect()->route('user.dashboard');

        if ($user->role == 'admin') {

            // Update terakhir_login
            $user->update([
                'terakhir_login' => Carbon::now()
            ]);


            return redirect()->route('admin.dashboard');
        }

        // dd($user->verif);


        if ($user->verif == 'unverified') {

            Session::flush();

            Auth::logout();

            return redirect()->back()->with('status', 'danger')->with('message', 'Gagal Login Unverified User');
        }

        return redirect()->route(
            'user.dashboard'
        );
    }   
}
