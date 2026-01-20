<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostDetail extends Component
{
    public Post $post;

    public function mount(Post $post)
    {
        // Only show published posts on frontend
        if (!$post->is_published) {
            abort(404);
        }

        $this->post = $post;
        
        // Increment view count
        $post->incrementViews();
    }

    public function render()
    {
        $relatedPosts = Post::with('category')
            ->published()
            ->where('id', '!=', $this->post->id)
            ->where(function ($query) {
                $query->where('category_id', $this->post->category_id)
                    ->orWhereHas('tags', function ($q) {
                        $q->whereIn('tags.id', $this->post->tags->pluck('id'));
                    });
            })
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('livewire.post-detail', [
            'relatedPosts' => $relatedPosts
        ]);
    }
}
