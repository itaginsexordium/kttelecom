<?php

namespace App\Filament\Resources\TarifLogResource\Pages;

use App\Filament\Resources\TarifLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTarifLogs extends ListRecords
{
    protected static string $resource = TarifLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
