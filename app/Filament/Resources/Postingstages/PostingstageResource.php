<?php

namespace App\Filament\Resources\Postingstages;

use App\Filament\Resources\Postingstages\Pages\CreatePostingstage;
use App\Filament\Resources\Postingstages\Pages\EditPostingstage;
use App\Filament\Resources\Postingstages\Pages\ListPostingstages;
use App\Filament\Resources\Postingstages\Schemas\PostingstageForm;
use App\Filament\Resources\Postingstages\Tables\PostingstagesTable;
use App\Models\Postingstage;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PostingstageResource extends Resource
{
    protected static ?string $model = Postingstage::class;

    protected static string | UnitEnum | null $navigationGroup = 'Post Settings';

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationLabel = 'பொறுப்பு நிலைகள்';

    protected static ?string $pluralModelLabel = 'பொறுப்பு நிலைகள்';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return PostingstageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostingstagesTable::configure($table);
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
            'index' => ListPostingstages::route('/'),
            'create' => CreatePostingstage::route('/create'),
            'edit' => EditPostingstage::route('/{record}/edit'),
        ];
    }
}
