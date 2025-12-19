<?php

namespace App\Filament\Resources\Subbodies\Pages;

use App\Filament\Resources\Subbodies\SubbodyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSubbody extends EditRecord
{
    protected static string $resource = SubbodyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
