<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Bearer;
use App\Models\Post;
use App\Models\Postingstage;
use App\Models\District;
use App\Models\Assembly;
use App\Models\Subbody;

class ModelsOverview extends BaseWidget
{
    protected ?string $heading = 'Party Leadership Overview';

    protected function getStats(): array
    {
        // Get bearers by posting stage
        $stateLevelBearers = Bearer::whereHas('post', function($query) {
            $query->where('postingstage_id', 1); // State level
        })->count();

        $districtLevelBearers = Bearer::whereHas('post', function($query) {
            $query->where('postingstage_id', 2); // District level
        })->count();

        $assemblyLevelBearers = Bearer::whereHas('post', function($query) {
            $query->where('postingstage_id', 3); // Assembly level
        })->count();

        return [
            Stat::make('Total Party Heads', number_format(Bearer::count()))
                ->description('All leadership positions')
                ->color('primary')
                ->icon('heroicon-o-users'),

            Stat::make('State Level Leaders', number_format($stateLevelBearers))
                ->description('State leadership positions')
                ->color('success')
                ->icon('heroicon-o-building-office-2'),

            Stat::make('District Level Leaders', number_format($districtLevelBearers))
                ->description('District leadership positions')
                ->color('warning')
                ->icon('heroicon-o-map'),

            Stat::make('Assembly Level Leaders', number_format($assemblyLevelBearers))
                ->description('Assembly leadership positions')
                ->color('info')
                ->icon('heroicon-o-user-group'),

            Stat::make('Total Posts', number_format(Post::count()))
                ->description('Available positions')
                ->color('gray')
                ->icon('heroicon-o-briefcase'),

            Stat::make('Party Wings', number_format(Subbody::count()))
                ->description('Organizational wings')
                ->color('danger')
                ->icon('heroicon-o-flag'),

            Stat::make('Districts Covered', number_format(District::count()))
                ->description('Geographic coverage')
                ->color('primary')
                ->icon('heroicon-o-map-pin'),

            Stat::make('Assembly Constituencies', number_format(Assembly::count()))
                ->description('Political reach')
                ->color('success')
                ->icon('heroicon-o-building-library'),
        ];
    }
}
