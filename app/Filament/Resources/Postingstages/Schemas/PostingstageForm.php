<?php

namespace App\Filament\Resources\Postingstages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

class PostingstageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Posting Stage Information')
                    ->description('Enter the details of the Posting Stage')
                    ->schema([
                        Grid::make(12)->schema([
                            TextInput::make('name_en')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(['sm' => 12, 'md' => 12, 'lg' => 12]),
                            TextInput::make('name_ta')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(['sm' => 12, 'md' => 12, 'lg' => 12]),
                        ]),
                ])->columnSpan('full'),
            ]);
    }
}
