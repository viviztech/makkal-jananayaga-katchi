<?php

namespace App\Filament\Resources\Books\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('புத்தக விவரங்கள்')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                TextInput::make('title')
                                    ->label('தலைப்பு')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                TextInput::make('author')
                                    ->label('எழுதியவர்')
                                    ->maxLength(255)
                                    ->columnSpan(6),

                                TextInput::make('price')
                                    ->label('விலை (₹)')
                                    ->numeric()
                                    ->default(0)
                                    ->step(0.01)
                                    ->required()
                                    ->columnSpan(4),

                                TextInput::make('stock')
                                    ->label('பங்கு')
                                    ->numeric()
                                    ->default(0)
                                    ->required()
                                    ->columnSpan(4),

                                Toggle::make('is_available')
                                    ->label('கிடைக்கும்')
                                    ->default(true)
                                    ->columnSpan(4),

                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->maxLength(255)
                                    ->helperText('Leave empty to auto-generate from title')
                                    ->columnSpan(6),

                                MarkdownEditor::make('description')
                                    ->label('விளக்கம்')
                                    ->columnSpan(12),

                                FileUpload::make('cover_image')
                                    ->label('அட்டைப்படம்')
                                    ->image()
                                    ->disk('public')
                                    ->directory('books/covers')
                                    ->visibility('public')
                                    ->imageEditor()
                                    ->columnSpan(6),

                                TextInput::make('sort_order')
                                    ->label('வரிசை எண்')
                                    ->numeric()
                                    ->default(0)
                                    ->columnSpan(6),

                                Toggle::make('is_active')
                                    ->label('செயலில் உள்ளது')
                                    ->default(true)
                                    ->columnSpan(6),
                            ]),
                    ]),
                Section::make('மின் புத்தக விருப்பங்கள்')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                Toggle::make('is_ebook')
                                    ->label('மின் புத்தகம்')
                                    ->default(false)
                                    ->reactive()
                                    ->columnSpan(6),

                                Toggle::make('is_ebook_available')
                                    ->label('மின் புத்தகம் கிடைக்கும்')
                                    ->default(false)
                                    ->visible(fn ($get) => $get('is_ebook'))
                                    ->columnSpan(6),

                                FileUpload::make('ebook_file_path')
                                    ->label('மின் புத்தக கோப்பு')
                                    ->acceptedFileTypes(['application/pdf', 'application/epub+zip'])
                                    ->disk('public')
                                    ->directory('books/ebooks')
                                    ->visibility('public')
                                    ->maxSize(51200) // 50MB
                                    ->visible(fn ($get) => $get('is_ebook'))
                                    ->helperText('PDF அல்லது EPUB கோப்பை பதிவேற்றவும் (அதிகபட்சம் 50MB)')
                                    ->columnSpan(6),

                                Select::make('ebook_format')
                                    ->label('கோப்பு வடிவம்')
                                    ->options([
                                        'pdf' => 'PDF',
                                        'epub' => 'EPUB',
                                    ])
                                    ->visible(fn ($get) => $get('is_ebook') && $get('ebook_file_path'))
                                    ->columnSpan(6),

                                Toggle::make('has_text_content')
                                    ->label('உரை உள்ளடக்கம் (TTS ஆதரவு)')
                                    ->default(false)
                                    ->visible(fn ($get) => $get('is_ebook') && $get('ebook_format') === 'pdf')
                                    ->helperText('PDF கோப்பில் உரை உள்ளடக்கம் இருந்தால், இதை இயக்கவும். இது குரல் வாசிப்புக்கு பயன்படும்.')
                                    ->columnSpan(12),
                            ]),
                    ])
                    ->collapsible()
                    ->collapsed(),
            ]);
    }
}
