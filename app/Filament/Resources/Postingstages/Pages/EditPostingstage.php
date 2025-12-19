<?php

namespace App\Filament\Resources\Postingstages\Pages;

use App\Filament\Resources\Postingstages\PostingstageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPostingstage extends EditRecord
{
    protected static string $resource = PostingstageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
