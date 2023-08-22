<?php

namespace App\Livewire\Component\Navbar;

use App\Models\Sneaker;
use Livewire\Component;

class TrendingsItem extends Component
{
    public function render()
    {
        return view('livewire.component.navbar.trendings-item', [
            'sneakers' => Sneaker::where('in_promotion', true)->orderBy('id', 'desc')->take(2)->get(),
        ]);
    }
}
