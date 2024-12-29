<?php

namespace App\Filament\Resources\QuizResource\Pages;

use App\Filament\Resources\QuizResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\User;
use App\Notifications\QuizzCreatedNotification;
use Illuminate\Support\Facades\Notification;

class CreateQuiz extends CreateRecord
{
    protected static string $resource = QuizResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        unset($data['course_id']);
        return $data;
    }

    protected function afterCreate()
    {
        $quiz = $this->record;
        $technologyStacks = $quiz->technologyStacks;
        $users = User::whereHas('learningPaths.learningStacks.technologyStacks', function ($query) use ($technologyStacks) {
            $query->whereIn('technology_stacks.id', $technologyStacks->pluck('id'));
        })->get();
        Notification::send($users, new QuizzCreatedNotification($quiz));
    }
}
