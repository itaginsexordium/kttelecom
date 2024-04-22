<?php

namespace App\Filament\Resources\VisitorsResource\Pages;

use App\Filament\Resources\TestResource\Widgets\BlogPostsChart;
use App\Filament\Resources\VisitorsResource;
use Filament\Actions;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\TextEntry;

class ViewVisitors extends ViewRecord
{
    protected static string $resource = VisitorsResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([

        
            Fieldset::make('Основные')->schema(
                [
            //         TextEntry::make('first_name')->translateLabel(),
            //         TextEntry::make('last_name')->translateLabel(),
            //         TextEntry::make('tarif.title')->badge()->color('warning'),
            //         TextEntry::make('address'),
            //         TextEntry::make('apartments'),
            //         KeyValueEntry::make('pass_data')->columnSpanFull(),
                ])
            // )->columns(3),
            // Fieldset::make('контактные данные')->schema(
            //     [
            //         TextEntry::make('phone')->columnSpan(2),
            //         TextEntry::make('email')->columnSpan(2),
            //     ]
            // ),
            // SpatieMediaLibraryImageEntry::make('avatar')->collection('avatars')->columnSpanFull(),
               
        ]);
    }

    protected function getHeaderWidgets(): array
    { 
        return [
            // BlogPostsChart::class
        ];
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
