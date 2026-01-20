@props(['post'])

<article class="glass-panel rounded-xl overflow-hidden hover:border-sf-accent/50 transition duration-300 group h-full flex flex-col">
    <div class="relative h-48 overflow-hidden">
        <img src="{{ $post['image'] ?? 'https://picsum.photos/seed/'.rand(1,100).'/800/400' }}" alt="{{ $post['title'] }}" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
        <div class="absolute inset-0 bg-gradient-to-t from-sf-card to-transparent opacity-60"></div>
        <span class="absolute top-4 left-4 bg-sf-accent/10 border border-sf-accent text-sf-accent text-xs px-2 py-1 rounded backdrop-blur-sm">
            {{ $post['category'] ?? 'Uncategorized' }}
        </span>
    </div>
    
    <div class="p-6 flex flex-col flex-grow">
        <div class="flex items-center text-xs text-sf-text-muted mb-3 space-x-2">
            <span>{{ $post['date'] ?? now()->format('M d, Y') }}</span>
            <span>&bull;</span>
            <span>{{ $post['read_time'] ?? '5 min' }} read</span>
        </div>
        
        <h2 class="text-xl font-bold text-sf-text mb-3 group-hover:text-sf-accent transition-colors line-clamp-2">
            <a href="#">{{ $post['title'] }}</a>
        </h2>
        
        <p class="text-sf-text-muted text-sm mb-4 line-clamp-3 flex-grow">
            {{ $post['excerpt'] }}
        </p>
        
        <div class="mt-auto flex items-center justify-between pt-4 border-t border-sf-border/50">
            <a href="#" class="inline-flex items-center text-sf-accent hover:text-sf-accent-secondary transition-colors text-sm font-medium">
                Read Article
                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
            <div class="flex items-center space-x-2 text-sf-text-muted text-xs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                <span>{{ rand(50, 500) }}</span>
            </div>
        </div>
    </div>
</article>
