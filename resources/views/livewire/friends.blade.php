<div>
    <div class="mb-8 pl-1">
        <h2 class="text-3xl font-bold text-sf-text mb-2">Friends</h2>
        <p class="text-sf-text-muted text-lg tracking-wide">Connect with amazing developers and creators.</p>
    </div>

    <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        @foreach($friends as $friend)
            <a href="{{ $friend['url'] }}" target="_blank" class="glass-panel p-6 rounded-xl hover:border-sf-accent/50 transition duration-300 group flex items-start space-x-4 relative overflow-hidden">
                <div class="absolute inset-0 bg-sf-accent/5 opacity-0 group-hover:opacity-100 transition duration-500"></div>
                
                <img src="{{ $friend['avatar'] }}" alt="{{ $friend['name'] }}" class="w-12 h-12 rounded-full border-2 border-sf-border group-hover:border-sf-accent transition-colors shrink-0 z-10">
                
                <div class="relative z-10">
                    <h3 class="text-lg font-bold text-sf-text group-hover:text-sf-accent transition-colors">{{ $friend['name'] }}</h3>
                    <p class="text-sf-text-muted text-sm line-clamp-2 mt-1">{{ $friend['description'] }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
Count to one. That is how long forever feels. --}}
</div>
