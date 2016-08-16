<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PostCreated extends Notification implements ShouldQueue
{
    use Queueable;
    /**
     * @var Post
     */
    private $post;

    /**
     * Create a new notification instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification channels.
     *
     * @param  mixed $notifiable
     *
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', 'https://laravel.com')
            ->line('Thank you for using our application!');
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param  mixed $notifiable
     *
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        $url = url("story/{$this->post->created_at->format('Y-m-d')}/{$this->post->permalink}");

        return (new SlackMessage)
            ->success()
            ->content("{$this->post->user->name} has published a new story")
            ->attachment(function ($attachment) use ($url) {
                $attachment->title($this->post->title, $url)
                    ->fields([
                        'Content' => strip_tags($this->post->short_description),
                    ]);
            });
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
