<?php

namespace App\Filament\Resources\Bearers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class BearersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('post.name_ta')
                    ->label('Post')
                    ->sortable()
                    ->searchable()
                    ->default('N/A'),
                \Filament\Tables\Columns\TextColumn::make('assembly.name_ta')
                    ->label('Assembly')
                    ->sortable(),
                \Filament\Tables\Columns\TextColumn::make('name_ta')
                    ->label('Name (Tamil)')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('name_en')
                    ->label('Name (English)')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                \Filament\Tables\Columns\ImageColumn::make('photo')
                    ->label('Photo')
                    ->disk('public'),
                \Filament\Tables\Columns\TextColumn::make('facebook')
                    ->label('Facebook'),
                \Filament\Tables\Columns\TextColumn::make('x')
                    ->label('X'),
                \Filament\Tables\Columns\TextColumn::make('instagram')
                    ->label('Instagram'),
                \Filament\Tables\Columns\TextColumn::make('youtube')
                    ->label('YouTube'),
                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                \Filament\Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
