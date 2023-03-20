<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Functions\UserMenu;
use App\Models\Account;
use App\Models\Player;
use App\Models\PlayerIndex;
use App\Rules\MatchOldPin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\User;
use App\Rules\MatchOldPassword;
use App\Rules\MatchOldEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Log;
use DateTimeZone;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $job_icon = array(
            0 => 'icon_mwarrior2.png',
            1 => 'icon_wninja2.png',
            2 => 'icon_msura2.png',
            3 => 'icon_wshaman2.png',
            4 => 'icon_wwarrior2.png',
            5 => 'icon_mninja2.png',
            6 => 'icon_wsura2.png',
            7 => 'icon_mshaman2.png',
        );

        if (Auth::check()) {
            $acc_id = Auth::id();
            $chars = Player::where('account_id', $acc_id)->get();
            if (sizeof($chars) < 1) {
                $chars = [0];
            }
            $no_email = false;
            $acc = Account::find($acc_id);
            if ($acc->email == null)
                $no_email = true;
            $no_question = false;
            if ($acc->question1 == null or $acc->question2 == null or $acc->question3 == null)
                $no_question = true;
            return view('welcome',
                ['user_page' => true,
                    'chars' => $chars,
                    'job_icon' => $job_icon,
                    'no_email' => $no_email,
                    'no_question' => $no_question,
                ]);
        }

        return redirect()->to('/');
    }

    public function changePasswordGET()
    {
        return view('welcome', [
            'change_password' => true
        ]);
    }

    public function changeMailGET()
    {
        return view('welcome', [
            'change_mail' => true
        ]);
    }

    public function addQuestionGET()
    {
        return view('welcome', [
            'add_question' => true
        ]);
    }

    public function changePinGET()
    {
        return view('welcome', [
            'change_pin' => true
        ]);
    }

    public function changePassword()
    {
        request()->validate([
            'current_password' => ['min:4', 'max:30', 'required', new MatchOldPassword],
            'new_password' => ['required', 'min:4', 'max:30'],
            'new_confirm_password' => ['required', 'same:new_password'],
        ]);
        Account::find(auth()->user()->id)->update(['password' => request()->new_password]);
        return back()->with('message', trans('messages.successChangePassword'));
    }

    public function changePin()
    {
        request()->validate([
            'currPin' => ['min:3', 'max:4', 'required', new MatchOldPin],
            'newPin' => ['required', 'min:3', 'max:4'],
            'newPin_confirm' => ['required', 'min:3', 'max:4', 'same:newPin'],
        ]);
        if (request()->newPin === request()->newPin_confirm) {
            $acc = Account::find(auth()->user()->id);
            if ($acc) {
                $acc->pincode = request()->newPin;
                $acc->save();
                return back()->with('message', trans('messages.successChangePin'));
            }
        }
        return back()->withError(trans('messages.wrongPin'));
    }

    public function changeMail()
    {
        //Bestätigungslink an neue Mail
        request()->validate([
            'current_email' => ['min:4', 'max:30', 'required', 'email', new MatchOldEmail],
            'new_email' => ['required', 'min:4', 'max:30', 'email', 'unique:account,email'],
            'new_confirm_email' => ['required', 'same:new_email', 'email'],
        ]);
        Account::find(auth()->user()->id)->update(['email' => request()->new_email]);
        return back()->with('message', trans('messages.successChangeEmail'));
    }

    public function addMail()
    {
        //Bestätigungslink an neue Mail
        request()->validate([
            'new_email' => ['required', 'min:4', 'max:30', 'email', 'unique:account,email'],
            'new_confirm_email' => ['required', 'same:new_email', 'email'],
        ]);
        if (auth()->user()->email == null) {
            Account::find(auth()->user()->id)->update(['email' => request()->new_email]);
            return back()->with('message', trans('messages.successChangeEmail'));
        }
        return back()->withError(trans('messages.allreadyHasMail'));
    }

    public function addQuestion()
    {
        $account = Account::find(auth()->user()->id);

        if (request()->input('qa1') == true) {
            request()->validate(['question1' => ['required', 'min:4', 'max:56'], 'answer1' => ['required', 'min:4', 'max:56'],]);
            if ($account) {
                $account->question1 = request()->question1;
                $account->answer1 = Hash::make(request()->answer1);
                $account->save();
            }
        }
        if (request()->input('qa2') == true) {
            request()->validate(['question2' => ['required', 'min:4', 'max:56'], 'answer2' => ['required', 'min:4', 'max:56'],]);
            if ($account) {
                $account->question2 = request()->question2;
                $account->answer2 = Hash::make(request()->answer2);
                $account->save();
            }
        }
        if (request()->input('qa3') == true) {
            request()->validate(['question3' => ['required', 'min:4', 'max:56'], 'answer3' => ['required', 'min:4', 'max:56'],]);
            if ($account) {
                $account->question3 = request()->question3;
                $account->answer3 = Hash::make(request()->answer3);
                $account->save();
            }
        } elseif (request()->input('qa1') == true and request()->input('qa2') == true and request()->input('qa3') == true) {
            request()->validate([
                'question1' => ['required', 'min:4', 'max:56'],
                'answer1' => ['required', 'min:4', 'max:56'],
                'question2' => ['required', 'min:4', 'max:56'],
                'answer2' => ['required', 'min:4', 'max:56'],
                'question3' => ['required', 'min:4', 'max:56'],
                'answer3' => ['required', 'min:4', 'max:56'],
            ]);
            if ($account) {
                $account->question1 = request()->question1;
                $account->answer1 = Hash::make(request()->answer1);
                $account->question2 = request()->question2;
                $account->answer2 = Hash::make(request()->answer2);
                $account->question3 = request()->question3;
                $account->answer3 = Hash::make(request()->answer3);
                $account->save();
            }
        }
        return back()->with('message', trans('messages.successAddQuestion'));
    }

    public function unstuckPOST()
    {
        $charID = request();
        if (!$charID->charachterid) {
            return back()->withErrors(trans('messages.chooseChar'));
        }

        $id = Player::find($charID->charachterid);

        $tz = 'Europe/Berlin';
        $timestamp = time();
        $date1 = new DateTime($id->last_play, new DateTimeZone($tz));
        $date2 = new DateTime("now", new DateTimeZone($tz));
        $date2->setTimestamp($timestamp);
        $date2->format('d.m.Y, H:i:s');

        if (date_diff($date1, $date2)->m < 1) {
            if (date_diff($date1, $date2)->d < 1) {
                if (date_diff($date1, $date2)->h < 1) {
                    if (date_diff($date1, $date2)->i < 10) {
                        return back()->withErrors(trans('messages.dateDif_1') . (string)date_diff($date1, $date2)->i . trans('messages.dateDif_2') . (string)(10 - date_diff($date1, $date2)->i) . trans('messages.dateDif_3'));
                    }
                }
            }
        }


        if (Auth::user()->id === $id->account_id) {
            $empire = PlayerIndex::find(Auth::user()->id);
            $empire = $empire->empire;
            switch ($empire) {
                case 3:
                    {
                        $x = 966300 + rand(-300, 300);
                        $y = 288300 + rand(-300, 300);
                        $map_index = 41;
                    }
                    break;
                case 2:
                    {
                        $x = 45700 + rand(-300, 300);
                        $y = 166500 + rand(-300, 300);
                        $map_index = 21;
                    }
                    break;
                case 1:
                    {
                        $x = 457100 + rand(-300, 300);
                        $y = 946900 + rand(-300, 300);
                        $map_index = 1;
                    }
                    break;
                default:
                    $x = 457100 + rand(-300, 300);
                    $y = 946900 + rand(-300, 300);
                    $map_index = 1;
                    break;
            }
            $char = Player::find($charID->charachterid);
            $char->x = $x;
            $char->y = $y;
            $char->map_index = $map_index;
            if ($char->save())
                return back()->with('message', trans('messages.unstuckSuccess'));
            else
                return back()->withErrors(trans('messages.unstuckError'));
        }

    }

    public function forgotPinGET()
    {
        return view('welcome', [
            'forgot_pin' => true
        ]);
    }

    public function forgotPin()
    {
        request()->validate([
            'currPassword' => ['required', 'max:30', 'min:4', new MatchOldPassword()],
            'newPin' => ['required', 'min:3', 'max:4'],
            'newPin_confirm' => ['required', 'min:3', 'max:4', 'same:newPin'],
        ]);
        $acc = Account::find(auth()->user()->id);
        if ($acc) {
            $acc->pincode = request()->newPin;
            $acc->save();
            return back()->with('message', trans('messages.successChangePin'));
        }
        return back()->withError(trans('messages.wrongPin'));
    }
}
