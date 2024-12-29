<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class QuizzCreatedNotification extends Notification
{
    use Queueable;

    protected $quizz;
    /**
     * Create a new notification instance.
     */
    public function __construct($quizz)
    {
        $this->quizz = $quizz;
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
            'quizz_id' => $this->quizz->id,
            'message' => "تمت إضافة اختبار '{$this->quizz->title}'",
            //'learning_stack_id' => $this->quizz->learning_stack_id,
            'href' => route('quiz.index', $this->quizz->slug),
            'created_at' => $this->quizz->created_at,
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
