@props(['post'])

<article class="glass-panel rounded-xl overflow-hidden hover:border-sf-accent/50 transition duration-300 group flex flex-col md:flex-row h-full">
    <!-- Left: Image -->
    <div class="relative w-full md:w-1/3 h-48 md:h-auto overflow-hidden shrink-0">
        <img src="{{ $post['image'] ?? 'https://picsum.photos/seed/'.rand(1,100).'/800/600' }}" alt="{{ $post['title'] }}" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
        <div class="absolute inset-0 bg-gradient-to-r from-transparent to-sf-card/50 opacity-0 md:opacity-100"></div>
        <span class="absolute top-4 left-4 bg-sf-accent/10 border border-sf-accent text-sf-accent text-xs px-2 py-1 rounded backdrop-blur-sm z-10">
            {{ $post['category'] ?? 'Uncategorized' }}
        </span>
    </div>
    
    <!-- Right: Content -->
    <div class="p-6 flex flex-col flex-grow relative">
        <!-- Background Bloom -->
        <div class="absolute -right-10 -top-10 w-32 h-32 bg-sf-accent/5 rounded-full blur-3xl group-hover:bg-sf-accent/10 transition duration-500"></div>

        <div class="relative z-10 flex flex-col h-full">
            <h2 class="text-2xl font-bold text-sf-text mb-1 group-hover:text-sf-accent transition-colors line-clamp-1">
                <a href="#">{{ $post['title'] }}</a>
            </h2>
            <h3 class="text-sm text-sf-text-muted mb-3 font-medium">{{ $post['subtitle'] ?? '' }}</h3>
            
            <!-- Metadata Row -->
            <div class="flex flex-wrap items-center gap-4 text-xs text-sf-text-muted mb-4 border-b border-sf-border/50 pb-3 font-mono">
                <div class="flex items-center space-x-1">
                    <svg class="w-3 h-3 text-sf-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    <span>{{ $post['views'] ?? 0 }} Views</span>
                </div>
                <div class="flex items-center space-x-1">
                    <svg class="w-3 h-3 text-sf-accent-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>{{ $post['word_count'] ?? 0 }} Words</span>
                </div>
                <div class="flex items-center space-x-1">
                    <svg class="w-3 h-3 text-sf-success" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>{{ $post['read_time'] ?? '0 min' }} read</span>
                </div>
                <div class="flex items-center space-x-1 ml-auto">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>{{ $post['date'] ?? '' }}</span>
                </div>
            </div>
            
            <p class="text-sf-text-muted text-sm mb-4 line-clamp-2 md:line-clamp-3 flex-grow">
                {{ $post['excerpt'] }}
            </p>
        </div>
    </div>
</article>
