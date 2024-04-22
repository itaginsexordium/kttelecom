<?php

namespace App\Filament\Resources\RegistrationUserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class VisitorsRelationManager extends RelationManager
{
    protected static string $relationship = 'registrationUser';
    
    protected static ?string $title = 'Зарегистрированные участники';
    protected static ?string $icon = 'heroicon-o-user-group';
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('phone'),
                TextInput::make('name'),
                TextInput::make('confirmation_code'),
                Toggle::make('cofirm')
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')->label('Фио'),
                TextColumn::make('phone')->label('Телефон'),
                TextColumn::make('confirmation_code')->label('Код подтверждения'),
                ToggleColumn::make('cofirm')->label('Подтверждён'),
                
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
