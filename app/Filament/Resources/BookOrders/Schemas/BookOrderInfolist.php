<?php

namespace App\Filament\Resources\BookOrders\Schemas;

use Filament\Infolist\Components\Section;
use Filament\Infolist\Components\TextEntry;
use Filament\Infolist\Components\Grid;
use Filament\Schemas\Schema;

class BookOrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('ஆர்டர் விவரங்கள்')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                TextEntry::make('order_number')
                                    ->label('ஆர்டர் எண்')
                                    ->columnSpan(6),

                                TextEntry::make('book.title')
                                    ->label('புத்தகம்')
                                    ->columnSpan(6),

                                TextEntry::make('quantity')
                                    ->label('அளவு')
                                    ->columnSpan(4),

                                TextEntry::make('unit_price')
                                    ->label('அலகு விலை')
                                    ->money('INR')
                                    ->columnSpan(4),

                                TextEntry::make('total_amount')
                                    ->label('மொத்த தொகை')
                                    ->money('INR')
                                    ->columnSpan(4),
                            ]),
                    ]),

                Section::make('வாடிக்கையாளர் தகவல்')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                TextEntry::make('customer_name')
                                    ->label('பெயர்')
                                    ->columnSpan(6),

                                TextEntry::make('customer_email')
                                    ->label('மின்னஞ்சல்')
                                    ->columnSpan(6),

                                TextEntry::make('customer_phone')
                                    ->label('தொலைபேசி')
                                    ->columnSpan(6),

                                TextEntry::make('shipping_address')
                                    ->label('விலக்கு முகவரி')
                                    ->columnSpan(12),

                                TextEntry::make('city')
                                    ->label('நகரம்')
                                    ->columnSpan(4),

                                TextEntry::make('state')
                                    ->label('மாநிலம்')
                                    ->columnSpan(4),

                                TextEntry::make('pincode')
                                    ->label('பின்கோட்')
                                    ->columnSpan(4),
                            ]),
                    ]),

                Section::make('கட்டணம் மற்றும் ஆர்டர் நிலை')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                TextEntry::make('payment_status')
                                    ->label('கட்டண நிலை')
                                    ->badge()
                                    ->color(fn (string $state): string => match ($state) {
                                        'pending' => 'warning',
                                        'success' => 'success',
                                        'failed' => 'danger',
                                        default => 'gray',
                                    })
                                    ->formatStateUsing(fn (string $state): string => match ($state) {
                                        'pending' => 'நிலுவையில்',
                                        'success' => 'வெற்றி',
                                        'failed' => 'தோல்வி',
                                        default => $state,
                                    })
                                    ->columnSpan(6),

                                TextEntry::make('order_status')
                                    ->label('ஆர்டர் நிலை')
                                    ->badge()
                                    ->color(fn (string $state): string => match ($state) {
                                        'pending' => 'warning',
                                        'processing' => 'primary',
                                        'shipped' => 'info',
                                        'delivered' => 'success',
                                        'cancelled' => 'danger',
                                        default => 'gray',
                                    })
                                    ->formatStateUsing(fn (string $state): string => match ($state) {
                                        'pending' => 'நிலுவையில்',
                                        'processing' => 'செயலாக்கப்படுகிறது',
                                        'shipped' => 'அனுப்பப்பட்டது',
                                        'delivered' => 'வழங்கப்பட்டது',
                                        'cancelled' => 'ரத்து செய்யப்பட்டது',
                                        default => $state,
                                    })
                                    ->columnSpan(6),

                                TextEntry::make('razorpay_order_id')
                                    ->label('Razorpay ஆர்டர் ID')
                                    ->columnSpan(6)
                                    ->placeholder('N/A'),

                                TextEntry::make('razorpay_payment_id')
                                    ->label('Razorpay கட்டண ID')
                                    ->columnSpan(6)
                                    ->placeholder('N/A'),

                                TextEntry::make('notes')
                                    ->label('குறிப்புகள்')
                                    ->columnSpan(12)
                                    ->placeholder('No notes'),

                                TextEntry::make('created_at')
                                    ->label('உருவாக்கப்பட்டது')
                                    ->dateTime('d/m/Y H:i')
                                    ->columnSpan(6),

                                TextEntry::make('updated_at')
                                    ->label('புதுப்பிக்கப்பட்டது')
                                    ->dateTime('d/m/Y H:i')
                                    ->columnSpan(6),
                            ]),
                    ]),
            ]);
    }
}
