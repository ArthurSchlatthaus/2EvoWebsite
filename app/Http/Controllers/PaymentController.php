<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class PaymentController
{
    public function checkall(Request $request)
    {
        if (auth()->user()) {
            if ($request->cardType == '...' or $request->amount == '...' or $request->currency == '...' or $request->voucher == '') {
                return back()->withErrors([
                    'donate' => trans('messages.fillAllInput'),
                ]);
            } else {
                $donation = new Donation();
                $donation->type = $request->cardType;
                $donation->amount = $request->amount;
                $donation->currency = $request->currency;
                $donation->voucher = $request->voucher;
                $donation->account_id = auth()->user()->id;
                $donation->token = $request->_token;
                $donation->save();

                if ($request->cardType == 'psc') {
                    $this->sendSMS($request->amount,$request->_token);
                }

                return back()->with('message', trans('messages.successDonation'));
            }
        }
    }
    public function sendSMS($amount,$token){
        $basic  = new \Vonage\Client\Credentials\Basic("b4b319d5", "G7wPNWObe70KBT66");
        $client = new \Vonage\Client($basic);
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("4917624897600", "2EVO-TEAM", 'Neue PSC('.$amount.'€) token: '.$token)
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
