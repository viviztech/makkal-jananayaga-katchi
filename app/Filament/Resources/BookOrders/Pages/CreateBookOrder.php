<?php

namespace App\Filament\Resources\BookOrders\Pages;

use App\Filament\Resources\BookOrders\BookOrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBookOrder extends CreateRecord
{
    protected static string $resource = BookOrderResource::class;
}
