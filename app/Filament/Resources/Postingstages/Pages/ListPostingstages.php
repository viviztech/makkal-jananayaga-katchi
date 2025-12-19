<?php

namespace App\Filament\Resources\Postingstages\Pages;

use App\Filament\Resources\Postingstages\PostingstageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPostingstages extends ListRecords
{
    protected static string $resource = PostingstageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
