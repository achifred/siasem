<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddfileListener implements ShouldQueue
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
        $input = "/home/loyal/workspace/php/siasem/public/audios/$event->file";
        $cmd ="/usr/bin/ffmpeg -i $input -b:v 150k -bufsize 150k ";
        $res= system($cmd);
    }
}
