<?php

namespace App\Filament\Resources\LessonResource\Pages;

use App\Filament\Resources\LessonResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLessons extends ManageRecords
{
    protected static string $resource = LessonResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['has_video']) && $data['has_video'] === false) {
            $data['video_source'] = null;
            $data['youtube_url'] = null;
            $data['vimeo_url'] = null;
            $data['file_path'] = null;
            $data['video_duration'] = null;
        }

        return $data;
    }
}
