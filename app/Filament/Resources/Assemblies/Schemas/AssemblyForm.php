<?php

namespace App\Filament\Resources\Assemblies\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

class AssemblyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Assembly Information')
                    ->description('Enter the details of the Assembly')
                    ->schema([
                        Grid::make(12)->schema([
                            Select::make('district_id')
                                ->relationship('district', 'name_en')
                                ->required()
                                ->searchable()
                                ->preload()
                                ->label('மாவட்டத்தின் பெயர்')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('name_ta')
                                ->required()
                                ->maxLength(255)
                                ->label('சட்ட மன்ற தொகுதி')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('name_en')
                                ->required()
                                ->maxLength(255)
                                ->label('Assembly Name (English)')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                        ]),
                ])->columnSpan('full'),
            ]);
    }
}
