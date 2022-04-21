<?php

namespace App\Listeners;

use App\Events\ProductCreated;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NewProductNotification
{
    /**
     * Handle the event.
     *
     * @param  ProductCreated  $event
     * @return void
     */
    public function handle(ProductCreated $event)
    {
        foreach(User::all() as $user)
        {
            Mail::to($user->email)->send(new \App\Mail\ProductCreated($event->product));
        }
    }
}
