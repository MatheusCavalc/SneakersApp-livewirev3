<?php

namespace App\Livewire\Component;

use App\Models\Sneaker;
use Livewire\Component;

class SneakersHorizontalList extends Component
{
    public function render()
    {
        return view('livewire.component.sneakers-horizontal-list', [
            'sneakersNike' => Sneaker::all(),
        ]);
    }
}
