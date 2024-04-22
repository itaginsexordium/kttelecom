<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;;
use Closure;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\HtmlString;
use Illuminate\Validation\Rules\Password;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static bool | Closure $enablePasswordUpdates = false;

    protected static Closure | null $extendFormCallback = null;

    public static function extendForm(Closure $callback): void
    {
        static::$extendFormCallback = $callback;
    }


    public static function form(Form $form): Form
    {
        return $form
        ->schema(function () {
            $schema = [
                'left' => Card::make([
                    'name' => TextInput::make('name')
                        ->required(),
                    'email' => TextInput::make('email')
                        ->required()
                        ->unique(ignoreRecord: true),
                    'password' => TextInput::make('password')
                        ->required()
                        ->password()
                        ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                        ->visible(fn ($livewire) => $livewire instanceof CreateUser)
                        ->rule(Password::default()),
                    'new_password_group' => Group::make([
                        'new_password' => TextInput::make('new_password')
                            ->password()
                            ->label('New Password')
                            ->nullable()
                            ->rule(Password::default())
                            ->dehydrated(false),
                        'new_password_confirmation' => TextInput::make('new_password_confirmation')
                            ->password()
                            ->label('Confirm New Password')
                            ->rule('required', fn ($get) => !! $get('new_password'))
                            ->same('new_password')
                            ->dehydrated(false),
                    ])->visible(static::$enablePasswordUpdates)
                ])->columnSpan(8),
                'right' => Card::make([

                Select::make('roles')->multiple()->relationship('roles', 'name')->searchable()->preload()->columnSpanFull()->label('роли'),
                    'created_at' => Placeholder::make('created_at')
                        ->content(fn ($record) => $record?->created_at?->diffForHumans() ?? new HtmlString('&mdash;'))
                ])->columnSpan(4),
            ];

            if (static::$extendFormCallback !== null) {
                $schema = value(static::$extendFormCallback, $schema);
            }

            return $schema;
        })
        ->columns(12);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('name')
                ->searchable(),
            TextColumn::make('email')
                ->searchable(),
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
        ])
        ->defaultSort('created_at', 'desc');
            // ->columns([
            //     //
            // ])
            // ->filters([
            //     //
            // ])
            // ->actions([
            //     Tables\Actions\EditAction::make(),
            // ])
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            // ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }


    public static function enablePasswordUpdates(bool | Closure $condition = true): void
    {
        static::$enablePasswordUpdates = $condition;
    }

    // public static function getModel(): string
    // {
    //     return config('filament-user-resource.model');
    // }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
