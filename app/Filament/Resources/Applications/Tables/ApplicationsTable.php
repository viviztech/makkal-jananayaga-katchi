<?php

namespace App\Filament\Resources\Applications\Tables;

use App\Models\Application;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Spatie\LaravelPdf\Facades\Pdf;

class ApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('state.name')
                    ->numeric()
                    ->sortable()
                    ->label('மாநிலம்'),
                TextColumn::make('district.name')
                    ->numeric()
                    ->sortable()
                    ->label('மாவட்டம்'),
                TextColumn::make('assembly.name')
                    ->numeric()
                    ->sortable()
                    ->label('சட்ட மன்ற தொகுதி'),
                // TextColumn::make('block_id')
                //     ->numeric()
                //     ->sortable()
                //     ->label('ஒன்றியம்'),
                // TextColumn::make('city_id')
                //     ->numeric()
                //     ->sortable()
                //     ->label('நகரம்'),
                // TextColumn::make('perur_id')
                //     ->numeric()
                //     ->sortable()
                //     ->label('பேரூராட்சி'),
                // TextColumn::make('paguthi_id')
                //     ->numeric()
                //     ->sortable()
                //     ->label('பகுதி'),
                // TextColumn::make('vattam_id')
                //     ->numeric()
                //     ->sortable()
                //     ->label('வட்டம்'),
                TextColumn::make('postingstage.name')
                    ->numeric()
                    ->sortable()
                    ->label('பதவி நிலை'),
                TextColumn::make('subbody.name')
                    ->numeric()
                    ->sortable()
                    ->label('துணை நிலை அமைப்பு'),
                TextColumn::make('post.name_en')
                    ->numeric()
                    ->sortable()
                    ->label('பதவி'),
                TextColumn::make('name')
                    ->label('பெயர்')
                    ->searchable(),
                // TextColumn::make('father_name')
                //     ->searchable(),
                // TextColumn::make('mother_name')
                //     ->searchable(),
                // TextColumn::make('spouse_name')
                //     ->searchable(),
                // TextColumn::make('dob')
                //     ->date()
                //     ->sortable(),
                TextColumn::make('gender')
                    ->searchable(),
                // TextColumn::make('education')
                //     ->searchable(),
                // TextColumn::make('occupation')
                //     ->searchable(),
                // TextColumn::make('marital_status')
                //     ->searchable(),
                // TextColumn::make('social_category')
                //     ->searchable(),
                // TextColumn::make('joining_date')
                //     ->date()
                //     ->sortable(),
                // TextColumn::make('current_post')
                //     ->searchable(),
                // TextColumn::make('mobile_number')
                //     ->searchable(),
                // TextColumn::make('email_id')
                //     ->searchable(),
                // TextColumn::make('document')
                //     ->searchable(),
                // TextColumn::make('photo')
                //     ->searchable(),
                TextColumn::make('status')
                    ->searchable(),
                // TextColumn::make('selected_postingstage')
                //     ->searchable(),
                // TextColumn::make('selected_subbody')
                //     ->searchable(),
                // TextColumn::make('selected_post')
                //     ->searchable(),
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
                Action::make('download_pdf')
                    ->label('Download PDF')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->action(function (Application $record) {
                        $url = route('applications.pdf.download', ['application' => $record->id]);
                        // Force full page navigation for download
                        return redirect($url);
                    })
                    ->tooltip('Download application as PDF'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
