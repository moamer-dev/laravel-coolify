<?php

namespace App\Filament\Resources\ModuleResource\Pages;

use App\Filament\Resources\ModuleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\User;

class CreateModule extends CreateRecord
{
    protected static string $resource = ModuleResource::class;

    // protected function beforeCreate(array $data): void
    // {

    // }
}
