<?php

namespace App\Livewire\Component\Navbar;

use App\Models\Sneaker;
use Livewire\Component;

class HomeItem extends Component
{
    public function render()
    {
        return view('livewire.component.navbar.home-item', [
            'sneakers' => Sneaker::all(),
        ]);
    }
}
