<?php

namespace App\Filament\Resources\RegistrationUserResource\Pages;

use App\Filament\Resources\RegistrationUserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRegistrationUser extends CreateRecord
{
    protected static string $resource = RegistrationUserResource::class;
}
