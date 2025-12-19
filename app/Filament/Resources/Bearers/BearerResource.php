<?php

namespace App\Filament\Resources\Bearers;

use App\Filament\Resources\Bearers\Pages\CreateBearer;
use App\Filament\Resources\Bearers\Pages\EditBearer;
use App\Filament\Resources\Bearers\Pages\ListBearers;
use App\Filament\Resources\Bearers\Schemas\BearerForm;
use App\Filament\Resources\Bearers\Tables\BearersTable;
use App\Models\Bearer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BearerResource extends Resource
{
    protected static ?string $model = Bearer::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-cog';

    protected static ?string $navigationLabel = 'பொறுப்பாளர்கள்';

    protected static ?string $pluralModelLabel = 'பொறுப்பாளர்கள்';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return BearerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BearersTable::configure($table);
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
            'index' => ListBearers::route('/'),
            'create' => CreateBearer::route('/create'),
            'edit' => EditBearer::route('/{record}/edit'),
        ];
    }
}
