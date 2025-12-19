<?php

namespace App\Filament\Resources\BookOrders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;

class BookOrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order_number')
                    ->label('ஆர்டர் எண்')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('book.title')
                    ->label('புத்தகம்')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('customer_name')
                    ->label('வாடிக்கையாளர் பெயர்')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('customer_email')
                    ->label('மின்னஞ்சல்')
                    ->searchable(),

                TextColumn::make('customer_phone')
                    ->label('தொலைபேசி')
                    ->searchable(),

                TextColumn::make('quantity')
                    ->label('அளவு')
                    ->sortable(),

                TextColumn::make('total_amount')
                    ->label('மொத்த தொகை')
                    ->money('INR')
                    ->sortable(),

                BadgeColumn::make('payment_status')
                    ->label('கட்டண நிலை')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'success',
                        'danger' => 'failed',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'நிலுவையில்',
                        'success' => 'வெற்றி',
                        'failed' => 'தோல்வி',
                        default => $state,
                    }),

                BadgeColumn::make('order_status')
                    ->label('ஆர்டர் நிலை')
                    ->colors([
                        'warning' => 'pending',
                        'primary' => 'processing',
                        'info' => 'shipped',
                        'success' => 'delivered',
                        'danger' => 'cancelled',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'நிலுவையில்',
                        'processing' => 'செயலாக்கப்படுகிறது',
                        'shipped' => 'அனுப்பப்பட்டது',
                        'delivered' => 'வழங்கப்பட்டது',
                        'cancelled' => 'ரத்து செய்யப்பட்டது',
                        default => $state,
                    }),

                TextColumn::make('created_at')
                    ->label('தேதி')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('payment_status')
                    ->label('கட்டண நிலை')
                    ->options([
                        'pending' => 'நிலுவையில்',
                        'success' => 'வெற்றி',
                        'failed' => 'தோல்வி',
                    ]),

                SelectFilter::make('order_status')
                    ->label('ஆர்டர் நிலை')
                    ->options([
                        'pending' => 'நிலுவையில்',
                        'processing' => 'செயலாக்கப்படுகிறது',
                        'shipped' => 'அனுப்பப்பட்டது',
                        'delivered' => 'வழங்கப்பட்டது',
                        'cancelled' => 'ரத்து செய்யப்பட்டது',
                    ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
