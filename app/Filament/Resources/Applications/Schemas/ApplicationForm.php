<?php

namespace App\Filament\Resources\Applications\Schemas;

use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Get;
use App\Models\State;
use App\Models\District;
use App\Models\Assembly;
use App\Models\Block;
use App\Models\City;
use App\Models\Perur;
use App\Models\Paguthi;
use App\Models\Vattam;
use App\Models\Postingstage;
use App\Models\Subbody;
use App\Models\Post;
use App\Models\Corporation;
use Filament\Forms\Components\FileUpload;


class ApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Application details')
                    ->description('Complete the application details')
                    ->schema([
                        Grid::make(12)->schema([
                            Select::make('state_id')
                                ->label('State')
                                ->options(fn () => State::query()->orderBy('name_en')->pluck('name_en', 'id')->all())
                                ->searchable()
                                ->preload()
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->live()
                                ->afterStateUpdated(function (callable $set) {
                                    $set('district_id', null);
                                    $set('assembly_id', null);
                                    $set('block_id', null);
                                    $set('city_id', null);
                                    $set('perur_id', null);
                                    $set('paguthi_id', null);
                                    $set('vattam_id', null);
                                }),
                            Select::make('district_id')
                                ->label('District')
                                ->options(fn (Get $get) => District::query()
                                    ->when($get('state_id'), fn ($q, $stateId) => $q->where('state_id', $stateId))
                                    ->orderBy('name_en')
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->searchable()
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->preload()
                                ->live()
                                ->disabled(fn (Get $get) => blank($get('state_id')))
                                ->afterStateUpdated(function (callable $set) {
                                    $set('assembly_id', null);
                                    $set('block_id', null);
                                    $set('city_id', null);
                                    $set('perur_id', null);
                                    $set('paguthi_id', null);
                                    $set('vattam_id', null);
                                }),
                            Select::make('assembly_id')
                                ->label('Assembly')
                                ->options(fn (Get $get) => Assembly::query()
                                    ->when($get('district_id'), fn ($q, $districtId) => $q->where('district_id', $districtId))
                                    ->orderBy('name_en')
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->searchable()
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->preload()
                                ->live()
                                ->disabled(fn (Get $get) => blank($get('district_id')))
                                ->afterStateUpdated(function (callable $set) {
                                    $set('block_id', null);
                                    $set('city_id', null);
                                    $set('perur_id', null);
                                    $set('paguthi_id', null);
                                    $set('vattam_id', null);
                                }),
                            Select::make('postingstage_id')
                                ->label('Posting Stage')
                                ->options(fn () => Postingstage::query()->orderBy('name_en')->pluck('name_en', 'id')->all())
                                ->searchable()
                                ->preload()
                                ->live()
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->afterStateUpdated(function (callable $set) {
                                    $set('subbody_id', null);
                                    $set('post_id', null);
                                }),
                            Select::make('subbody_id')
                                ->label('Sub Body')
                                ->options(fn (Get $get) => Subbody::query()
                                    ->when($get('postingstage_id'), fn ($q, $postingStageId) => $q->where('postingstage_id', $postingStageId))
                                    ->orderBy('name_en')
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->searchable()
                                ->preload()
                                ->live()
                                ->disabled(fn (Get $get) => blank($get('postingstage_id'))),
                            Select::make('post_id')
                                ->label('Post')
                                ->options(fn (Get $get) => Post::query()
                                    ->when($get('postingstage_id'), fn ($q, $postingStageId) => $q->where('postingstage_id', $postingStageId))
                                    ->orderBy('name_en')
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->searchable()
                                ->preload()
                                ->disabled(fn (Get $get) => blank($get('postingstage_id'))),
                            Select::make('block_id')
                                ->label('Block')
                                ->options(fn (Get $get) => Block::query()
                                    ->when($get('district_id'), fn ($q, $districtId) => $q->where('district_id', $districtId))
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->searchable()
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->preload()
                                ->disabled(fn (Get $get) => blank($get('assembly_id')))
                                ->visible(fn (Get $get): bool => match (Postingstage::find($get('postingstage_id'))?->name_en) {
                                    'Block' => true,
                                    default => false,
                                }),
                            Select::make('city_id')
                                ->label('City')
                                ->options(fn (Get $get) => City::query()
                                    ->when($get('district_id'), fn ($q, $districtId) => $q->where('district_id', $districtId))
                                    ->orderBy('name_en')
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->searchable()
                                ->preload()
                                ->disabled(fn (Get $get) => blank($get('assembly_id')))
                                ->visible(fn (Get $get): bool => match (Postingstage::find($get('postingstage_id'))?->name_en) {
                                    'City' => true,
                                    default => false,
                                }),
                            Select::make('perur_id')
                                ->label('Perur')
                                ->options(fn (Get $get) => Perur::query()
                                    ->when($get('district_id'), fn ($q, $districtId) => $q->where('district_id', $districtId))
                                    ->orderBy('name_en')
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->searchable()
                                ->preload()
                                ->disabled(fn (Get $get) => blank($get('assembly_id')))
                                ->visible(fn (Get $get): bool => match (Postingstage::find($get('postingstage_id'))?->name_en) {
                                    'Perur' => true,
                                    default => false,
                                }),
                            Select::make('paguthi_id')
                                ->label('Paguthi')
                                ->options(fn (Get $get) => Paguthi::query()
                                    ->when($get('district_id'), fn ($q, $districtId) => $q->where('district_id', $districtId))
                                    ->orderBy('name_en')
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6])
                                ->searchable()
                                ->preload()
                                ->disabled(fn (Get $get) => blank($get('assembly_id')))
                                ->visible(fn (Get $get): bool => match (Postingstage::find($get('postingstage_id'))?->name_en) {
                                    'Paguthi' => true,
                                    default => false,
                                }),
                            Select::make('vattam_id')
                                ->label('Vattam')
                                ->options(fn (Get $get) => Vattam::query()
                                    ->when($get('district_id'), fn ($q, $districtId) => $q->where('district_id', $districtId))
                                    ->orderBy('name_en')
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6])
                                ->searchable()
                                ->preload()
                                ->disabled(fn (Get $get) => blank($get('assembly_id')))
                                ->visible(fn (Get $get): bool => match (Postingstage::find($get('postingstage_id'))?->name_en) {
                                    'Vattam' => true,
                                    default => false,
                                }),
                            Select::make('corporation_id')
                                ->label('Corporation')
                                ->options(fn (Get $get) => Corporation::query()
                                    ->when($get('district_id'), fn ($q, $districtId) => $q->where('district_id', $districtId))
                                    ->orderBy('name_en')
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6])
                                ->searchable()
                                ->preload()
                                ->disabled(fn (Get $get) => blank($get('assembly_id')))
                                ->visible(fn (Get $get): bool => match (Postingstage::find($get('postingstage_id'))?->name_en) {
                                    'Corporation' => true,
                                    default => false,
                                }),
                            TextInput::make('name')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->required(),
                            TextInput::make('membership_id')
                                ->label('Membership ID')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            TextInput::make('aadhar_no')
                                ->label('Aadhar Number')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->numeric()
                                ->maxLength(12),
                            TextInput::make('voterid_no')
                                ->label('Voter ID')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            TextInput::make('father_name')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            TextInput::make('mother_name')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            TextInput::make('spouse_name')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            DatePicker::make('dob')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            Select::make('gender')
                                ->options([
                                    'Male' => 'Male',
                                    'Female' => 'Female',
                                    'Other' => 'Other',
                                ])
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            TextInput::make('education')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            TextInput::make('occupation')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            Select::make('marital_status')
                                ->options([
                                    'Single' => 'Single',
                                    'Married' => 'Married',
                                    'Divorced' => 'Divorced',
                                    'Widowed' => 'Widowed',
                                ])
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            Select::make('social_category')
                                ->options([
                                    'General' => 'General',
                                    'OBC' => 'OBC',
                                    'SC' => 'SC',
                                    'ST' => 'ST',
                                ])
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            DatePicker::make('joining_date')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            TextInput::make('current_post')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            Textarea::make('address')
                                ->columnSpan(['sm' => 12, 'md' => 12, 'lg' => 4])
                                ->columnSpanFull(),
                            TextInput::make('mobile_number')
                                ->tel()
                                ->columnSpan(['sm' => 12, 'md' => 12, 'lg' => 4]),
                            TextInput::make('email_id')
                                ->email()
                                ->columnSpan(['sm' => 12, 'md' => 12, 'lg' => 4]),
                            FileUpload::make('document')
                                ->disk('public')
                                ->directory('applications/documents')
                                ->visibility('public')
                                ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/jpg', 'image/png'])
                                ->maxSize(5120)
                                ->columnSpan(['sm' => 12, 'md' => 12, 'lg' => 4]),
                            FileUpload::make('photo')
                                ->disk('public')
                                ->directory('applications/photos')
                                ->visibility('public')
                                ->image()
                                ->imageEditor()
                                ->imageEditorAspectRatios([
                                    null,
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ])
                                ->maxSize(2048)
                                ->columnSpan(['sm' => 12, 'md' => 12, 'lg' => 4]),
                            Select::make('status')
                                ->options([
                                    'Pending' => 'Pending',
                                    'Approved' => 'Approved',
                                    'Rejected' => 'Rejected',
                                ])
                                ->required()
                                ->default('Pending')
                                ->columnSpan(['sm' => 12, 'md' => 12, 'lg' => 4]),
                            TextInput::make('selected_postingstage')
                                ->columnSpan(['sm' => 12, 'md' => 12, 'lg' => 4]),
                            TextInput::make('selected_subbody')
                                ->columnSpan(['sm' => 12, 'md' => 12, 'lg' => 4]),
                            TextInput::make('selected_post')
                                ->columnSpan(['sm' => 12, 'md' => 12, 'lg' => 4]),
                        ]),
                    ])->columnSpan('full'),
                ]);
             
    }
}