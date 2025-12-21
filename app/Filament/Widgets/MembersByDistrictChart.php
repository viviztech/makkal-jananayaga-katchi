<?php

namespace App\Filament\Widgets;

use App\Models\District;
use Filament\Widgets\ChartWidget;

class MembersByDistrictChart extends ChartWidget
{
    protected ?string $heading = 'Party Heads by District';

    protected function getData(): array
    {
        $rows = District::query()
            ->withCount('bearers')
            ->orderBy('name_en')
            ->get(['id', 'name_en']);

        $labels = $rows->pluck('name_en')->all();
        $data = $rows->pluck('bearers_count')->all();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Party Heads',
                    'data' => $data,
                    'backgroundColor' => 'rgba(220, 38, 38, 0.5)', // Red color for MJK
                    'borderColor' => 'rgba(220, 38, 38, 1)',
                    'borderWidth' => 2,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
