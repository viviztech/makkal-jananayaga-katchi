<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('தொடர்பு விவரங்கள்')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                TextInput::make('name')
                                    ->label('பெயர்')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                TextInput::make('email')
                                    ->label('மின்னஞ்சல்')
                                    ->email()
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                TextInput::make('subject')
                                    ->label('தலைப்பு')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(12),

                                Textarea::make('message')
                                    ->label('செய்தி')
                                    ->required()
                                    ->rows(5)
                                    ->columnSpan(12),

                                Toggle::make('is_read')
                                    ->label('படிக்கப்பட்டது')
                                    ->default(false)
                                    ->columnSpan(6),

                                DateTimePicker::make('read_at')
                                    ->label('படித்த நேரம்')
                                    ->displayFormat('d/m/Y H:i')
                                    ->columnSpan(6),
                            ]),
                    ]),
            ]);
    }
}
