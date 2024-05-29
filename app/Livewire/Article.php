<?php

namespace App\Livewire;

use App\Models\MarkdownPost;
use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Article extends Component
{
    public MarkdownPost $post;

    public function mount(string $year, string $month, string $day, string $slug): void
    {
        $this->post = MarkdownPost::findByDateAndSlug($year, $month, $day, $slug);
    }

    public function render(): Application|Factory|View|ApplicationContract
    {
        $this->loadDisqus();

        return view('livewire.article');
    }

    private function loadDisqus(): void
    {
        $this->dispatch('load-disqus', [
            'url' => request()?->url(),
            'identifier' => $this->post->id,
        ]);
    }

    public function getTitle(): string
    {
        return $this->post->title.config('metadata.subtitle');
    }
}
