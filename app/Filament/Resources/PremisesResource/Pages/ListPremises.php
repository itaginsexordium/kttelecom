<?php

namespace App\Filament\Resources\PremisesResource\Pages;

use App\Filament\Resources\PremisesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPremises extends ListRecords
{
    protected static string $resource = PremisesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
