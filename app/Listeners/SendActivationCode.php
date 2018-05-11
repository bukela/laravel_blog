<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
// use Mail;
use App\Mail\NewUser;
use Auth;


class SendActivationCode
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        \Log::info('activation', ['user' => $event->user]);
        // Mail::to(Auth::user()->email)->send(new NewUser());
        Mail::to('drnd@mail.com')->send(new NewUser());
        
    }
}
