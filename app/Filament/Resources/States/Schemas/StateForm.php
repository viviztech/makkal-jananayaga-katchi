<?php

namespace App\Filament\Resources\States\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

class StateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('State Information')
                    ->description('Enter the details of the state')
                    ->schema([
                        Grid::make(12)->schema([
                        TextInput::make('name_ta')
                            ->required()
                            ->maxLength(255)
                            ->label('மாநிலத்தின் பெயர்')
                            ->columnSpan(['sm' => 12, 'md' => 12, 'lg' => 12]),
                        TextInput::make('name_en')
                            ->required()
                            ->maxLength(255)
                            ->label('State Name')
                            ->columnSpan(['sm' => 12, 'md' => 12, 'lg' => 12]),
                        TextInput::make('code')
                            ->nullable()
                            ->maxLength(10)
                            ->label('Code')
                            ->helperText('Short state code used as membership prefix, e.g. TN')
                            ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                        ]),
                    ])->columnSpan('full'),
                ]);
    }
}
