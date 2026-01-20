<div>

    <div class="grid gap-6 grid-cols-1">
        @forelse($posts as $post)
            <x-post-card :post="$post" />
        @empty
            <div class="glass-panel rounded-xl p-8 text-center">
                <svg class="w-16 h-16 mx-auto text-sf-text-muted mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                </svg>
                <h3 class="text-xl font-semibold text-sf-text mb-2">No Posts Yet</h3>
                <p class="text-sf-text-muted">Check back soon for new content!</p>
            </div>
        @endforelse
    </div>
    
    @if($posts->hasPages())
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    @endif
</div>
