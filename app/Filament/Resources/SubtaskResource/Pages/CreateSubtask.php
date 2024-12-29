<?php

namespace App\Filament\Resources\SubtaskResource\Pages;

use App\Filament\Resources\SubtaskResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\User;
use App\Notifications\TaskCreatedNotification;
use Illuminate\Support\Facades\Notification;

class CreateSubtask extends CreateRecord
{
    protected static string $resource = SubtaskResource::class;

    protected function afterCreate()
    {
        $subtask = $this->record;
        $users = $subtask->task->module->learningStack->learningPaths()
            ->with('users')
            ->get()
            ->pluck('users')
            ->flatten()
            ->unique('id');
        Notification::send($users, new TaskCreatedNotification($subtask));
    }
}
