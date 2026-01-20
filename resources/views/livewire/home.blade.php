<div>
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-sf-text mb-2 neon-text">Latest Articles</h1>
        <p class="text-sf-text-muted">Thoughts, tutorials, and insights on development and design.</p>
    </div>

    <div class="grid gap-6 md:grid-cols-2">
        @foreach($posts as $post)
            <x-post-card :post="$post" />
        @endforeach
    </div>
    
    <div class="mt-8 text-center">
        <button class="px-6 py-3 border border-sf-accent text-sf-accent rounded-lg hover:bg-sf-accent hover:text-sf-bg transition duration-300 font-medium hover-glow">
            Load More Posts
        </button>
    </div>
</div>
