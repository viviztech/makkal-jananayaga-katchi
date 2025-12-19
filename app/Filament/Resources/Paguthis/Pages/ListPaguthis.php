<?php

namespace App\Filament\Resources\Paguthis\Pages;

use App\Filament\Resources\Paguthis\PaguthiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPaguthis extends ListRecords
{
    protected static string $resource = PaguthiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
