<?php

namespace App\Filament\Resources\LearningStackResource\Pages;

use App\Filament\Resources\LearningStackResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageLearningStacks extends ManageRecords
{
    protected static string $resource = LearningStackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
