<?php

namespace App\Filament\Resources\TechnologyStackResource\Pages;

use App\Filament\Resources\TechnologyStackResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTechnologyStacks extends ManageRecords
{
    protected static string $resource = TechnologyStackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
