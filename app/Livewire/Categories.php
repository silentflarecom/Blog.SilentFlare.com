<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public function render()
    {
        $categories = Category::withCount('posts')
            ->orderBy('name')
            ->get();

        return view('livewire.categories', [
            'categories' => $categories
        ]);
    }
}
