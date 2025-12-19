<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Media Category Information')
                    ->description('Enter the details of the Media Category Information')
                    ->schema([
                        Grid::make(12)->schema([
                            TextInput::make('name_ta')
                                ->required()
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('name_en')
                                ->required()
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                        ]),
                ])->columnSpan('full'),
            ]);
    }
}