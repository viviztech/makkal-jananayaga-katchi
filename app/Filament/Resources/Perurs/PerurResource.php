<?php

namespace App\Filament\Resources\Perurs;

use App\Filament\Resources\Perurs\Pages\CreatePerur;
use App\Filament\Resources\Perurs\Pages\EditPerur;
use App\Filament\Resources\Perurs\Pages\ListPerurs;
use App\Filament\Resources\Perurs\Schemas\PerurForm;
use App\Filament\Resources\Perurs\Tables\PerursTable;
use App\Models\Perur;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PerurResource extends Resource
{
    protected static ?string $model = Perur::class;

    protected static string | UnitEnum | null $navigationGroup = 'Settings';

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $navigationLabel = 'பேரூராட்சிகள்';

    protected static ?string $pluralModelLabel = 'பேரூராட்சிகள்';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return PerurForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PerursTable::configure($table);
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
            'index' => ListPerurs::route('/'),
            'create' => CreatePerur::route('/create'),
            'edit' => EditPerur::route('/{record}/edit'),
        ];
    }
}
