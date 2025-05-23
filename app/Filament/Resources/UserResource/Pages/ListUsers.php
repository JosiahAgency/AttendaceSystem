<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Filament\Resources\UserResource\Widgets\UserOverview;
use App\Filament\Widgets\UsersStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Widgets\Widget;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            UsersStats::make(),
        ];
    }
}
