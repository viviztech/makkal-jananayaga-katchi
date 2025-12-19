<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('State Information')
                    ->description('Enter the details of the state')
                    ->schema([
                        Grid::make(12)->schema([
                                TextInput::make('name')
                                    ->label('பெயர்')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                TextInput::make('email')
                                    ->label('மின்னஞ்சல்')
                                    ->email()
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                TextInput::make('password')
                                    ->label('கடவுச்சொல்')
                                    ->password()
                                    ->required(fn (string $context): bool => $context === 'create')
                                    ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                                    ->dehydrated(fn ($state) => filled($state))
                                    ->maxLength(255)
                                    ->helperText('Leave empty to keep current password when editing')
                                    ->columnSpan(6),

                                DateTimePicker::make('email_verified_at')
                                    ->label('மின்னஞ்சல் சரிபார்க்கப்பட்டது')
                                    ->displayFormat('d/m/Y H:i')
                                    ->columnSpan(6),
                            ]),
                    ])->columnSpan('full'),
            ]);
    }
}
