<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Posts', Post::count())
                ->description('Published: ' . Post::published()->count())
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),
            Stat::make('Total Views', number_format(Post::sum('views')))
                ->description('Across all posts')
                ->descriptionIcon('heroicon-m-eye')
                ->color('success'),
            Stat::make('Categories', Category::count())
                ->description('Content organization')
                ->descriptionIcon('heroicon-m-folder')
                ->color('warning'),
        ];
    }
}
