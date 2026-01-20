<div>
    <article class="glass-panel rounded-xl p-8">
        <!-- Header -->
        <header class="mb-8">
            @if($post->category)
                <a href="{{ route('categories') }}" class="inline-block bg-sf-accent/10 border border-sf-accent text-sf-accent text-sm px-3 py-1 rounded-full mb-4 hover:bg-sf-accent hover:text-sf-bg transition">
                    {{ $post->category->name }}
                </a>
            @endif
            
            <h1 class="text-4xl font-bold text-sf-text mb-2">{{ $post->title }}</h1>
            
            @if($post->subtitle)
                <h2 class="text-xl text-sf-text-muted mb-4">{{ $post->subtitle }}</h2>
            @endif

            <!-- Meta -->
            <div class="flex flex-wrap items-center gap-4 text-sm text-sf-text-muted border-b border-sf-border pb-6 font-mono">
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>{{ $post->published_at->format('M d, Y') }}</span>
                </div>
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-sf-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    <span>{{ $post->formatted_views }} views</span>
                </div>
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-sf-success" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>{{ $post->formatted_read_time }} read</span>
                </div>
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-sf-accent-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <span>{{ $post->formatted_word_count }} words</span>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        @if($post->featured_image)
            <div class="mb-8 rounded-lg overflow-hidden">
                <img src="{{ Storage::url($post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-auto">
            </div>
        @endif

        <!-- Content -->
        <div class="prose prose-invert prose-lg max-w-none 
            prose-headings:text-sf-text prose-headings:font-bold
            prose-p:text-sf-text-muted prose-p:leading-relaxed
            prose-a:text-sf-accent prose-a:no-underline hover:prose-a:underline
            prose-strong:text-sf-text
            prose-code:text-sf-accent prose-code:bg-sf-card prose-code:px-2 prose-code:py-1 prose-code:rounded
            prose-pre:bg-sf-card prose-pre:border prose-pre:border-sf-border
            prose-blockquote:border-sf-accent prose-blockquote:text-sf-text-muted
            prose-li:text-sf-text-muted">
            {!! $post->content !!}
        </div>

        <!-- Tags -->
        @if($post->tags->count())
            <div class="mt-8 pt-6 border-t border-sf-border">
                <div class="flex flex-wrap gap-2">
                    @foreach($post->tags as $tag)
                        <span class="bg-sf-card border border-sf-border text-sf-text-muted text-sm px-3 py-1 rounded-full hover:border-sf-accent hover:text-sf-accent transition">
                            #{{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif
    </article>

    <!-- Related Posts -->
    @if($relatedPosts->count())
        <section class="mt-12">
            <h3 class="text-2xl font-bold text-sf-text mb-6">Related Posts</h3>
            <div class="grid gap-6 grid-cols-1 md:grid-cols-3">
                @foreach($relatedPosts as $relatedPost)
                    <a href="{{ route('post.show', $relatedPost) }}" class="glass-panel rounded-xl p-4 hover:border-sf-accent/50 transition group">
                        <h4 class="text-lg font-semibold text-sf-text group-hover:text-sf-accent transition line-clamp-2 mb-2">
                            {{ $relatedPost->title }}
                        </h4>
                        <p class="text-sm text-sf-text-muted line-clamp-2">{{ $relatedPost->excerpt }}</p>
                        <div class="text-xs text-sf-text-muted mt-3">
                            {{ $relatedPost->published_at->format('M d, Y') }}
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    <!-- Back to Home -->
    <div class="mt-8">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sf-accent hover:underline">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to all posts
        </a>
    </div>
</div>
