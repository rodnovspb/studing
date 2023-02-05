<?php

namespace App\Listeners;

use App\Events\GoodDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeleteGoodListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(GoodDeleted $event)
    {

    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\GoodDeleted  $event
     * @return void
     */
    public function handle(GoodDeleted $event)
    {
//        dd($event);
    }
}
