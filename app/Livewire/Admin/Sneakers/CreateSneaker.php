<?php

namespace App\Livewire\Admin\Sneakers;

use App\Models\Sneaker;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CreateSneaker extends Component
{
    #[Rule('required|min:3')]
    public $name = '';

    public function save()
    {
        $this->validate();

        Sneaker::create(
            $this->only(['name'])
        );

        return $this->redirect('/admin/sneakers');
            //->with('status', 'Post successfully created.');
    }

    public function render()
    {
        return view('livewire.admin.sneakers.create-sneaker');
    }
}
