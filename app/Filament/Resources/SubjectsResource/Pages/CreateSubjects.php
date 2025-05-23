<?php

namespace App\Filament\Resources\SubjectsResource\Pages;

use App\Filament\Resources\SubjectsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSubjects extends CreateRecord
{
    protected static string $resource = SubjectsResource::class;

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
