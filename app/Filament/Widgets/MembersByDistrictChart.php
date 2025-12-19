<?php

namespace App\Filament\Widgets;

use App\Models\District;
use Filament\Widgets\ChartWidget;

class MembersByDistrictChart extends ChartWidget
{
    protected ?string $heading = 'Members by District';

    protected function getData(): array
    {
        $rows = District::query()
            ->withCount('members')
            ->orderBy('name_en')
            ->get(['id', 'name_en']);

        $labels = $rows->pluck('name_en')->all();
        $data = $rows->pluck('members_count')->all();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Members',
                    'data' => $data,
                    'backgroundColor' => 'rgba(16, 185, 129, 0.5)',
                    'borderColor' => 'rgba(16, 185, 129, 1)',
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
