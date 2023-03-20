<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $request->validate(
            [
                'login_register' => 'required|unique:account,login,' . $request['login_register'] . '|max:16|min:4',
                'email' => 'email|min:4|confirmed|unique:account',
                'password_register' => 'required|max:30|min:4|confirmed',
                'social_id' => 'required|digits:7',
            ],
        );
        $data = $request->all();
        $user = $this->create($data);
        Auth::login($user);
        $request->session()->regenerate();
        return redirect('/user')->with('message', trans('messages.successRegister'));
    }

    public function create(array $data)
    {

        return Account::create([
            'login' => $data['login_register'],
            'email' => $data['email'],
            'password' => $data['password_register'],
            'social_id' => $data['social_id']
        ]);
    }

}
