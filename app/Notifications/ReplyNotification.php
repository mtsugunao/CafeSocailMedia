<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Comment;
use App\Models\User;

class ReplyNotification extends Notification
{
    use Queueable;
    private Comment $reply;

    /**
     * Create a new notification instance.
     */
    public function __construct(Comment $reply)
    {
        $this->reply = $reply;
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
            'user_name' => $this->reply->user->name,
            'date' => $this->reply->created_at,
            'url' => route('post.comment.show', ['postId' => $this->reply->post_id]),
            'user_profile' => User::where('id', $this->reply->user->id)->firstOrFail()->profile_image,
            'title' => "replied on your comment",
            'content' => $this->reply->comment,
        ];
    }
}
