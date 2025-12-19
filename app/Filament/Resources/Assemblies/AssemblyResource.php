<?php

namespace App\Filament\Resources\Assemblies;

use App\Filament\Resources\Assemblies\Pages\CreateAssembly;
use App\Filament\Resources\Assemblies\Pages\EditAssembly;
use App\Filament\Resources\Assemblies\Pages\ListAssemblies;
use App\Filament\Resources\Assemblies\Schemas\AssemblyForm;
use App\Filament\Resources\Assemblies\Tables\AssembliesTable;
use App\Models\Assembly;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AssemblyResource extends Resource
{
    protected static ?string $model = Assembly::class;

    protected static string | UnitEnum | null $navigationGroup = 'Settings';

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-cube-transparent';

    protected static ?string $navigationLabel = 'சட்டமன்ற தொகுதிகள்';

    protected static ?string $pluralModelLabel = 'சட்டமன்ற தொகுதிகள்';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return AssemblyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AssembliesTable::configure($table);
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
            'index' => ListAssemblies::route('/'),
            'create' => CreateAssembly::route('/create'),
            'edit' => EditAssembly::route('/{record}/edit'),
        ];
    }
}
