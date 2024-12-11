<?php

namespace App\Filament\Resources\CourseResource\Pages;

use App\Filament\Resources\CourseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditCourse extends EditRecord
{
    protected static string $resource = CourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    // protected function generateUniqueSlug(string $name, $section): string
    // {
    //     $slug = Str::slug($name);
    //     $originalSlug = $slug;
    //     $date = now()->format('Y-m-d');
    //     $counter = 1;

    //     while ($section->lessons()->where('slug', $slug)->exists()) {
    //         $slug = $originalSlug . '-' . $date . '-' . $counter++;
    //     }

    //     return $slug;
    // }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['price_type']) && $data['price_type'] === 'free') {
            $data['price'] = null;
            $data['tax'] = null;
            $data['vat'] = null;
            $data['currency_id'] = null;
            $data['discount_price'] = null;
            $data['discount_percentage'] = null;
            $data['discount_type'] = null;
        }

        if (isset($data['discount_type'])) {
            if ($data['discount_type'] === 'fixed_amount') {
                $data['discount_percentage'] = null;
            } elseif ($data['discount_type'] === 'percentage') {
                $data['discount_price'] = null;
            }
        }

        $sections = $data['sections'] ?? [];
        unset($data['sections']);

        $existingSectionIds = collect($sections)->pluck('id')->filter()->toArray();

        // Delete removed sections
        $this->record->sections()->whereNotIn('id', $existingSectionIds)->get()->each->forceDelete();

        foreach ($sections as $index => $sectionData) {
            $sectionAttributes = $sectionData['data'];
            $lessons = $sectionAttributes['lessons'] ?? [];
            unset($sectionAttributes['lessons']);

            // Set the section order
            $sectionAttributes['order'] = $index;

            // Update or create the section
            $section = $this->record->sections()->updateOrCreate(
                ['id' => $sectionData['id'] ?? null],
                $sectionAttributes
            );

            // Collect existing lesson IDs to preserve or update
            $existingLessonIds = collect($lessons)->pluck('id')->filter()->toArray();

            // Delete removed lessons
            $section->lessons()->whereNotIn('id', $existingLessonIds)->get()->each->forceDelete();

            foreach ($lessons as $lessonIndex => $lessonData) {
                $lessonAttributes = $lessonData['data'];
                // Set the lesson order
                $lessonAttributes['order'] = $lessonIndex;

                // Ensure a unique slug
                // $lessonAttributes['slug'] = $this->generateUniqueSlug(
                //     $lessonAttributes['name'] ?? $lessonAttributes['slug'],
                //     $section
                // );

                // Update or create the lesson
                $section->lessons()->updateOrCreate(
                    ['id' => $lessonData['id'] ?? null],
                    $lessonAttributes
                );
            }
        }

        return $data;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data = parent::mutateFormDataBeforeFill($data);
        $data['sections'] = $this->record->sections()
            ->orderBy('order')
            ->with('lessons')
            ->get()
            ->map(function ($section) {
                return [
                    'id' => $section->id,
                    'type' => 'section',
                    'data' => [
                        'name' => $section->name,
                        'description' => $section->description,
                        'lessons' => $section->lessons->sortBy('order')->map(function ($lesson) {
                            return [
                                'id' => $lesson->id,
                                'type' => 'lesson',
                                'data' => [
                                    'name' => $lesson->name,
                                    //'slug' => $lesson->slug,
                                    'description' => $lesson->description,
                                    'has_video' => $lesson->has_video,
                                    'video_source' => $lesson->video_source,
                                    'youtube_url' => $lesson->youtube_url,
                                    'vimeo_url' => $lesson->vimeo_url,
                                    'file_path' => $lesson->file_path,
                                    'video_duration' => $lesson->video_duration,
                                    'is_preview' => $lesson->is_preview,
                                    'content' => $lesson->content,
                                    'is_active' => $lesson->is_active,
                                ],
                            ];
                        })->values()->toArray(),
                    ],
                ];
            })->toArray();

        return $data;
    }
}
