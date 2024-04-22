<?php

namespace App\Filament\Resources\PaymentTransactionsResource\Pages;

use App\Filament\Resources\PaymentTransactionsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaymentTransactions extends EditRecord
{
    protected static string $resource = PaymentTransactionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
