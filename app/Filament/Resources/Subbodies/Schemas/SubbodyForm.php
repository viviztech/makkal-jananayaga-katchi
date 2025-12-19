<?php

namespace App\Filament\Resources\Subbodies\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

class SubbodyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('State Information')
                    ->description('Enter the details of the state')
                    ->schema([
                        Grid::make(12)->schema([
                            Select::make('postingstage_id')
                                ->relationship('postingStage', 'name_en')
                                ->required()
                                ->searchable()
                                ->preload()
                                ->default('துணைநிலை அமைப்பு')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('name_ta')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('name_en')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                        ]),
                    ])->columnSpan('full'),
            ]);
    }
}
