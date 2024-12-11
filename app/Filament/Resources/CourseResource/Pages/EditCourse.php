<?php

namespace App\Filament\Resources\CourseResource\Pages;

use App\Filament\Resources\CourseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

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

     protected function mutateFormDataBeforeSave(array $data): array
    {
        if (isset($data['price_type'])) {
            if ($data['price_type'] == 'free') {
                $data['price'] = NULL;
                $data['tax'] = NULL;
                $data['vat'] = NULL;
                $data['currency_id'] = NULL;
                $data['discount_price'] = NULL;
                $data['discount_percentage'] = NULL;
                $data['discount_type'] = NULL;
            } 
        }
        if (isset($data['discount_type'])) {
            if ($data['discount_type'] == 'fixed_amount') {
                $data['discount_percentage'] = NULL;
            } else if ($data['discount_type'] == 'percentage') {
                $data['discount_price'] = NULL;
            }
        }

        return $data;
    }
}