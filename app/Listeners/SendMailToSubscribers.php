<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Mail\PostCreated;
use App\Models\Subscriber;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMailToSubscribers
{
    /**
     * @var Subscriber
     */
    public $subscriber;

    /**
     * Create the event listener.
     *
     * @param Subscriber $subscriber
     */
    public function __construct(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * Handle the event.
     *
     * @param  PostPublished  $event
     * @return void
     */
    public function handle(PostPublished $event)
    {
        Mail::to($this->subscriber->all())->queue(new PostCreated($event->post));
    }
}
