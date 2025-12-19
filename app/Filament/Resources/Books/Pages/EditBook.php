<?php

namespace App\Filament\Resources\Books\Pages;

use App\Filament\Resources\Books\BookResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBook extends EditRecord
{
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
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
