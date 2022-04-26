<?php

namespace App\Listeners;

use App\Events\OtpRequestEvent;
use App\Mail\OtpSenderMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendOtpEmailUser implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OtpRequestEvent  $event
     * @return void
     */
    public function handle(OtpRequestEvent $event)
    {
        $event->user->generate_otp_code();
        Mail::to($event->user)->send(new OtpSenderMail($event->user));
    }
}
