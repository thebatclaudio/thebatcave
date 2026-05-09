<?php

namespace App\Livewire;

use App\Models\MarkdownPost;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Homepage extends Component
{
    public function render(): View
    {
        return view('livewire.homepage');
    }

    #[Computed]
    public function latestPost(): ?MarkdownPost
    {
        return MarkdownPost::all()
            ->sortByDesc('date')
            ->first();
    }
}
