<div>
    <div class="mb-8 pl-1">
        <h2 class="text-3xl font-bold text-sf-text mb-2">Archives</h2>
        <p class="text-sf-text-muted text-lg tracking-wide">A timeline of my writing journey.</p>
    </div>

    <div class="space-y-8 relative pl-8 border-l border-sf-border/30">
        @foreach($archives as $year => $months)
            <div class="relative">
                <span class="absolute -left-[39px] top-0 flex items-center justify-center w-5 h-5 rounded-full bg-sf-bg border border-sf-accent text-sf-accent text-[10px] shadow-[0_0_10px_rgba(0,240,255,0.3)]">
                    <div class="w-2 h-2 rounded-full bg-sf-accent"></div>
                </span>
                
                <h3 class="text-2xl font-bold text-sf-text mb-6 mt-[-6px]">{{ $year }}</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($months as $month => $count)
                        <a href="#" class="glass-panel p-4 rounded-lg hover:bg-sf-card/80 transition flex items-center justify-between group">
                            <span class="text-sf-text font-medium group-hover:text-sf-accent transition-colors">{{ $month }}</span>
                            <div class="flex items-center space-x-3">
                                <span class="text-sm text-sf-text-muted">{{ $count }} Posts</span>
                                <svg class="w-4 h-4 text-sf-text-muted group-hover:text-sf-accent transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
