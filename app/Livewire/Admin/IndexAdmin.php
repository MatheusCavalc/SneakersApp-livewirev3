<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class IndexAdmin extends Component
{
    #[Layout('layouts.admin')]
    #[Title('Admin')]
    public function render()
    {
        return view('livewire.admin.index-admin');
    }
}
