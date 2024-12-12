<?php

namespace App\Filament\Resources\ProjectResource\Pages;

use App\Filament\Resources\ProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Project;

class CreateProject extends CreateRecord
{
    protected static string $resource = ProjectResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $sections = $data['sections'] ?? [];
        unset($data['sections']);

        $course = Project::create($data);

        foreach ($sections as $sectionData) {
            $sectionAttributes = $sectionData['data'];
            $lessons = $sectionAttributes['lessons'] ?? [];
            unset($sectionAttributes['lessons']);

            $section = $course->sections()->create($sectionAttributes);

            foreach ($lessons as $lessonData) {
                $lessonAttributes = $lessonData['data'];
                $section->lessons()->create($lessonAttributes);
            }
        }
        return $data;
    }
}
