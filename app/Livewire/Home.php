<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        // Mock data for display purposes until backend is fully ready
        $posts = collect([
            [
                'title' => 'Building a Modern Blog with TALL Stack',
                'excerpt' => 'Discover how to leverage Tailwind CSS, Alpine.js, Laravel, and Livewire to build a high-performance, SEO-friendly blog with a sleek dark mode design.',
                'category' => 'Development',
                'date' => 'Oct 24, 2024',
                'read_time' => '8 min'
            ],
            [
                'title' => 'The Future of Web Design: Neon & Glassmorphism',
                'excerpt' => 'Exploring the resurgence of neon aesthetics combined with glassmorphism to create immersive user experiences in web applications.',
                'category' => 'Design',
                'date' => 'Oct 20, 2024',
                'read_time' => '5 min'
            ],
            [
                'title' => 'Optimizing Laravel for High Scale',
                'excerpt' => 'Tips and tricks for scaling Laravel applications using Octane, caching strategies, and efficient database queries.',
                'category' => 'Backend',
                'date' => 'Oct 15, 2024',
                'read_time' => '12 min'
            ],
             [
                'title' => 'Why I Switched to Instrument Sans',
                'excerpt' => 'Typography plays a crucial role in readability and aesthetics. Here is why Instrument Sans is my new go-to font for technical blogs.',
                'category' => 'Typography',
                'date' => 'Oct 10, 2024',
                'read_time' => '4 min'
            ],
        ]);

        return view('livewire.home', [
            'posts' => $posts
        ]);
    }
}
