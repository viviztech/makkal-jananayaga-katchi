<?php

namespace App\Filament\Resources\Members\Schemas;

use App\Models\Assembly;
use App\Models\District;
use App\Models\State;
use App\Models\Block;
use App\Models\Corporation;
use App\Models\City;
use App\Models\Perur;
use App\Models\Paguthi;
use App\Models\Vattam;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class MemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Member details')
                    ->description('Complete the member information')
                    ->schema([
                        Grid::make(12)->schema([
                            // Member Number
                            TextInput::make('member_no')
                                ->label('Member Number')
                                ->required()
                                ->default(null)
                                ->disabled()
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),

                            // Personal details
                            TextInput::make('name')
                                ->label('Full name')
                                ->required()
                                ->maxLength(255)
                                ->placeholder('Enter full name')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('father_name')
                                ->label("Father's name")
                                ->required()
                                ->nullable() // Aligned with JoinRequest
                                ->maxLength(255)
                                ->placeholder("Enter father's name")
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            Select::make('gender')
                                ->options(['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'])
                                ->native(false)
                                ->placeholder('Select gender')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            DatePicker::make('dob')
                                ->label('Date of birth')
                                ->native(false)
                                ->maxDate(now())
                                ->nullable() // Aligned with JoinRequest
                                ->placeholder('YYYY-MM-DD')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            Select::make('blood_group')
                                ->options([
                                    'A+' => 'A+',
                                    'A-' => 'A-',
                                    'B+' => 'B+',
                                    'B-' => 'B-',
                                    'AB+' => 'AB+',
                                    'AB-' => 'AB-',
                                    'O+' => 'O+',
                                    'O-' => 'O-',
                                ])
                                ->placeholder('Select blood group')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),
                            

                            // Contact & address
                            TextInput::make('phone_no')
                                ->label('Phone number')
                                ->tel()
                                ->required()
                                ->maxLength(20)
                                ->placeholder('+91 98765 43210')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('email_id')
                                ->label('Email')
                                ->email()
                                ->required()
                                ->maxLength(255)
                                ->placeholder('name@example.com')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('voterid')
                                ->label('Voter ID')
                                ->maxLength(255)
                                ->placeholder('Enter voter ID')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('aadhar_no')
                                ->label('Aadhar Number')
                                ->numeric()
                                ->maxLength(12)
                                ->placeholder('12 digit Aadhar number')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('pincode')
                                ->label('Pincode')
                                ->maxLength(6)
                                ->placeholder('Enter pincode')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            Textarea::make('address')
                                ->rows(4)
                                ->autosize()
                                ->nullable() // Aligned with JoinRequest
                                ->maxLength(2000)
                                ->placeholder('House / Street, Area, City, Pincode')
                                ->helperText('Provide the full postal address')
                                ->columnSpan(['sm' => 12, 'md' => 12, 'lg' => 12]),
                            FileUpload::make('photo')
                                ->label('Photo')
                                ->image()
                                ->imagePreviewHeight('150')
                                ->disk('public')
                                ->visibility('public')
                                ->directory('member_photos')
                                ->helperText('Accepted: JPG/PNG up to 2MB')
                                ->maxSize(2048)
                                ->columnSpan(['sm' => 12, 'md' => 12, 'lg' => 12]),
                        ]),
                    ]),

                Section::make('Location Details')
                    ->description('Select the location of the member')
                    ->schema([
                        Grid::make(12)->schema([
                            Select::make('state_id')
                                ->label('State')
                                ->options(fn () => State::query()->pluck('name_en', 'id')->all())
                                ->searchable()
                                ->preload()
                                ->live()
                                ->placeholder('Choose a state')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->afterStateUpdated(function (Set $set) {
                                    $set('place_type', null); // Clear place_type
                                    $set('district_id', null);
                                    $set('assembly_id', null);
                                    $set('city_id', null);
                                    $set('block_id', null);
                                    $set('perur_id', null);
                                    $set('paguthi_id', null);
                                    $set('vattam_id', null);
                                }),
                            Select::make('district_id')
                                ->label('District')
                                ->options(fn (Get $get) => District::query()
                                    ->when($get('state_id'), fn ($q, $stateId) => $q->where('state_id', $stateId))
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->searchable()
                                ->preload()
                                ->live()
                                ->required()
                                ->placeholder('Choose a district')
                                ->disabled(fn (Get $get) => blank($get('state_id')))
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->afterStateUpdated(function (callable $set) {
                                    $set('assembly_id', null);
                                    $set('city_id', null);
                                    $set('block_id', null);
                                    $set('perur_id', null);
                                    $set('paguthi_id', null);
                                    $set('vattam_id', null);
                                }),
                            Select::make('assembly_id')
                                ->label('Assembly')
                                ->options(fn (Get $get) => Assembly::query()
                                    ->when($get('district_id'), fn ($q, $districtId) => $q->where('district_id', $districtId))
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->searchable()
                                ->preload()
                                ->live()
                                ->required()
                                ->placeholder('Choose an assembly')
                                ->disabled(fn (Get $get) => blank($get('district_id')))
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->afterStateUpdated(function (callable $set) {
                                    $set('block_id', null);
                                }),

                            Select::make('place_type')
                                ->label('Place Type')
                                ->options([
                                    'ஊராட்சி ஒன்றியம்' => 'ஊராட்சி ஒன்றியம்',
                                    'பேரூராட்சி' => 'பேரூராட்சி',
                                    'நகராட்சி' => 'நகராட்சி',
                                    'மாநகராட்சி' => 'மாநகராட்சி',
                                ])
                                ->live()
                                ->required()
                                ->placeholder('Choose a place type')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),

                            Select::make('block_id')
                                ->label('Block')
                                ->options(fn (Get $get) => Block::query()
                                    ->when($get('district_id'), fn ($q, $districtId) => $q->where('district_id', $districtId))
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->searchable()
                                ->preload()
                                ->live()
                                ->required()
                                ->placeholder('Choose a block')
                                ->visible(fn (Get $get) => $get('place_type') === 'ஊராட்சி ஒன்றியம்')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),

                            Select::make('perur_id')
                                ->label('Perur')
                                ->options(fn (Get $get) => Perur::query()
                                    ->when($get('district_id'), fn ($q, $districtId) => $q->where('district_id', $districtId))
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->searchable()
                                ->preload()
                                ->live()
                                ->required()
                                ->placeholder('Choose a perur')
                                ->visible(fn (Get $get) => $get('place_type') === 'பேரூராட்சி')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4]),

                            Select::make('city_id')
                                ->label('City')
                                ->options(fn (Get $get) => City::query()
                                    ->when($get('district_id'), fn ($q, $districtId) => $q->where('district_id', $districtId))
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->searchable()
                                ->preload()
                                ->live()
                                ->required()
                                ->placeholder('Choose a city')
                                ->visible(fn (Get $get) => in_array($get('place_type'), ['நகராட்சி']))
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->afterStateUpdated(function (callable $set) {
                                    $set('perur_id', null);
                                    $set('paguthi_id', null);
                                    $set('vattam_id', null);
                                }),
                            Select::make('corporation_id')
                                ->label('Corporation')
                                ->options(fn (Get $get) => Corporation::query()
                                    ->when($get('district_id'), fn ($q, $districtId) => $q->where('district_id', $districtId))
                                    ->pluck('name_en', 'id')
                                    ->all())
                                ->searchable()
                                ->preload()
                                ->live()
                                ->required()
                                ->placeholder('Choose a Corporation')
                                ->visible(fn (Get $get) => in_array($get('place_type'), ['மாநகராட்சி']))
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 4])
                                ->afterStateUpdated(function (callable $set) {
                                    $set('perur_id', null);
                                    $set('paguthi_id', null);
                                    $set('vattam_id', null);
                                }),

                        ]),
                    ]),
            ]);
    }
}
