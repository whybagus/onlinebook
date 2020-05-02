<?php

namespace App\Listeners\Auth;

use App\Events\Auth\UserActivationEmail;
use App\Libraries\SendResponse;
use App\Mail\Auth\ActivationEmail;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendActivationEmail
{
    public $user;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**p
     * Handle the event.
     *
     * @param  UserActivationEmail  $event
     * @return void
     */
    public function handle(UserActivationEmail $event)
    {
        if ($event->user->email_verify) {
            return;
        }

        $sendMail = Mail::to($event->user->email)->send(new ActivationEmail($event->user));
        if (!$sendMail) {
            User::where('email', $event->user->email)->delete();
            return SendResponse::error($message = 'Connection failed to send to your email');
        }
    }
}
