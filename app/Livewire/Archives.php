<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Archives extends Component
{
    public function render()
    {
        $archives = Post::published()
            ->select(
                DB::raw('YEAR(published_at) as year'),
                DB::raw('MONTH(published_at) as month'),
                DB::raw('MONTHNAME(published_at) as month_name'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('year', 'month', 'month_name')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get()
            ->groupBy('year')
            ->map(function ($items) {
                return $items->pluck('count', 'month_name');
            });

        return view('livewire.archives', [
            'archives' => $archives
        ]);
    }
}
