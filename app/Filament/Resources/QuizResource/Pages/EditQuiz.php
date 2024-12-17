<?php

namespace App\Filament\Resources\QuizResource\Pages;

use App\Filament\Resources\QuizResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\Section;

class EditQuiz extends EditRecord
{
    protected static string $resource = QuizResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        
            if (isset($data['section_id'])) {
            $section = Section::find($data['section_id']);
            
            if ($section ) {
                $data['course_id'] = $section->sectionable_id;
            }
        }
        
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        unset($data['course_id']);
        if (isset($data['is_timed']) && $data['is_timed'] === false) {
            $data['duration'] = null;
            $data['duration_unit'] = null;
        }
        if (isset($data['type']) && $data['type'] !== 'course') {
            $data['section_id'] = null;
        }
    return $data;
}
}