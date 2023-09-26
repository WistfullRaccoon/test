<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm(Request $request)
    {
        return view('client.authentication.login');
    }

    public function login(LoginRequest $request)
    {
        $authenticate = Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);

        if($authenticate) {
            $user = Auth::user();

            if ($user->isWait()) {
                Auth::logout();
                return back()->with('error', 'You need to confirm your account. Please check your email.');
            }
            return redirect()->route('loginForm');
        }
        return redirect()->back()->with('error', 'Invalid login or password');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
