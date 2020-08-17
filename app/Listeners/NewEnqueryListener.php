<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\Enquerymail;
class NewEnqueryListener implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $details = $event->details;
        $email = $event->email;
        $subject = $event->subject;
        Mail::to('fachiloyalti@gmail.com')->send(new Enquerymail($details, $email, $subject) );
    }
}
