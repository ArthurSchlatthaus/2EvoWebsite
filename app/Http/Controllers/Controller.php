<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Gmlist;
use App\Models\News;
use App\Models\Player;
use App\Models\Guild;
use App\Rules\MatchOldPassword;
use App\Rules\MatchOldPin;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    static public function setLocale($request)
    {
        App::setlocale($request);
    }

    public function routeError($request)
    {
        return view('welcome', [
            'error' => true,
        ]);
    }

    public static function sendResetEmail($email)
    {
        $betreff = '2Evo Passwort vergessen';
        $nachricht = 'Test';
        $header = 'From: no-reply@2evo.ga' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        try {
            mail($email, $betreff, $nachricht, $header);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getDataforStart()
    {
        $Statistic = Cache::get('statistic');
        $ranking_top10 = Cache::get('ranking_top10');
        $ranking_guild = Cache::get('ranking_guild');
        $news_all = Cache::get('news_all');
        $news_event = Cache::get('news_event');
        $news_server = Cache::get('news_server');

        if (isset($Statistic) and !empty($Statistic)) {
            return view('welcome', [
                'start_page' => true,
                'playerOnlineCounter' => $Statistic['add_15m'],
                'Statistic' => $Statistic,
                'ranking_top10' => $ranking_top10,
                'ranking_guild' => $ranking_guild,
                'news_all' => $news_all,
                'news_server' => $news_server,
                'news_event' => $news_event,
            ]);
        } else {
            return view('welcome', [
                'start_page' => true,
                'playerOnlineCounter' => 0,
                'Statistic' => $Statistic,
                'ranking_top10' => $ranking_top10,
                'ranking_guild' => $ranking_guild,
                'news_all' => $news_all,
                'news_server' => $news_server,
                'news_event' => $news_event,
            ]);
        }
    }

    public function securityQuestion()
    {
        request()->validate(['username' => 'required|max:16|min:4,login', 'pin' => 'required|max:4|min:3,pincode']);
        $user = Account::where("login", request()->username)->where("pincode", request()->pin)->get()->first();

        if ($user) {
            if (Gmlist::find($user->id)) {
                return back()->withErrors(trans('messages.accountNotFound'));
            } else {
                return view('welcome', [
                    'security_question' => true,
                    'question1' => $user->question1,
                    'question2' => $user->question2,
                    'question3' => $user->question3,
                    'userid' => $user->id,
                ]);
            }
        } else {
            return back()->withErrors(trans('messages.accountNotFound'));
        }
    }

    public function securityQuestionCheck()
    {
        $account = null;
        $answer1 = false;
        $answer2 = false;
        $answer3 = false;
        if (request()->input('userid') == true) {
            $account = Account::find(request()->input('userid'));
        }
        request()->validate([
            'answer1' => ['required', 'min:4', 'max:56'],
            'answer2' => ['required', 'min:4', 'max:56'],
            'answer3' => ['required', 'min:4', 'max:56'],
        ]);

        if ($account) {
            if (Hash::check(request()->answer1, $account->answer1)) {
                $answer1 = true;
            }
            if (Hash::check(request()->answer2, $account->answer2)) {
                $answer2 = true;
            }
            if (Hash::check(request()->answer3, $account->answer3)) {
                $answer3 = true;
            }
        }
        if ($answer1 == true and $answer2 == true and $answer3 == true) {
            request()->validate([
                'new_password' => ['required', 'min:4', 'max:30'],
                'new_confirm_password' => ['required', 'min:4', 'max:30'],
            ]);

            if (request()->new_password === request()->new_confirm_password) {
                Account::find($account->id)->update(['password' => request()->new_password]);
                return Redirect::to("/")->withErrors(trans('messages.success'));
            } else {
                return Redirect::to("forgot-password")->withErrors(trans('messages.noPsswdMatch'));
            }
        }
        return Redirect::to("forgot-password")->withErrors(trans('messages.wrongAnwser'));
    }


}
