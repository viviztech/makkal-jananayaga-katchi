<?php

namespace App\Filament\Resources\Bearers\Pages;

use App\Filament\Resources\Bearers\BearerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBearers extends ListRecords
{
    protected static string $resource = BearerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getTableQuery()->with(['post', 'assembly']);
    }
}
