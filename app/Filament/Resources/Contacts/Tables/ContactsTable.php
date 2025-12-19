<?php

namespace App\Filament\Resources\Contacts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactsTable
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

                TextColumn::make('subject')
                    ->label('தலைப்பு')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('message')
                    ->label('செய்தி')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: false),

                IconColumn::make('is_read')
                    ->label('படிக்கப்பட்டது')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('read_at')
                    ->label('படித்த நேரம்')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
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
