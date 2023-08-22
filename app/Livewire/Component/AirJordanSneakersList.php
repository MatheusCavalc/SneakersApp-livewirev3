<?php

namespace App\Livewire\Component;

use App\Models\Sneaker;
use Livewire\Component;

class AirJordanSneakersList extends Component
{
    public function render()
    {
        return view('livewire.component.air-jordan-sneakers-list', [
            'sneakersNike' => Sneaker::all(),
        ]);
    }
}
