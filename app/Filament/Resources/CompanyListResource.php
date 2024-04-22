<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyListResource\Pages;
use App\Models\CompanyList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;


class CompanyListResource extends Resource
{
    protected static ?string $model = CompanyList::class;


    protected static ?string $navigationIcon = 'heroicon-o-book-open';


    public static ?string $label = 'Клиентская книга';
    protected static ?string $pluralModelLabel = 'Клиентские книги';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                    Fieldset::make('Основные')->schema(
                        [
                            TextInput::make('name')->columnSpan(2)->label('название'),
                        ]
                    ),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->alignCenter()->label('название'),
            ])
            ->filters([
                Filter::make('created_at')
                ->form([
                    DatePicker::make('created_from'),
                    DatePicker::make('created_until'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                        );
                })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanyLists::route('/'),
        ];
    }
}
