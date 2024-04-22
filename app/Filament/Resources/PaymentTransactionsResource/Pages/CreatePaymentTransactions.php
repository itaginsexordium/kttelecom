<?php

namespace App\Filament\Resources\PaymentTransactionsResource\Pages;

use App\Filament\Resources\PaymentTransactionsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePaymentTransactions extends CreateRecord
{
    protected static string $resource = PaymentTransactionsResource::class;
}
