<?php

namespace App\Filament\Resources\Vattams;

use App\Filament\Resources\Vattams\Pages\CreateVattam;
use App\Filament\Resources\Vattams\Pages\EditVattam;
use App\Filament\Resources\Vattams\Pages\ListVattams;
use App\Filament\Resources\Vattams\Schemas\VattamForm;
use App\Filament\Resources\Vattams\Tables\VattamsTable;
use App\Models\Vattam;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VattamResource extends Resource
{
    protected static ?string $model = Vattam::class;

    protected static string | UnitEnum | null $navigationGroup = 'Settings';

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-swatch';

    protected static ?string $navigationLabel = 'வட்டங்கள்';

    protected static ?string $pluralModelLabel = 'வட்டங்கள்';

    protected static ?int $navigationSort = 9;

    public static function form(Schema $schema): Schema
    {
        return VattamForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VattamsTable::configure($table);
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
            'index' => ListVattams::route('/'),
            'create' => CreateVattam::route('/create'),
            'edit' => EditVattam::route('/{record}/edit'),
        ];
    }

}
