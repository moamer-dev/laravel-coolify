<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ProjectCreatedNotification;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;
    protected $processedSections = [];
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $sections = $data['sections'] ?? [];
        unset($data['sections']);

        foreach ($sections as $sectionData) {
            $sectionAttributes = $sectionData['data'] ?? [];
            $lessons = $sectionAttributes['lessons'] ?? [];
            unset($sectionAttributes['lessons']);

            $this->processedSections[] = [
                'attributes' => $sectionAttributes,
                'lessons' => $lessons,
            ];
        }
        return $data;
    }

    protected function afterCreate()
    {
        $project = $this->record;
        foreach ($this->processedSections as $processedSection) {
            $section = $project->sections()->create($processedSection['attributes']);
            foreach ($processedSection['lessons'] as $lessonData) {
                $lessonAttributes = $lessonData['data'] ?? [];
                $section->lessons()->create($lessonAttributes);
            }
        }
        $technologyStacks = $project->courses->flatMap->technologyStacks;
        $users = User::whereHas('learningPaths.learningStacks.technologyStacks', function ($query) use ($technologyStacks) {
            $query->whereIn('technology_stacks.id', $technologyStacks->pluck('id'));
        })->get();
        Notification::send($users, new ProjectCreatedNotification($project));
    }
}
