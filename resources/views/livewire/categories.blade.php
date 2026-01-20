<div>
    <div class="mb-8 pl-1">
        <h2 class="text-3xl font-bold text-sf-text mb-2">Categories</h2>
        <p class="text-sf-text-muted text-lg tracking-wide">Explore articles by topic.</p>
    </div>

    <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach($categories as $category)
            <a href="#" class="glass-panel p-6 rounded-xl hover:border-sf-accent/50 transition duration-300 group relative overflow-hidden block">
                <div class="absolute -right-6 -top-6 w-24 h-24 bg-sf-accent/5 rounded-full blur-2xl group-hover:bg-sf-accent/10 transition duration-500"></div>
                
                <h3 class="text-xl font-bold text-sf-text group-hover:text-sf-accent transition-colors mb-2">
                    {{ $category['name'] }}
                </h3>
                <p class="text-sf-text-muted text-sm mb-4 line-clamp-2">
                    {{ $category['description'] }}
                </p>
                
                <div class="flex items-center justify-between mt-auto pt-4 border-t border-sf-border/30">
                    <span class="text-xs font-mono text-sf-text-muted">{{ $category['count'] }} Articles</span>
                    <svg class="w-4 h-4 text-sf-accent group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </div>
            </a>
        @endforeach
    </div>
</div>
