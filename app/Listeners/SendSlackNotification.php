<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Models\User;
use App\Notifications\PostCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendSlackNotification
{
    /**
     * @var User
     */
    private $user;

    /**
     * Create the event listener.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  PostPublished  $event
     * @return void
     */
    public function handle(PostPublished $event)
    {
        Notification::send($this->user->all(), new PostCreated($event->post));
    }
}
