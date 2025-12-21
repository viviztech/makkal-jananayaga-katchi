<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Filament\Widgets\ChartWidget;

class ApplicationsByDistrictChart extends ChartWidget
{
    protected ?string $heading = 'Party Heads by Position Level';

    protected function getData(): array
    {
        // Get bearers count grouped by posting stage
        $postingstages = \App\Models\Postingstage::query()
            ->withCount(['posts as bearers_count' => function($query) {
                $query->join('bearers', 'posts.id', '=', 'bearers.post_id');
            }])
            ->orderBy('id')
            ->get(['id', 'name_en']);

        $labels = $postingstages->pluck('name_en')->all();
        $data = $postingstages->pluck('bearers_count')->all();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Party Heads',
                    'data' => $data,
                    'backgroundColor' => [
                        'rgba(220, 38, 38, 0.7)',   // Red
                        'rgba(37, 99, 235, 0.7)',   // Blue
                        'rgba(234, 179, 8, 0.7)',   // Yellow
                        'rgba(16, 185, 129, 0.7)',  // Green
                    ],
                    'borderColor' => [
                        'rgba(220, 38, 38, 1)',
                        'rgba(37, 99, 235, 1)',
                        'rgba(234, 179, 8, 1)',
                        'rgba(16, 185, 129, 1)',
                    ],
                    'borderWidth' => 2,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
