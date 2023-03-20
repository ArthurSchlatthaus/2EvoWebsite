<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'login'=> 'required|max:16|min:4',
            'password' => 'required|max:30|min:4',
        ]);

        $credentials['password']=Account::mysql_password_hash($credentials['password']);

        $user = Account::where([
            ["login", $credentials['login']],
            ["password", $credentials['password']],
        ])->get()->first();
        if (isset($user)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect('/user')->with('message', trans('messages.successLogin'));
        }
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect('/')->with('message', trans('messages.successLogout'));
    }

}
