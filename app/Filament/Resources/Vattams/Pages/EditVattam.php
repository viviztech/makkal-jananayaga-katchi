<?php

namespace App\Filament\Resources\Vattams\Pages;

use App\Filament\Resources\Vattams\VattamResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVattam extends EditRecord
{
    protected static string $resource = VattamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
