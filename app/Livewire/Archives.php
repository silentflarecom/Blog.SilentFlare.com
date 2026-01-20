<?php

namespace App\Livewire;

use Livewire\Component;

class Archives extends Component
{
    public function render()
    {
        $archives = collect([
            '2024' => [
                'October' => 4,
                'September' => 6,
                'August' => 3,
                'July' => 5,
            ],
            '2023' => [
                'December' => 2,
                'November' => 7,
                'October' => 1,
            ]
        ]);

        return view('livewire.archives', [
            'archives' => $archives
        ]);
    }
}
