<?php

namespace App\Filament\Resources\Bearers\Pages;

use App\Filament\Resources\Bearers\BearerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBearer extends EditRecord
{
    protected static string $resource = BearerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
