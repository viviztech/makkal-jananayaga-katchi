<?php

namespace App\Filament\Widgets;

use App\Models\District;
use Filament\Widgets\ChartWidget;

class ApplicationsByDistrictChart extends ChartWidget
{
    protected ?string $heading = 'Applications by District';

    protected function getData(): array
    {
        $rows = District::query()
            ->withCount('applications')
            ->orderBy('name_en')
            ->get(['id', 'name_en']);

        $labels = $rows->pluck('name_en')->all();
        $data = $rows->pluck('applications_count')->all();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Applications',
                    'data' => $data,
                    'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                    'borderColor' => 'rgba(59, 130, 246, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
