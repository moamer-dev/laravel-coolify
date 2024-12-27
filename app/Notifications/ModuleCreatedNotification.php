<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ModuleCreatedNotification extends Notification
{
    use Queueable;

    protected $module;

    /**
     * Create a new notification instance.
     */
    public function __construct($module)
    {
        $this->module = $module;
        //dd($this->module);
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
            'module_id' => $this->module->id,
            'message' => "تمت إضافة '{$this->module->title}' إلى المسار التعليمي '{$this->module->learningStack->title}'",
            'learning_stack_id' => $this->module->learning_stack_id,
            'created_at' => $this->module->created_at,
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
