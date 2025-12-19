<?php

namespace App\Filament\Resources\Districts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

class DistrictForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('District Information')
                    ->description('Enter the details of the District')
                    ->schema([
                        Grid::make(12)->schema([
                            Select::make('state_id')
                                ->relationship('state', 'name_en')
                                ->required()
                                ->searchable()
                                ->preload()
                                ->label('மாநிலத்தின் பெயர்')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('name_ta')
                                ->required()
                                ->maxLength(255)
                                ->label('மாவட்டத்தின் பெயர்')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('name_en')
                                ->required()
                                ->maxLength(255)
                                ->label('District Name')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                    ]),
                ])->columnSpan('full'),
            ]);
    }
}
