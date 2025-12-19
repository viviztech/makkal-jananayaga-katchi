<?php

namespace App\Filament\Resources\Bearers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

class BearerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Bearers Information')
                    ->description('Enter the details of the Bearers')
                    ->schema([
                        Grid::make(12)->schema([
                    Select::make('post_id')
                    ->relationship('post', 'name_ta')
                    ->required()
                    ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                    Select::make('assembly_id')
                    ->relationship('assembly', 'name_en')
                    ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                    TextInput::make('name_ta')
                    ->label('Name (Tamil)')
                    ->required()
                    ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                    TextInput::make('name_en')
                    ->label('Name (English)')
                    ->required()
                    ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                    Textarea::make('content_ta')
                    ->label('Content (Tamil)')
                    ->nullable()
                    ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                    Textarea::make('content_en')
                    ->label('Content (English)')
                    ->nullable()
                    ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                    TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                    FileUpload::make('photo')
                    ->label('Photo')
                    ->image()
                    ->disk('public')
                    ->directory('bearers')
                    ->visibility('public')
                    ->nullable()
                    ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                    TextInput::make('facebook')
                    ->label('Facebook')
                    ->url()
                    ->nullable()
                    ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                    TextInput::make('x')
                    ->label('X (Twitter)')
                    ->url()
                    ->nullable()
                    ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                    TextInput::make('instagram')
                    ->label('Instagram')
                    ->url()
                    ->nullable()
                    ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                    TextInput::make('youtube')
                    ->label('YouTube')
                    ->url()
                    ->nullable()
                    ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                    ]),
                ])->columnSpan('full'),
            ]);
    }
}
