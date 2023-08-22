<?php

namespace App\Livewire\Component;

use App\Models\Collection;
use Livewire\Component;

class CollectionsHome extends Component
{
    public function render()
    {
        return view('livewire.component.collections-home', [
            'collections' => Collection::all()
        ]);
    }
}
