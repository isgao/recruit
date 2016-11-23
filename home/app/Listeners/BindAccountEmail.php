<?php

namespace App\Listeners;

use App\Events\Register;
use App\Mail\BindAccount;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BindAccountEmail implements ShouldQueue
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
     * @param  Register  $event
     * @return void
     */
    public function handle(Register $event)
    {
        $when = \Carbon\Carbon::now()->addMinutes(1);
        Mail::to($event->user->email)->later($when,new BindAccount($event->user));
    }
}
