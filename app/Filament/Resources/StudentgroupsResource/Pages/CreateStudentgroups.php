<?php

namespace App\Filament\Resources\StudentgroupsResource\Pages;

use App\Filament\Resources\StudentgroupsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateStudentgroups extends CreateRecord
{
    protected static string $resource = StudentgroupsResource::class;

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
