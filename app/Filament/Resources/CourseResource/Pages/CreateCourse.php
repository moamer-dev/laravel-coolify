<?php

namespace App\Filament\Resources\CourseResource\Pages;

use App\Filament\Resources\CourseResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Course;
use Illuminate\Support\Str;

class CreateCourse extends CreateRecord
{
    protected static string $resource = CourseResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $sections = $data['sections'] ?? [];
        unset($data['sections']);

        $course = Course::create($data);

        foreach ($sections as $sectionData) {
            $sectionAttributes = $sectionData['data'];
            $lessons = $sectionAttributes['lessons'] ?? [];
            unset($sectionAttributes['lessons']);

            $section = $course->sections()->create($sectionAttributes);

            foreach ($lessons as $lessonData) {
                $lessonAttributes = $lessonData['data'];
                //$lessonAttributes['slug'] = $lessonAttributes['slug'] ?? Str::slug($lessonAttributes['name']);
                $section->lessons()->create($lessonAttributes);
            }
        }
        dd($data);
        return $data;
    }
}
