<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Menu extends Component
{
    public bool $opened = false;

    public function toggleMenu(): void
    {
        $this->opened = !$this->opened;
    }

    public function render(): View
    {
        return view('livewire.menu');
    }
}
