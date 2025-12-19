<?php

namespace App\Filament\Resources\Donations\Schemas;

use App\Models\District;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DonationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('நன்கொடையாளர் விவரங்கள்')
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

                                TextInput::make('phone')
                                    ->label('தொலைபேசி')
                                    ->tel()
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                TextInput::make('member_id')
                                    ->label('உறுப்பினர் எண்')
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                Select::make('district_id')
                                    ->label('மாவட்டம்')
                                    ->options(District::pluck('name_ta', 'id'))
                                    ->searchable()
                                    ->preload()
                                    ->columnSpan(6),

                                Textarea::make('address')
                                    ->label('முகவரி')
                                    ->rows(3)
                                    ->columnSpan(12),

                                TextInput::make('city')
                                    ->label('நகரம்')
                                    ->maxLength(255)
                                    ->columnSpan(4),

                                TextInput::make('state')
                                    ->label('மாநிலம்')
                                    ->maxLength(255)
                                    ->columnSpan(4),

                                TextInput::make('pincode')
                                    ->label('அஞ்சல் குறியீடு')
                                    ->maxLength(10)
                                    ->columnSpan(4),

                                TextInput::make('pan_number')
                                    ->label('PAN எண்')
                                    ->maxLength(10)
                                    ->columnSpan(6),
                            ]),
                    ]),

                Section::make('நன்கொடை விவரங்கள்')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                TextInput::make('amount')
                                    ->label('தொகை')
                                    ->required()
                                    ->numeric()
                                    ->prefix('₹')
                                    ->columnSpan(6),

                                Select::make('payment_status')
                                    ->label('கொடுப்பனவு நிலை')
                                    ->options([
                                        'pending' => 'நிலுவையில்',
                                        'completed' => 'முடிந்தது',
                                        'failed' => 'தோல்வி',
                                    ])
                                    ->default('pending')
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('razorpay_order_id')
                                    ->label('Razorpay Order ID')
                                    ->maxLength(255)
                                    ->columnSpan(4),

                                TextInput::make('razorpay_payment_id')
                                    ->label('Razorpay Payment ID')
                                    ->maxLength(255)
                                    ->columnSpan(4),

                                TextInput::make('razorpay_signature')
                                    ->label('Razorpay Signature')
                                    ->maxLength(255)
                                    ->columnSpan(4),

                                Textarea::make('notes')
                                    ->label('குறிப்புகள்')
                                    ->rows(3)
                                    ->columnSpan(12),
                            ]),
                    ]),
            ]);
    }
}
