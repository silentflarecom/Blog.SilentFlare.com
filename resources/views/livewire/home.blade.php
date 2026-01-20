<div>
    <div class="mb-8 pl-1">
    </div>

    <div class="grid gap-6 grid-cols-1">
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
