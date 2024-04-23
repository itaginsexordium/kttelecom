<?php 

namespace App\Filament\Resources\Traits;

use App\Models\Company;
use App\Models\Links;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Support\Collection;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TagsColumn;
use Filament\Forms\Components\TextInput;
 
trait HasTags
{
    public static function formTagsField() : Select
    {
        return self::tagsField()
            ->relationship('tags', 'name');
    }
 
    public static function tagsField() : Select
    {
        return Select::make('tags')
            ->options(Tag::pluck('name', 'id'))
            ->multiple()
            ->searchable()
            ->preload();
    }
 
    public static function changeTagsAction() : BulkAction
    {
        return BulkAction::make('change_tags')
            ->action(function (Collection $records, array $data): void {
                foreach ($records as $record) {
                    $record->tags()->{$data['action']}($data['tags']);
                }
            })
            ->form([
                Grid::make()
                    ->schema([
                        Select::make('action')
                            ->label('For selected records')
                            ->options([
                                'attach' => 'add',
                                'detach' => 'remove',
                                'sync' => 'overwrite',
                            ])
                            ->default('sync')
                            ->required(),
 
                        self::tagsField(),
 
                    ])->columns(2)
            ]);
    }
 
    public static function tagsColumn() : TagsColumn
    {
        return TagsColumn::make('tags.name')
            ->limit(3);
    }
}