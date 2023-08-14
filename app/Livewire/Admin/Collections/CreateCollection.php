<?php

namespace App\Livewire\Admin\Collections;

use App\Models\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCollection extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public $name;

    #[Rule('required')]
    public $brand_id;

    #[Rule('required')]
    public $image;

    #[Rule('required')]
    public $description;

    public function save()
    {
        $this->validate();

        Collection::create([
            'name' => $this->name,
            'brand_id' => $this->brand_id,
            'image' => $this->image->store('public/collections'),
            'description' => $this->description
        ]);

        return $this->redirect('/admin/collections');
        //->with('status', 'Post successfully created.');
    }

    #[Layout('layouts.admin')]
    #[Title('Admin - Create Collection')]
    public function render()
    {
        return view('livewire.admin.collections.create-collection');
    }
}
