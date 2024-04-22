<?php

namespace App\Filament\Resources\RegistrationUserResource\Pages;

use App\Filament\Resources\RegistrationUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegistrationUsers extends ListRecords
{
    protected static string $resource = RegistrationUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
