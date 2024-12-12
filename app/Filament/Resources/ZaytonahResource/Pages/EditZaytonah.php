<?php

namespace App\Filament\Resources\ZaytonahResource\Pages;

use App\Filament\Resources\ZaytonahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZaytonah extends EditRecord
{
    protected static string $resource = ZaytonahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
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
        if (isset($data['video_source'])) {
            if ($data['video_source'] === 'youtube') {
                $data['vimeo_url'] = null;
                $data['file_path'] = null;
            } elseif ($data['video_source'] === 'vimeo') {
                $data['youtube_url'] = null;
                $data['file_path'] = null;
            } elseif ($data['video_source'] === 'file') {
                $data['youtube_url'] = null;
                $data['vimeo_url'] = null;
            }
        }

        return $data;
    }
}
