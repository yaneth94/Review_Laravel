<?php

namespace App\Listeners;

use App\Events\MessageWasReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNotificationToTheOwner implements ShouldQueue
{
    public function handle(MessageWasReceived $event)
    {
        //var_dump('Notificar al dueño');
       $message = $event->message;
        Mail::send('emails.contact',['msg' => $message],function($m) use ($message){
            $m->from($message->email, $message->nombre)
            ->to('zoilavillatoro6694@outlook.com','Zoila')
            ->subject('Tu mensaje fue recibido');
        });
    }
}
