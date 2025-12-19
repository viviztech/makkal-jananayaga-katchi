<?php

namespace App\Filament\Resources\BookOrders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BookOrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('ஆர்டர் விவரங்கள்')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                TextInput::make('order_number')
                                    ->label('ஆர்டர் எண்')
                                    ->disabled()
                                    ->columnSpan(6),

                                Select::make('book_id')
                                    ->label('புத்தகம்')
                                    ->relationship('book', 'title')
                                    ->required()
                                    ->disabled()
                                    ->columnSpan(6),

                                TextInput::make('quantity')
                                    ->label('அளவு')
                                    ->numeric()
                                    ->required()
                                    ->disabled()
                                    ->columnSpan(4),

                                TextInput::make('unit_price')
                                    ->label('அலகு விலை')
                                    ->numeric()
                                    ->disabled()
                                    ->columnSpan(4),

                                TextInput::make('total_amount')
                                    ->label('மொத்த தொகை')
                                    ->numeric()
                                    ->disabled()
                                    ->columnSpan(4),
                            ]),
                    ]),

                Section::make('வாடிக்கையாளர் தகவல்')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                TextInput::make('customer_name')
                                    ->label('பெயர்')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                TextInput::make('customer_email')
                                    ->label('மின்னஞ்சல்')
                                    ->email()
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                TextInput::make('customer_phone')
                                    ->label('தொலைபேசி')
                                    ->required()
                                    ->maxLength(20)
                                    ->columnSpan(6),

                                Textarea::make('shipping_address')
                                    ->label('விலக்கு முகவரி')
                                    ->required()
                                    ->rows(3)
                                    ->columnSpan(12),

                                TextInput::make('city')
                                    ->label('நகரம்')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(4),

                                TextInput::make('state')
                                    ->label('மாநிலம்')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(4),

                                TextInput::make('pincode')
                                    ->label('பின்கோட்')
                                    ->required()
                                    ->maxLength(10)
                                    ->columnSpan(4),
                            ]),
                    ]),

                Section::make('கட்டணம் மற்றும் ஆர்டர் நிலை')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                Select::make('payment_status')
                                    ->label('கட்டண நிலை')
                                    ->options([
                                        'pending' => 'நிலுவையில்',
                                        'success' => 'வெற்றி',
                                        'failed' => 'தோல்வி',
                                    ])
                                    ->required()
                                    ->columnSpan(6),

                                Select::make('order_status')
                                    ->label('ஆர்டர் நிலை')
                                    ->options([
                                        'pending' => 'நிலுவையில்',
                                        'processing' => 'செயலாக்கப்படுகிறது',
                                        'shipped' => 'அனுப்பப்பட்டது',
                                        'delivered' => 'வழங்கப்பட்டது',
                                        'cancelled' => 'ரத்து செய்யப்பட்டது',
                                    ])
                                    ->required()
                                    ->columnSpan(6),

                                TextInput::make('razorpay_order_id')
                                    ->label('Razorpay ஆர்டர் ID')
                                    ->disabled()
                                    ->columnSpan(6),

                                TextInput::make('razorpay_payment_id')
                                    ->label('Razorpay கட்டண ID')
                                    ->disabled()
                                    ->columnSpan(6),

                                Textarea::make('notes')
                                    ->label('குறிப்புகள்')
                                    ->rows(3)
                                    ->columnSpan(12),
                            ]),
                    ]),
            ]);
    }
}
