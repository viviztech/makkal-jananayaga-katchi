<?php

namespace App\Filament\Resources\Books\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BooksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('cover_image')
                    ->label('அட்டைப்படம்')
                    ->disk('public')
                    ->size(60),

                TextColumn::make('title')
                    ->label('தலைப்பு')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('author')
                    ->label('எழுதியவர்')
                    ->searchable()
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('செயலில்')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('sort_order')
                    ->label('வரிசை')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('உருவாக்கப்பட்டது')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order', 'asc');
    }
}
