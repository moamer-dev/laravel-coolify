<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewLearningPathItemNotification extends Notification
{
    use Queueable;

    protected $type;
    protected $title;
    protected $pathId;

    /**
     * Create a new notification instance.
     */
    public function __construct($type, $title, $pathId)
    {
        $this->type = $type; // "Course" or "Quiz"
        $this->title = $title;
        $this->pathId = $pathId;
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
     * Get the mail representation of the notification.
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'type' => $this->type,
            'title' => $this->title,
            'path_id' => $this->pathId,
            'message' => "A new {$this->type} titled '{$this->title}' has been added to your learning path.",
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
