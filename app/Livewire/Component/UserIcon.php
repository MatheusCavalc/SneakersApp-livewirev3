<?php

namespace App\Livewire\Component;

use Livewire\Component;

class UserIcon extends Component
{
    public function render()
    {
        return view('livewire.component.user-icon', [
            'user' => auth()->user()
        ]);
    }
}
