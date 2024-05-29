<?php

namespace App\Livewire;

use App\Models\MarkdownPost;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use TheBatClaudio\EloquentMarkdown\Support\MarkdownCollection;

/**
 * @property MarkdownCollection $posts
 */
class Blog extends Component
{
    use WithPagination;

    private const int POSTS_PER_PAGE = 5;

    public int $currentPostsViewed = 5;

    public bool $postsEnded = false;

    private MarkdownCollection $allPosts;

    public function __construct()
    {
        $this->allPosts = MarkdownPost::all();
    }

    public function render(): View
    {
        return view('livewire.blog');
    }

    #[Computed]
    public function posts(): MarkdownCollection|LengthAwarePaginator
    {
        return $this->allPosts->take($this->currentPostsViewed);
    }

    public function loadMore(): void
    {
        if ($this->posts->count() < $this->currentPostsViewed) {
            $this->postsEnded = true;

            return;
        }

        $this->currentPostsViewed += self::POSTS_PER_PAGE;
    }
}
