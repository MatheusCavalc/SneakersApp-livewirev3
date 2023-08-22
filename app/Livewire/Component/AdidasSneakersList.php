<?php

namespace App\Livewire\Component;

use App\Models\Sneaker;
use Livewire\Component;

class AdidasSneakersList extends Component
{
    public function render()
    {
        return view('livewire.component.adidas-sneakers-list', [
            'sneakersNike' => Sneaker::all(),
        ]);
    }
}
