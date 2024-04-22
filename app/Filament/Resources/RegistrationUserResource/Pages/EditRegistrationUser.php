<?php

namespace App\Filament\Resources\RegistrationUserResource\Pages;

use App\Filament\Resources\RegistrationUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegistrationUser extends EditRecord
{
    protected static string $resource = RegistrationUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
