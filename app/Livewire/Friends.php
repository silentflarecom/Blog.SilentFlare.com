<?php

namespace App\Livewire;

use Livewire\Component;

class Friends extends Component
{
    public function render()
    {
        $friends = collect([
            ['name' => 'Alice Dev', 'url' => '#', 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Alice', 'description' => 'Full Stack Developer focused on Vue.js.'],
            ['name' => 'Bob Design', 'url' => '#', 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Bob', 'description' => 'UI/UX Designer and Illustrator.'],
            ['name' => 'Charlie Ops', 'url' => '#', 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Charlie', 'description' => 'DevOps Engineer and Cloud Architect.'],
            ['name' => 'Dave Code', 'url' => '#', 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Dave', 'description' => 'Rust enthusiast and systems programmer.'],
            ['name' => 'Eve Script', 'url' => '#', 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Eve', 'description' => 'JavaScript wizard and open source contributor.'],
            ['name' => 'Frank Sec', 'url' => '#', 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Frank', 'description' => 'Cybersecurity analyst and ethical hacker.'],
        ]);

        return view('livewire.friends', [
            'friends' => $friends
        ]);
    }
}
