<?php

namespace App\Filament\Resources\CompanyResource\Pages;

use App\Filament\Resources\CompanyResource;
use App\Filament\Resources\Traits\HasTags;
use App\Models\Tag;
use Filament\Actions\EditAction;
use Filament\Facades\Filament;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Actions;
use Illuminate\Support\Str;
// use Filament\Actions\Action;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\IconEntry;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\VerticalAlignment;
use Illuminate\Database\Eloquent\Model;

class ViewCompany extends ViewRecord
{
    use HasTags;

    protected static string $resource = CompanyResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([

            Fieldset::make('Основные')->schema(
                [
                    TextEntry::make('last_name')->translateLabel()->label('фамилия'),
                    TextEntry::make('first_name')->translateLabel()->label('имя'),

                    TextEntry::make('address')->label('улица'),
                    TextEntry::make('apartments')->label('апартаменты'),
                    KeyValueEntry::make('pass_data')->columnSpanFull()->label('паспортные данные'),

                ]
            )->columns(2)->columnSpan(1),
            Fieldset::make('бизнесс процесс')->schema([
                TextEntry::make('list.name')
                    ->badge()
                    ->color('info')
                    ->label('Книга')
                    ->icon('heroicon-o-book-open')
                    ->columnSpanFull(),
            ])->columnSpan(1)->columns(2),
            Fieldset::make('контактные данные')->schema(
                [
                    TextEntry::make('phone')->columnSpan(2)->label('контактный телефон'),
                    TextEntry::make('email')->columnSpan(2)->label('почта'),
                ]
            )->columnSpan(1),
            SpatieMediaLibraryImageEntry::make('avatar')->collection('avatars')->label('медиа'),
            RepeatableEntry::make('tags')->schema([
                TextEntry::make('name')->hiddenLabel(true),
                IconEntry::make('model')->hiddenLabel(true)->icon(fn (string $state): string => match ($state) {
                    'App\Models\Company' => "heroicon-m-identification",
                    'App\Models\Task' => "heroicon-m-wrench"
                }),
                Actions::make([
                    Action::make("просмотр")
                        ->url(function (Tag $model, Action $action) {
                            $data =  $action->getComponent()->getRecord()->taggable;
                            $name = Str::plural(Str::snake(class_basename($data)));

                            return route("filament.admin.resources." . $name . ".view", $data);
                        })->icon('heroicon-m-eye')
                        ->badge()
                        ->labeledFrom('sm')
                        ->color('info'),
                ])->verticalAlignment(VerticalAlignment::End),
            ])->columns(3)->columnSpanFull()->contained(true)->label('связи'),
        ]);
    }

    protected function getHeaderWidgets(): array
    {
        return [];
    }
    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
