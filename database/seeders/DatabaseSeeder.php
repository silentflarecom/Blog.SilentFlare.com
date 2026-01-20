<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\FriendLink;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::firstOrCreate(
            ['email' => 'admin@silentflare.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        // Create categories
        $categories = [
            ['name' => 'Development', 'slug' => 'development', 'description' => 'Coding, software architecture, and best practices.', 'color' => '#00f0ff'],
            ['name' => 'Design', 'slug' => 'design', 'description' => 'UI/UX trends, color theory, and visual aesthetics.', 'color' => '#bc13fe'],
            ['name' => 'Backend', 'slug' => 'backend', 'description' => 'Server-side logic, databases, and APIs.', 'color' => '#22c55e'],
            ['name' => 'Frontend', 'slug' => 'frontend', 'description' => 'HTML, CSS, JavaScript, and modern frameworks.', 'color' => '#f59e0b'],
            ['name' => 'DevOps', 'slug' => 'devops', 'description' => 'CI/CD, deployment pipelines, and server management.', 'color' => '#ef4444'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['slug' => $category['slug']], $category);
        }

        // Create tags
        $tags = ['Laravel', 'PHP', 'JavaScript', 'TailwindCSS', 'Livewire', 'Vue.js', 'React', 'Docker', 'Git', 'MySQL'];
        foreach ($tags as $tagName) {
            Tag::firstOrCreate(['slug' => \Illuminate\Support\Str::slug($tagName)], [
                'name' => $tagName,
                'slug' => \Illuminate\Support\Str::slug($tagName),
            ]);
        }

        // Create sample posts
        $posts = [
            [
                'title' => 'Building a Modern Blog with TALL Stack',
                'subtitle' => 'A comprehensive guide to full-stack development.',
                'content' => '<p>Discover how to leverage Tailwind CSS, Alpine.js, Laravel, and Livewire to build a high-performance, SEO-friendly blog with a sleek dark mode design.</p><h2>Why TALL Stack?</h2><p>The TALL Stack combines the best of Laravel\'s backend capabilities with modern frontend tools. It gives you the power of a full-stack framework without the complexity of a separate SPA.</p><h2>Getting Started</h2><p>First, you\'ll need to set up a new Laravel project and install the required dependencies...</p>',
                'excerpt' => 'Discover how to leverage Tailwind CSS, Alpine.js, Laravel, and Livewire to build a high-performance, SEO-friendly blog.',
                'category' => 'development',
                'tags' => ['Laravel', 'TailwindCSS', 'Livewire'],
                'is_published' => true,
                'is_featured' => true,
                'views' => 1234,
            ],
            [
                'title' => 'The Future of Web Design: Neon & Glassmorphism',
                'subtitle' => 'Why these trends are making a comeback.',
                'content' => '<p>Exploring the resurgence of neon aesthetics combined with glassmorphism to create immersive user experiences in web applications.</p><h2>The Neon Renaissance</h2><p>Neon colors and glowing effects are making a strong comeback in modern web design. Combined with dark backgrounds, they create a futuristic and engaging aesthetic.</p>',
                'excerpt' => 'Exploring the resurgence of neon aesthetics combined with glassmorphism to create immersive user experiences.',
                'category' => 'design',
                'tags' => ['TailwindCSS'],
                'is_published' => true,
                'views' => 856,
            ],
            [
                'title' => 'Optimizing Laravel for High Scale',
                'subtitle' => 'Performance tuning techniques for enterprise apps.',
                'content' => '<p>Tips and tricks for scaling Laravel applications using Octane, caching strategies, and efficient database queries.</p><h2>Laravel Octane</h2><p>Laravel Octane supercharges your application by serving it using high-powered servers like FrankenPHP, Swoole, or RoadRunner.</p>',
                'excerpt' => 'Tips and tricks for scaling Laravel applications using Octane, caching strategies, and efficient database queries.',
                'category' => 'backend',
                'tags' => ['Laravel', 'PHP'],
                'is_published' => true,
                'is_featured' => true,
                'views' => 2100,
            ],
            [
                'title' => 'Why I Switched to Instrument Sans',
                'subtitle' => 'The impact of typography on developer experience.',
                'content' => '<p>Typography plays a crucial role in readability and aesthetics. Here is why Instrument Sans is my new go-to font for technical blogs.</p><h2>Readability First</h2><p>When building a blog focused on technical content, readability should be your top priority.</p>',
                'excerpt' => 'Typography plays a crucial role in readability and aesthetics. Here is why Instrument Sans is my new go-to font.',
                'category' => 'design',
                'tags' => [],
                'is_published' => true,
                'views' => 543,
            ],
        ];

        foreach ($posts as $postData) {
            $category = Category::where('slug', $postData['category'])->first();
            $tagNames = $postData['tags'];
            unset($postData['category'], $postData['tags']);
            
            $post = Post::firstOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($postData['title'])],
                array_merge($postData, [
                    'slug' => \Illuminate\Support\Str::slug($postData['title']),
                    'category_id' => $category?->id,
                    'published_at' => now()->subDays(rand(1, 30)),
                ])
            );

            // Attach tags
            $tagIds = Tag::whereIn('name', $tagNames)->pluck('id');
            $post->tags()->sync($tagIds);
        }

        // Create friend links
        $friends = [
            ['name' => 'Alice Dev', 'url' => 'https://example.com/alice', 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Alice', 'description' => 'Full Stack Developer focused on Vue.js.', 'order' => 1],
            ['name' => 'Bob Design', 'url' => 'https://example.com/bob', 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Bob', 'description' => 'UI/UX Designer and Illustrator.', 'order' => 2],
            ['name' => 'Charlie Ops', 'url' => 'https://example.com/charlie', 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Charlie', 'description' => 'DevOps Engineer and Cloud Architect.', 'order' => 3],
        ];

        foreach ($friends as $friend) {
            FriendLink::firstOrCreate(['url' => $friend['url']], $friend);
        }
    }
}
