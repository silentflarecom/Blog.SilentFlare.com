<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'content',
        'excerpt',
        'category_id',
        'featured_image',
        'is_featured',
        'is_published',
        'published_at',
        'views',
        'word_count',
        'read_time',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'views' => 'integer',
        'word_count' => 'integer',
        'read_time' => 'integer',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($post) {
            // Auto-generate slug from title if not set
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }

            // Calculate word count and read time from content
            if ($post->isDirty('content')) {
                $wordCount = str_word_count(strip_tags($post->content));
                $post->word_count = $wordCount;
                $post->read_time = max(1, (int) ceil($wordCount / 200)); // ~200 words per minute
            }
        });
    }

    /**
     * Get the category that owns the post.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the tags for the post.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    /**
     * Scope a query to only include published posts.
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    /**
     * Scope a query to only include featured posts.
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    /**
     * Increment the view count.
     */
    public function incrementViews(): void
    {
        $this->increment('views');
    }

    /**
     * Get the route key name for Laravel model binding.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get formatted read time.
     */
    public function getFormattedReadTimeAttribute(): string
    {
        return $this->read_time . ' min';
    }

    /**
     * Get formatted view count.
     */
    public function getFormattedViewsAttribute(): string
    {
        return number_format($this->views);
    }

    /**
     * Get formatted word count.
     */
    public function getFormattedWordCountAttribute(): string
    {
        return number_format($this->word_count);
    }
}
