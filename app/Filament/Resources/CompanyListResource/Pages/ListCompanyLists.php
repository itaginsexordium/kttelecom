<?php

namespace App\Filament\Resources\CompanyListResource\Pages;

use App\Filament\Resources\CompanyListResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanyLists extends ListRecords
{
    protected static string $resource = CompanyListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
