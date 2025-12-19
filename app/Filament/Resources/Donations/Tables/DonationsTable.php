<?php

namespace App\Filament\Resources\Donations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DonationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('பெயர்')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('மின்னஞ்சல்')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('phone')
                    ->label('தொலைபேசி')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('member_id')
                    ->label('உறுப்பினர் எண்')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('district.name_ta')
                    ->label('மாவட்டம்')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),

                TextColumn::make('amount')
                    ->label('தொகை')
                    ->money('INR')
                    ->sortable(),

                TextColumn::make('payment_status')
                    ->label('நிலை')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'pending' => 'warning',
                        'failed' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'completed' => 'முடிந்தது',
                        'pending' => 'நிலுவையில்',
                        'failed' => 'தோல்வி',
                        default => $state,
                    })
                    ->sortable(),

                TextColumn::make('razorpay_payment_id')
                    ->label('Payment ID')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('பெறப்பட்டது')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
