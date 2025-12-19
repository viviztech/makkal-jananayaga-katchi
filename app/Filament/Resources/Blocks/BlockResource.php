<?php

namespace App\Filament\Resources\Blocks;

use App\Filament\Resources\Blocks\Pages\CreateBlock;
use App\Filament\Resources\Blocks\Pages\EditBlock;
use App\Filament\Resources\Blocks\Pages\ListBlocks;
use App\Filament\Resources\Blocks\Schemas\BlockForm;
use App\Filament\Resources\Blocks\Tables\BlocksTable;
use App\Models\Block;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BlockResource extends Resource
{
    protected static ?string $model = Block::class;

    protected static string | UnitEnum | null $navigationGroup = 'Settings';

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-globe-americas';

    protected static ?string $navigationLabel = 'ஊராட்சி ஒன்றியம்';

    protected static ?string $pluralModelLabel = 'ஊராட்சி ஒன்றியங்கள்';

    protected static ?int $navigationSort = 4;
    
    public static function form(Schema $schema): Schema
    {
        return BlockForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BlocksTable::configure($table);
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
            'index' => ListBlocks::route('/'),
            'create' => CreateBlock::route('/create'),
            'edit' => EditBlock::route('/{record}/edit'),
        ];
    }
}
