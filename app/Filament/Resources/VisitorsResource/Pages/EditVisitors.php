<?php

namespace App\Filament\Resources\VisitorsResource\Pages;

use App\Filament\Resources\VisitorsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVisitors extends EditRecord
{
    protected static string $resource = VisitorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
