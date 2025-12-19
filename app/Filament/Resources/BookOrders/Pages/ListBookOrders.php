<?php

namespace App\Filament\Resources\BookOrders\Pages;

use App\Filament\Resources\BookOrders\BookOrderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBookOrders extends ListRecords
{
    protected static string $resource = BookOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
