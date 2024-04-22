<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\Pages\ViewCompany;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Filament\Resources\Traits\HasTags;
use App\Models\Company;
use App\Models\CompanyList;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class CompanyResource extends Resource
{

    use HasTags;

    protected static ?string $model = Company::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';


    public static ?string $label = 'Клиент';
    protected static ?string $pluralModelLabel = 'Клиенты';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Fieldset::make('Основные')->schema(
                    [
                        TextInput::make('first_name')->columnSpan(2),
                        TextInput::make('last_name')->columnSpan(2),
                        TextInput::make('address'),
                        TextInput::make('apartments'),
                        KeyValue::make('pass_data')->columnSpan(2),
                    ]
                ),

                Fieldset::make('контактные данные')->schema(
                    [
                        TextInput::make('phone')->columnSpan(2),
                        TextInput::make('email')->columnSpan(2),
                    ]
                ),
                Fieldset::make('Рабочие процессы')->schema(
                    [
                        Select::make('company_lists_id')
                            ->label('Клиентская книга')
                            ->options(CompanyList::all()->pluck('name', 'id'))
                            ->searchable()->preload()->columnSpan(2),
                        // TextInput::make('default_log')->columnSpanFull()->numeric()
                    ]
                ),
                self::formTagsField()
                ->columnSpan(['md' => 2, 'lg' => 3]), 
                SpatieMediaLibraryFileUpload::make('avatar')->multiple()->collection('avatars')->columnSpanFull()->label('медиа')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name'),
                TextColumn::make('full_adress'),
                TextColumn::make('phone'),
                self::tagsColumn(),

            ])
            ->filters([

                Filter::make('created_at')
                    ->form([
                        Select::make('company_list')->label('книга')
                            ->options(CompanyList::all()->pluck('name', 'id'))
                            ->searchable()
                            ->preload(),
                        DatePicker::make('created_from')->label('создано с'),
                        DatePicker::make('created_until')->label('создано по'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['company_list'],
                                fn (Builder $query, $date): Builder => $query->where('company_lists_id', $date),
                            )
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
            'index' => Pages\ListCompanies::route('/'),
            // 'create' => Pages\CreateCompany::route('/create'),
            // 'edit' => Pages\EditCompany::route('/{record}/edit'),
            'view'   => ViewCompany::route('/{record}'),
        ];
    }
}
