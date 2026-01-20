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
                'subtitle' => 'A comprehensive guide to full-stack development.',
                'excerpt' => 'Discover how to leverage Tailwind CSS, Alpine.js, Laravel, and Livewire to build a high-performance, SEO-friendly blog with a sleek dark mode design.',
                'category' => 'Development',
                'date' => 'Oct 24, 2024',
                'read_time' => '8 min',
                'views' => '1,234',
                'word_count' => '1,500'
            ],
            [
                'title' => 'The Future of Web Design: Neon & Glassmorphism',
                'subtitle' => 'Why these trends are making a comeback.',
                'excerpt' => 'Exploring the resurgence of neon aesthetics combined with glassmorphism to create immersive user experiences in web applications.',
                'category' => 'Design',
                'date' => 'Oct 20, 2024',
                'read_time' => '5 min',
                'views' => '856',
                'word_count' => '950'
            ],
            [
                'title' => 'Optimizing Laravel for High Scale',
                'subtitle' => 'Performance tuning techniques for enterprise apps.',
                'excerpt' => 'Tips and tricks for scaling Laravel applications using Octane, caching strategies, and efficient database queries.',
                'category' => 'Backend',
                'date' => 'Oct 15, 2024',
                'read_time' => '12 min',
                'views' => '2,100',
                'word_count' => '2,200'
            ],
             [
                'title' => 'Why I Switched to Instrument Sans',
                'subtitle' => 'The impact of typography on developer experience.',
                'excerpt' => 'Typography plays a crucial role in readability and aesthetics. Here is why Instrument Sans is my new go-to font for technical blogs.',
                'category' => 'Typography',
                'date' => 'Oct 10, 2024',
                'read_time' => '4 min',
                'views' => '543',
                'word_count' => '600'
            ],
        ]);

        return view('livewire.home', [
            'posts' => $posts
        ]);
    }
}
