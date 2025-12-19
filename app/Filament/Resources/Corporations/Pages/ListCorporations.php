<?php

namespace App\Filament\Resources\Corporations\Pages;

use App\Filament\Resources\Corporations\CorporationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCorporations extends ListRecords
{
    protected static string $resource = CorporationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
