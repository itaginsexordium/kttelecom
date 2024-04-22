<?php

namespace App\Filament\Resources\ReservationResource\Pages;

use App\Filament\Resources\ReservationResource;
use App\Filament\Resources\TestResource\Widgets\BlogPostsChart;
use Filament\Actions;
use Filament\Infolists\Components\Fieldset;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\IconPosition;

class ViewReservations extends ViewRecord
{
    protected static string $resource = ReservationResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([

            Fieldset::make('Описание')->schema(
                [
                    TextEntry::make('name')->label('название')->columnSpan(3)->badge()->color('warning'),
                    TextEntry::make('progress')->label('мест')->columnSpan(3)->badge()->color('primary'),
                    TextEntry::make('premises.name')->label('помещение'),
                    TextEntry::make('visitor.name')->label('клиент'),
                    TextEntry::make('from')->dateTime('H:i d.m-y')->label('начало'),
                    TextEntry::make('time_duration')->icon('heroicon-s-clock')->iconColor('primary')->iconPosition(IconPosition::Before)->label('продолжительность'),
                    TextEntry::make('status')->badge(
                    )->color(fn (string $state): string => match ($state) {
                        'ожидается' => 'primary',
                        'в процессе' => 'warning',
                        'завершено' => 'success',
                    })->icon(fn (string $state): string => match ($state) {
                        'ожидается' => 'heroicon-s-calendar',
                        'в процессе' => 'heroicon-s-arrow-path',
                        'завершено' => 'heroicon-o-check-circle',
                    })->label('статус')->columnSpan(2)
                ]
            )->columns(6),


            SpatieMediaLibraryImageEntry::make('Premises.avatar')->collection('avatars')->columnSpanFull()->label('медиа помещения'), 
            // SpatieMediaLibraryImageEntry::make('avatar')->collection('avatars')->columnSpanFull()->label('медиа'), 
        ]);
    }

    protected function getHeaderWidgets(): array
    { 
        return [
        ];
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
