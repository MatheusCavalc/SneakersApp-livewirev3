<?php

namespace App\Livewire\App;

use App\Models\Sneaker;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class SearchView extends Component
{
    public $search = '';

    public $sneakers = '';

    public function mount($search)
    {
        $this->search = $search;
    }

    #[Layout('layouts.main')]
    #[Title('Home')]
    public function render()
    {
        $this->sneakers = Sneaker::query()
            ->where('name', 'LIKE', "%{$this->search}%")
            ->get();

        return view('livewire.app.search-view');
    }
}
