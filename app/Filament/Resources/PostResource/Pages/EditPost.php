<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave($data): array
    {

        $record = $this->record;

        if (isset($data['image']) && $data['image'] !== $record->image) {
            if ($record->image && Storage::disk('public')->exists($record->image)) {
                Storage::disk('public')->delete($record->image);
            }
        }
        return $data;
    }
}
