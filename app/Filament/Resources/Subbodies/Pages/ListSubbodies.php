<?php

namespace App\Filament\Resources\Subbodies\Pages;

use App\Filament\Resources\Subbodies\SubbodyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSubbodies extends ListRecords
{
    protected static string $resource = SubbodyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
