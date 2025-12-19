<?php

namespace App\Filament\Resources\Paguthis;

use App\Filament\Resources\Paguthis\Pages\CreatePaguthi;
use App\Filament\Resources\Paguthis\Pages\EditPaguthi;
use App\Filament\Resources\Paguthis\Pages\ListPaguthis;
use App\Filament\Resources\Paguthis\Schemas\PaguthiForm;
use App\Filament\Resources\Paguthis\Tables\PaguthisTable;
use App\Models\Paguthi;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PaguthiResource extends Resource
{
    protected static ?string $model = Paguthi::class;

    protected static string | UnitEnum | null $navigationGroup = 'Settings';

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-table-cells';

    protected static ?string $navigationLabel = 'பகுதிகள்';

    protected static ?string $pluralModelLabel = 'பகுதிகள்';

    protected static ?int $navigationSort = 8;

    public static function form(Schema $schema): Schema
    {
        return PaguthiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PaguthisTable::configure($table);
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
            'index' => ListPaguthis::route('/'),
            'create' => CreatePaguthi::route('/create'),
            'edit' => EditPaguthi::route('/{record}/edit'),
        ];
    }
}
