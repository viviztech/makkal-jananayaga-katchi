<?php

namespace App\Filament\Resources\Books\Pages;

use App\Filament\Resources\Books\BookResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBook extends CreateRecord
{
    protected static string $resource = BookResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Auto-detect ebook format from file extension
        if (isset($data['ebook_file_path']) && !empty($data['ebook_file_path'])) {
            $filePath = $data['ebook_file_path'];
            $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
            
            if ($extension === 'pdf') {
                $data['ebook_format'] = 'pdf';
            } elseif ($extension === 'epub') {
                $data['ebook_format'] = 'epub';
            }
        }

        return $data;
    }
}
