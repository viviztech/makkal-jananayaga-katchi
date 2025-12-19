<?php

namespace App\Filament\Resources\BookOrders\Pages;

use App\Filament\Resources\BookOrders\BookOrderResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBookOrder extends EditRecord
{
    protected static string $resource = BookOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
