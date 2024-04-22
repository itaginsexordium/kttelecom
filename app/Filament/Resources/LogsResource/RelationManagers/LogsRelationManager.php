<?php

namespace App\Filament\Resources\LogsResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LogsRelationManager extends RelationManager
{
    protected static string $relationship = 'logs';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('логи показаний')
            ->columns([
                TextColumn::make('id')->rowIndex(),
                TextColumn::make('log')->badge()->color('info')->label('Показания')->numeric(),
                TextColumn::make('created_at')->since()->label('создано')->icon('heroicon-o-clock')->iconColor('primary')
            ]);
    }
}
