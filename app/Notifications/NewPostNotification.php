<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Post;
use App\Models\User;

class NewPostNotification extends Notification
{
    use Queueable;

    private Post $post;

    /**
     * Create a new notification instance.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'user_name' => $this->post->user->name,
            'title' => "A new post",
            'user_profile' => User::where('id', $this->post->user->id)->firstOrFail()->profile_image,
            'content' => $this->post->content,
            'date' => $this->post->created_at,
            'url' => route('cafeseeker', ['userId' => $this->post->user->id]),
        ];
    }
}
