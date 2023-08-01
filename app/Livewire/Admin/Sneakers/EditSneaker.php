<?php

namespace App\Livewire\Admin\Sneakers;

use Livewire\Attributes\Rule;
use App\Models\Sneaker;
use Livewire\Component;

class EditSneaker extends Component
{
    public $sneaker;

    #[Rule('required|min:5')]
    public $name;

    public function mount($sneaker = null)
    {
        $this->sneaker = $sneaker;

        $this->name = $sneaker->name;
    }

    public function save()
    {
        $this->validate();

        Sneaker::findOrFail($this->sneaker->id)->update($this->all());

        return $this->redirect('/admin/sneakers');
    }

    public function render()
    {
        return view('livewire.admin.sneakers.edit-sneaker');
    }
}
