<?php

namespace App\Filament\Resources\Vattams\Pages;

use App\Filament\Resources\Vattams\VattamResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVattams extends ListRecords
{
    protected static string $resource = VattamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
