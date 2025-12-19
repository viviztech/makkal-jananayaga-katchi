<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Application;
use App\Models\Assembly;
use App\Models\Block;
use App\Models\City;
use App\Models\District;
use App\Models\Member;
use App\Models\Paguthi;
use App\Models\Perur;
use App\Models\Post;
use App\Models\Postingstage;
use App\Models\State;
use App\Models\Subbody;
use App\Models\User;
use App\Models\Vattam;

class ModelsOverview extends BaseWidget
{
    protected ?string $heading = 'Totals Overview';

    protected function getStats(): array
    {
        return [
            Stat::make('Applications', number_format(Application::count())),
            Stat::make('Members', number_format(Member::count())),
            Stat::make('Users', number_format(User::count())),
            Stat::make('States', number_format(State::count())),
            Stat::make('Districts', number_format(District::count())),
            Stat::make('Assemblies', number_format(Assembly::count())),
            Stat::make('Blocks', number_format(Block::count())),
            Stat::make('Cities', number_format(City::count())),
            Stat::make('Perurs', number_format(Perur::count())),
            Stat::make('Paguthis', number_format(Paguthi::count())),
            Stat::make('Vattams', number_format(Vattam::count())),
            Stat::make('Posting Stages', number_format(Postingstage::count())),
            Stat::make('Sub Bodies', number_format(Subbody::count())),
            Stat::make('Posts', number_format(Post::count())),
        ];
    }
}
