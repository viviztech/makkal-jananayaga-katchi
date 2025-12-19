<?php

namespace App\Filament\Resources\Paguthis\Pages;

use App\Filament\Resources\Paguthis\PaguthiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPaguthi extends EditRecord
{
    protected static string $resource = PaguthiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
