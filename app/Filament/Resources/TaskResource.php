<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\Pages\ViewTask;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use App\Models\TaskList;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Traits\HasTags;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class TaskResource extends Resource
{
    use HasTags;

    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static ?string $label = 'Задача';
    protected static ?string $pluralModelLabel = 'Задачи';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('основное')->schema([
                    TextInput::make('name')->label('название')->columnSpanFull(),
                    RichEditor::make('description')->label('описание')->columnSpanFull(),
                    DateTimePicker::make('from')->label('начать'),
                    DateTimePicker::make('to')->label('завершить'),
                ])->columnSpan(2),
                Fieldset::make('связи')->schema([
                    Select::make('task_list_id')
                        ->options(TaskList::all()->pluck('name', 'id'))
                        ->searchable()->columnSpanFull()->label('задачник'),
                    Select::make('parent_id')
                        ->options(Task::all()->pluck('name', 'id'))
                        ->searchable()->columnSpanFull()->label('родительская задача'),
                    self::formTagsField()->columnSpanFull()->label('связи'),
                ])->columnSpan(1),
                SpatieMediaLibraryFileUpload::make('avatar')->multiple()->collection('avatars')->columnSpanFull()->label('медиа')
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name'),
                TextColumn::make('from')->dateTime('H:i d.m-y'),
                TextColumn::make('to')->dateTime('H:i d.m-y'),
                TextColumn::make('parent.name')->badge()->color('primary'),
                TextColumn::make('list.name')->badge()->color('primary'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListTasks::route('/'),
            // 'create' => Pages\CreateTask::route('/create'),
            // 'edit' => Pages\EditTask::route('/{record}/edit'),
            'view'   => ViewTask::route('/{record}'),
        ];
    }
}
