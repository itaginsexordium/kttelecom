<?php

namespace App\Filament\Resources\CompanyResource\Pages;

use App\Filament\Resources\CompanyResource;
use App\Filament\Resources\Traits\HasTags;
use Filament\Actions\Action;
use Infolists\Components\Actions;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
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
                TextEntry::make('name')->label('название'),
                TextEntry::make('model')->label('тип'),
                Infolists\Components\Actions::make([
                    Actions\Action::make("test")
                        ->url(function (Model $record, Actions\Action $action) {
                            $data = $action
                                ->getInfolistComponent()
                                ->getContainer()
                                ->getParentComponent()
                                ->getState();
                    
                            return "https://example.com/" . $data['id'];
                        })
                   ])
            ])->columns(3)->columnSpanFull()->contained(false)->label('связи'),
        ]);
    }

    protected function getHeaderWidgets(): array
    {
        return [];
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
