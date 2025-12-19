<?php

namespace App\Filament\Resources\Perurs\Pages;

use App\Filament\Resources\Perurs\PerurResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPerurs extends ListRecords
{
    protected static string $resource = PerurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
