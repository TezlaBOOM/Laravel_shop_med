<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\MailHelper;
use App\Http\Controllers\Controller;
use App\Mail\SubscriptionVerification;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Str;

class NewsletterController extends Controller
{
    public function newsletterRequest(Request $request)
    {
        $request->validate([
            'email' =>['required','email']
        ]);
        $existSubscriber = NewsletterSubscriber::where('email', $request->email)->first();

        if(!empty($existSubscriber)){
            if($existSubscriber->is_verified == 0){
                $existSubscriber->verified_token = \Str::random(25);
                $existSubscriber->save();
                // set mail config
                MailHelper::setMailConfig();
                // send mail
                Mail::to($existSubscriber->email)->send(new SubscriptionVerification($existSubscriber));

                return response(['status' => 'success', 'message' => 'Wysłano mail werfikacyjny sprawdź poczte']);

            }elseif($existSubscriber->is_verified == 1){
                return response(['status' => 'error', 'message' => 'Jesteś już subskrybentem']);
            }
        }else {
            $subscriber = new NewsletterSubscriber();
            $subscriber->email = $request->email;
            $subscriber->verified_token = \Str::random(25);
            $subscriber->is_verified = 0;
            $subscriber->save();

            // set mail config
            MailHelper::setMailConfig();

            // send mail
            Mail::to($subscriber->email)->send(new SubscriptionVerification($subscriber));

            return response(['status' => 'success', 'message' => 'Wysłano mail werfikacyjny sprawdź poczte']);
        }



    }
    public function newsLetterEmailVarify($token)
    {
        dd($token);
    }
}
