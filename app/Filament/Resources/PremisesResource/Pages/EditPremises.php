<?php

namespace App\Filament\Resources\PremisesResource\Pages;

use App\Filament\Resources\PremisesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPremises extends EditRecord
{
    protected static string $resource = PremisesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
