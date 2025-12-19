<?php

namespace App\Filament\Resources\Corporations;

use App\Filament\Resources\Corporations\Pages\CreateCorporation;
use App\Filament\Resources\Corporations\Pages\EditCorporation;
use App\Filament\Resources\Corporations\Pages\ListCorporations;
use App\Filament\Resources\Corporations\Schemas\CorporationForm;
use App\Filament\Resources\Corporations\Tables\CorporationsTable;
use App\Models\Corporation;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CorporationResource extends Resource
{
    protected static ?string $model = Corporation::class;

    protected static string | UnitEnum | null $navigationGroup = 'Settings';

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-x-circle';

    protected static ?string $navigationLabel = 'மாநகராட்சிகள்';

    protected static ?string $pluralModelLabel = 'மாநகராட்சிகள்';

    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return CorporationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CorporationsTable::configure($table);
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
            'index' => ListCorporations::route('/'),
            'create' => CreateCorporation::route('/create'),
            'edit' => EditCorporation::route('/{record}/edit'),
        ];
    }
}
