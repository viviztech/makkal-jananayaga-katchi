<?php

namespace App\Filament\Resources\Vattams\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

class VattamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Vattam Information')
                    ->description('Enter the details of the Vattam')
                    ->schema([
                        Grid::make(12)->schema([
                            Select::make('district_id')
                                ->relationship('district', 'name_en')
                                ->required()
                                ->searchable()
                                ->preload()
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('name_en')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('name_ta')
                                ->required()
                                ->maxLength(50)
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                    ]),
                ])->columnSpan('full'),
            ]);
    }
}
