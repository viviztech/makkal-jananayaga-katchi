<?php

namespace App\Filament\Resources\Perurs\Pages;

use App\Filament\Resources\Perurs\PerurResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPerur extends EditRecord
{
    protected static string $resource = PerurResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
