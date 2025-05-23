<?php

namespace App\Filament\Resources\StudentgroupsResource\Pages;

use App\Filament\Resources\StudentgroupsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudentgroups extends ListRecords
{
    protected static string $resource = StudentgroupsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
