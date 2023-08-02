<?php

namespace App\Livewire\App;

use App\Models\Sneaker;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    public function per($sneaker)
    {
        $per = (((float)$sneaker->price - (float)$sneaker->promotion_price) / (float)$sneaker->price) * 100;
        return (int)$per;
    }

    #[Layout('layouts.main')]
    #[Title('Home')]
    public function render()
    {
        return view('livewire.app.index', [
            'sneakersNike' => Sneaker::all(),
            'sneakersAirJordan' => [],
            'sneakersAdidas' => [],
        ]);
    }
}
