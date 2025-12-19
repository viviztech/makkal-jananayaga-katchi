<?php

namespace App\Filament\Resources\Subbodies;

use App\Filament\Resources\Subbodies\Pages\CreateSubbody;
use App\Filament\Resources\Subbodies\Pages\EditSubbody;
use App\Filament\Resources\Subbodies\Pages\ListSubbodies;
use App\Filament\Resources\Subbodies\Schemas\SubbodyForm;
use App\Filament\Resources\Subbodies\Tables\SubbodiesTable;
use App\Models\Subbody;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SubbodyResource extends Resource
{
    protected static ?string $model = Subbody::class;

    protected static string | UnitEnum | null $navigationGroup = 'Post Settings';

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-squares-plus';

    protected static ?string $navigationLabel = 'துணை நிலை அமைப்புகள்';

    protected static ?string $pluralModelLabel = 'துணை நிலை அமைப்புகள்';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return SubbodyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SubbodiesTable::configure($table);
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
            'index' => ListSubbodies::route('/'),
            'create' => CreateSubbody::route('/create'),
            'edit' => EditSubbody::route('/{record}/edit'),
        ];
    }
    
}
