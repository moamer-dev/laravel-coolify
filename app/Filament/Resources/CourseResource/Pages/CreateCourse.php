<?php

namespace App\Filament\Resources\CourseResource\Pages;

use App\Filament\Resources\CourseResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CourseCreatedNotification;
use Illuminate\Support\Str;

class CreateCourse extends CreateRecord
{
    protected static string $resource = CourseResource::class;
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
        $course = $this->record;
        foreach ($this->processedSections as $processedSection) {
            $section = $course->sections()->create($processedSection['attributes']);
            foreach ($processedSection['lessons'] as $lessonData) {
                $lessonAttributes = $lessonData['data'] ?? [];
                $section->lessons()->create($lessonAttributes);
            }
        }

        $technologyStacks = $course->technologyStacks;
        $users = User::whereHas('learningPaths.learningStacks.technologyStacks', function ($query) use ($technologyStacks) {
            $query->whereIn('technology_stacks.id', $technologyStacks->pluck('id'));
        })->get();
        Notification::send($users, new CourseCreatedNotification($course));
    }
}
