<?php

namespace App\Livewire\User;

use Livewire\Component;

class Notifications extends Component
{
    public $user;
    public $unreadNotifications;
    public $readNotifications;

    public function mount($user)
    {
        $this->user = $user;
        $this->unreadNotifications = $user->unreadNotifications;
        $this->readNotifications = $user->readNotifications;
        //dd($this->unreadNotifications->count() != 0);
    }

    public function markAsRead($notificationId)
    {
        //dd($notificationId);
        $this->user->notifications->where('id', $notificationId)->markAsRead();
        $this->unreadNotifications = $this->user->unreadNotifications;
        $this->readNotifications = $this->user->readNotifications;
        $this->dispatch('toastify', [
            'message' => 'تم اضافة تعليقك بنجاح!',
            'type' => 'success',
        ]);
    }

    public function render()
    {
        return view('livewire.user.notifications');
    }
}
