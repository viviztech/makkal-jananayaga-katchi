<?php

namespace App\Filament\Resources\Media\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

class MediaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Media Information')
                    ->description('Enter the details of the Media Information')
                    ->schema([
                        Grid::make(12)->schema([
                            Select::make('category_id')
                                ->relationship('category', 'name_ta')
                                ->required()
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('title_ta')
                                ->required()
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('title_en')
                                ->required()
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('slug')
                                ->required()
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            MarkdownEditor::make('content_ta')
                                ->columnSpanFull(),
                            MarkdownEditor::make('content_en')
                                ->columnSpanFull(),
                            FileUpload::make('featured_image')
                                ->image()
                                ->disk('public')
                                ->directory('media/featured')
                                ->visibility('public')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            FileUpload::make('more_photos')
                                ->multiple()
                                ->image()
                                ->disk('public')
                                ->directory('media/gallery')
                                ->visibility('public')
                                ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            DatePicker::make('event_date')
                            ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                            TextInput::make('video_link')
                            ->columnSpan(['sm' => 12, 'md' => 6, 'lg' => 6]),
                        ]),
                ])->columnSpan('full'),
            ]);
    }
}