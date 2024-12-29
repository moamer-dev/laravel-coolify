<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskCreatedNotification extends Notification
{
    use Queueable;

    protected $subtask;
    /**
     * Create a new notification instance.
     */
    public function __construct($subtask)
    {
        $this->subtask = $subtask;
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
            'subtask_id' => $this->subtask->id,
            'message' => "تمت إضافة مهمة '{$this->subtask->title}' إلى المهمة الرئيسية '{$this->subtask->task->title}'",
            'task_id' => $this->subtask->task_id,
            'href' => route('user.subtask-view', ['id' => $this->subtask->task_id, 'subtask' => $this->subtask->id]),
            'created_at' => $this->subtask->created_at,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return $this->toDatabase($notifiable);
    }
}
