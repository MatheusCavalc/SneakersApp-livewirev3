<?php

namespace App\Livewire\Admin\Collections;

use App\Models\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditCollection extends Component
{
    public Collection $collection;

    #[Rule('required')]
    public $name;

    #[Rule('required')]
    public $brand_id;

    #[Rule('required')]
    public $image;

    #[Rule('required')]
    public $description;

    public function mount($id)
    {
        $this->collection = Collection::findOrFail($id);

        $this->name = $this->collection->name;
        $this->brand_id = $this->collection->brand_id;
        $this->image = $this->collection->image;
        $this->description = $this->collection->description;
    }

    public function save()
    {
        $this->validate();

        $image = $this->collection->image;

        if (is_string($this->image)) {
            Collection::findOrFail($this->collection->id)->update($this->all());
            return $this->redirect('/admin/collections');
        } else {
            $this->image = $this->logo->store('public/brands');
            Storage::delete($image);
            Collection::findOrFail($this->collection->id)->update($this->all());
            return $this->redirect('/admin/collections');
        }
    }

    #[Layout('layouts.admin')]
    #[Title('Admin - Edit Collection')]
    public function render()
    {
        return view('livewire.admin.collections.edit-collection');
    }
}
