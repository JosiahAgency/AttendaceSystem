<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UsersStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('All Users', User::all()->count()),
            Stat::make('Teachers', User::where('role', 'teacher')->count()),
            Stat::make('Students', User::where('role', 'student')->count())
        ];
    }
}
