<?php

namespace App\Filament\Resources\BookOrders;

use App\Filament\Resources\BookOrders\Pages\CreateBookOrder;
use App\Filament\Resources\BookOrders\Pages\EditBookOrder;
use App\Filament\Resources\BookOrders\Pages\ListBookOrders;
use App\Filament\Resources\BookOrders\Pages\ViewBookOrder;
use App\Filament\Resources\BookOrders\Schemas\BookOrderForm;
use App\Filament\Resources\BookOrders\Tables\BookOrdersTable;
use App\Models\BookOrder;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BookOrderResource extends Resource
{
    protected static ?string $model = BookOrder::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    
    protected static ?string $navigationLabel = 'புத்தக ஆர்டர்கள்';
    
    protected static ?string $pluralModelLabel = 'புத்தக ஆர்டர்கள்';
    
    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return BookOrderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BookOrdersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBookOrders::route('/'),
            'create' => CreateBookOrder::route('/create'),
            'view' => ViewBookOrder::route('/{record}'),
            'edit' => EditBookOrder::route('/{record}/edit'),
        ];
    }
}
