<?php

namespace App\Livewire\App;

use App\Models\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CollectionsView extends Component
{
    #[Layout('layouts.main')]
    #[Title('Home')]
    public function render()
    {
        return view('livewire.app.collections-view', [
            'collections' => Collection::all()
        ]);
    }
}
