<?php

namespace App\Filament\Resources\Members\Tables;

use App\Models\Member;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MembersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('state.name')
                    ->label('மாநிலம்')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('district.name')
                    ->label('மாவட்டம்')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('assembly.name')
                    ->label('சட்டமன்ற தொகுதி')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->label('பெயர்')
                    ->searchable(),
                TextColumn::make('father_name')
                    ->label('தந்தை பெயர்')
                    ->searchable(),
                TextColumn::make('dob')
                    ->label('பிறந்த தேதி')
                    ->date()
                    ->sortable(),
                TextColumn::make('gender')
                    ->label('பாலினம்')
                    ->searchable(),
                TextColumn::make('phone_no')
                    ->label('தொலைபேசி எண்')
                    ->searchable(),
                TextColumn::make('email_id')
                    ->label('மின்னஞ்சல்')
                    ->searchable(),
                ImageColumn::make('photo')
                    ->label('புகைப்படம்')
                    ->getStateUsing(function ($record) {
                        $photo = (string) ($record->photo ?? '');
                        if ($photo === '') {
                            return null;
                        }
                        if (Str::startsWith($photo, ['http://', 'https://', '/'])) {
                            return $photo;
                        }
                        if (Str::startsWith($photo, 'storage/')) {
                            return '/'.$photo;
                        }
                        return Storage::disk('public')->url($photo);
                    })
                    ->circular()
                    ->size(48),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                ViewAction::make(),
                Action::make('download_id_card')
                    ->label('Download ID Card')
                    ->icon('heroicon-o-credit-card')
                    ->color('success')
                    ->url('#')
                    ->openUrlInNewTab(false)
                    ->extraAttributes(fn (Member $record) => [
                        'onclick' => "event.preventDefault(); event.stopPropagation(); event.stopImmediatePropagation(); const url = '" . route('members.idcard.download', ['member' => $record->id, 'type' => 'full']) . "'; const filename = 'member-id-card-{$record->id}-full.pdf'; const link = document.createElement('a'); link.href = url; link.download = filename; link.style.display = 'none'; document.body.appendChild(link); link.click(); setTimeout(() => document.body.removeChild(link), 100); return false;",
                    ])
                    ->tooltip('Download member ID card'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
