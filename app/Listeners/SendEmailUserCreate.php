<?php

namespace App\Listeners;

use App\Events\CreateUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailUserCreate
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
     * @param  CreateUser  $event
     * @return void
     */
    public function handle(CreateUser $event)
    {
        \Mail::to('hoangnq.jvb@gmail.com')->send(new SendMailable($name,$email));
    }
}
