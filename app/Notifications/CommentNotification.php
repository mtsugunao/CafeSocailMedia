<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Comment;
use App\Models\User;

class CommentNotification extends Notification
{
    use Queueable;
    private Comment $comment;

    /**
     * Create a new notification instance.
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
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
            'user_name' => $this->comment->user->name,
            'date' => $this->comment->created_at,
            'url' => route('post.comment.show', ['postId' => $this->comment->post_id]),
            'user_profile' => User::where('id', $this->comment->user->id)->firstOrFail()->profile_image,
            'title' => "commented on your post",
            'content' => $this->comment->comment,
        ];
    }
}
