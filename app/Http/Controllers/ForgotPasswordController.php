<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Account;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email_forgot' => 'required|email|exists:account,email',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email_forgot,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email_forgot);
            $message->subject('2Evo Password Reset Link');
        });
        return back()->with('message', trans('messages.successSendLink'));
    }

    public function showResetPasswordForm($token) {
        return view('welcome', ['token' => $token,'forget_password_link'=>true]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:account',
            'password' => 'required|string|min:4|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = Account::where('email', $request->email)
            ->update(['password' => Account::mysql_password_hash($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/')->with('message', trans('message', 'Your password has been changed!'));
    }
}
