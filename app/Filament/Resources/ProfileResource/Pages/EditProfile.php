<?php

namespace App\Filament\Resources\ProfileResource\Pages;

use App\Filament\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditProfile extends EditRecord
{
    protected static string $resource = ProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave($data): array
    {

        $record = $this->record;

        if (isset($data['avatar']) && $data['avatar'] !== $record->avatar) {
            if ($record->avatar && Storage::disk('public')->exists($record->avatar)) {
                Storage::disk('public')->delete($record->avatar);
            }
        }
        return $data;
    }
}
