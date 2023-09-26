<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Mail\Auth\VerifyMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('client.authentication.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::register($request->except('password_confirm'));

        \Mail::to($user)->send(new VerifyMail($user));

        flash('Спасибо. Проверьте свой email для верификации.')->success();
        return redirect()->route('loginForm');
    }

    public function verify($token)
    {
        $user = User::where('verify_token', $token)->first();
        if (!$user) {
            return redirect()->route('home')
                ->with('error', 'Ваша ссылка не читается');
        }
        try {
            $user->verify();
            flash('Ваша почта подтверждена. Теперь вы можете войти.')->success();
            return redirect()->route('loginForm');
        } catch (\DomainException $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }
    }
}
