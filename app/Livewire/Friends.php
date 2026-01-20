<?php

namespace App\Livewire;

use App\Models\FriendLink;
use Livewire\Component;

class Friends extends Component
{
    public function render()
    {
        $friends = FriendLink::ordered()->get();

        return view('livewire.friends', [
            'friends' => $friends
        ]);
    }
}
