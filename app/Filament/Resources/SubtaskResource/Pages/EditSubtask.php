<?php

namespace App\Filament\Resources\SubtaskResource\Pages;

use App\Filament\Resources\SubtaskResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Progress;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EditSubtask extends EditRecord
{
    protected static string $resource = SubtaskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    // protected function afterSave(): void
    // {
    //     $subtask = $this->record;

    //     // Fetch all users who are associated with the subtask's task/module
    //     $userId = Auth::user()->id;

    //     $progress = Progress::updateOrCreate(
    //         [
    //             'user_id' => $userId,
    //             'subtask_id' => $subtask->id,
    //         ],
    //         [
    //             'status' => $subtask->status,
    //             'completion_time' => $subtask->status === 'completed' ? now()->diffInMinutes($subtask->created_at) : null,
    //             'completion_percentage' => $subtask->status === 'completed' ? 100 : 0,
    //         ]
    //     );
    // }
}
