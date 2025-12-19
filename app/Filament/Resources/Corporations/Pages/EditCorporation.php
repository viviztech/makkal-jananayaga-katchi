<?php

namespace App\Filament\Resources\Corporations\Pages;

use App\Filament\Resources\Corporations\CorporationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCorporation extends EditRecord
{
    protected static string $resource = CorporationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
