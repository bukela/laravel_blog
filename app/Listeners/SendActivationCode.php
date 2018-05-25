<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\NewUser;
use App\User;



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
        // Mail::to(Auth::user()->email)->send(new NewUser()); --ne radi na ovaj nacin
        Mail::to($event->user->email)->send(new NewUser($event->user)); //mora da se prosledi i $event->user u NewUser
        
    }
}
