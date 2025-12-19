<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Posting Information')
                    ->description('Enter the details of the Posting')
                    ->schema([
                        Grid::make(12)->schema([
                            Select::make('postingstage_id')
                                ->relationship('postingStage', 'name_ta')
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
                                ->maxLength(255)
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                    ]),
                ])->columnSpan('full'),
            ]);
    }
}
