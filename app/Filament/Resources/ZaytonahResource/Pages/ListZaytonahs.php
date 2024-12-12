<?php

namespace App\Filament\Resources\ZaytonahResource\Pages;

use App\Filament\Resources\ZaytonahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZaytonahs extends ListRecords
{
    protected static string $resource = ZaytonahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
