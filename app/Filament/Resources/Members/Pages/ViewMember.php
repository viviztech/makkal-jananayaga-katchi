<?php

namespace App\Filament\Resources\Members\Pages;

use App\Filament\Resources\Members\MemberResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolist\Infolist;
use Filament\Infolist\Components\Section;
use Filament\Infolist\Components\TextEntry;
use Filament\Infolist\Components\ImageEntry;
use Filament\Actions\Action;

class ViewMember extends ViewRecord
{
    protected static string $resource = MemberResource::class;

    protected function getHeaderActions(): array
    {
        $member = $this->record;
        $downloadUrl = route('members.idcard.download', ['member' => $member->id, 'type' => 'full']);
        $filename = 'member-id-card-' . $member->id . '-full.pdf';
        
        return [
            Action::make('download_full')
                ->label('Download ID Card')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->url('#')
                ->openUrlInNewTab(false)
                ->extraAttributes([
                    'onclick' => "event.preventDefault(); event.stopPropagation(); event.stopImmediatePropagation(); const link = document.createElement('a'); link.href = '{$downloadUrl}'; link.download = '{$filename}'; link.style.display = 'none'; document.body.appendChild(link); link.click(); setTimeout(() => document.body.removeChild(link), 100); return false;",
                ])
                ->tooltip('Download member ID card'),
        ];
    }

    public function getInfolist(): Infolist
    {
        $member = $this->record;
        
        return Infolist::make()
            ->schema([
                Section::make('ID Card Information')
                    ->schema([
                        TextEntry::make('id')
                            ->label('Member ID')
                            ->badge()
                            ->color('success')
                            ->size(TextEntry\TextEntrySize::Large),
                        TextEntry::make('name')
                            ->label('Member Name')
                            ->size(TextEntry\TextEntrySize::Large)
                            ->weight('bold'),
                        TextEntry::make('district.name')
                            ->label('District')
                            ->default('N/A'),
                        TextEntry::make('assembly.name')
                            ->label('Assembly')
                            ->default('N/A'),
                    ])
                    ->columns(2)
                    ->icon('heroicon-o-credit-card')
                    ->collapsible(),

                Section::make('Personal Information')
                    ->schema([
                        ImageEntry::make('photo')
                            ->label('புகைப்படம் / Photo')
                            ->circular()
                            ->size(150),
                        TextEntry::make('name')
                            ->label('பெயர் / Name')
                            ->size(TextEntry\TextEntrySize::Large)
                            ->weight('bold'),
                        TextEntry::make('father_name')
                            ->label('தந்தை பெயர் / Father Name'),
                        TextEntry::make('dob')
                            ->label('பிறந்த தேதி / D.O.B')
                            ->date('d/m/Y'),
                        TextEntry::make('gender')
                            ->label('பாலினம் / Gender')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'Male' => 'info',
                                'Female' => 'danger',
                                default => 'gray',
                            }),
                        TextEntry::make('blood_group')
                            ->label('இரத்த வகை / Blood Group')
                            ->badge()
                            ->color('danger'),
                    ])
                    ->columns(3),

                Section::make('Contact Information')
                    ->schema([
                        TextEntry::make('phone_no')
                            ->label('தொலைபேசி எண் / Phone')
                            ->icon('heroicon-o-phone')
                            ->copyable(),
                        TextEntry::make('email_id')
                            ->label('மின்னஞ்சல் / Email')
                            ->icon('heroicon-o-envelope')
                            ->copyable(),
                        TextEntry::make('address')
                            ->label('முகவரி / Address')
                            ->columnSpanFull(),
                        TextEntry::make('pincode')
                            ->label('அஞ்சல் குறியீடு / Pincode'),
                        TextEntry::make('voterid')
                            ->label('Voter ID')
                            ->copyable(),
                    ])
                    ->columns(2),

                Section::make('Administrative Details')
                    ->schema([
                        TextEntry::make('state.name')
                            ->label('மாநிலம் / State'),
                        TextEntry::make('district.name')
                            ->label('மாவட்டம் / District'),
                        TextEntry::make('assembly.name')
                            ->label('சட்டமன்ற தொகுதி / Assembly'),
                        TextEntry::make('block.name')
                            ->label('Block')
                            ->default('N/A'),
                        TextEntry::make('perur.name')
                            ->label('Perur')
                            ->default('N/A'),
                        TextEntry::make('city.name')
                            ->label('City')
                            ->default('N/A'),
                        TextEntry::make('corporation.name')
                            ->label('Corporation')
                            ->default('N/A'),
                    ])
                    ->columns(3),

                Section::make('Registration Details')
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Registered On')
                            ->dateTime('d/m/Y h:i A'),
                        TextEntry::make('updated_at')
                            ->label('Last Updated')
                            ->dateTime('d/m/Y h:i A')
                            ->since(),
                    ])
                    ->columns(2),
            ]);
    }
}