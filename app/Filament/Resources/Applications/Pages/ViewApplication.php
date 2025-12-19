<?php

namespace App\Filament\Resources\Applications\Pages;

use App\Filament\Resources\Applications\ApplicationResource;
use App\Models\Application;
use Filament\Actions\Action;
use Filament\Resources\Pages\ViewRecord;
use Spatie\LaravelPdf\Facades\Pdf;

class ViewApplication extends ViewRecord
{
    protected static string $resource = ApplicationResource::class;

    public static function canViewInPublic(): bool
    {
        return true;
    }

    protected function getHeaderActions(): array
    {
        $application = $this->record;
        
        return [
            Action::make('download_pdf')
                ->label('Download PDF')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->action(function () use ($application) {
                    $url = route('applications.pdf.download', ['application' => $application->id]);
                    // Force full page navigation for download
                    return redirect($url);
                })
                ->tooltip('Download application as PDF'),
        ];
    }

    public function renderInPublic(): string
    {
        return 'pages.application';
    }
}