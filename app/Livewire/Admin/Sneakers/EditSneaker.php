<?php

namespace App\Livewire\Admin\Sneakers;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;
use App\Models\Sneaker;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Str;

class EditSneaker extends Component
{
    use WithFileUploads;

    public Sneaker $sneaker;

    #[Rule('')]
    public $published = '';

    #[Rule('required')]
    public $brand_id = '';

    #[Rule('required')] // 1MB Max
    public $image;

    #[Rule('required')]
    public $slug = '';

    #[Rule('required')]
    public $name = '';

    #[Rule('required')]
    public $price = '';

    //#[Rule('required')]
    public $promotion_price = '';

    //#[Rule('required')]
    public $in_promotion = '';

    #[Rule('required')]
    public $color = '';

    #[Rule('required')]
    public $sizes = [];

    public function mount($id)
    {
        $this->sneaker = Sneaker::findOrFail($id);

        $this->published = $this->sneaker->published;
        $this->brand_id = $this->sneaker->brand_id;
        $this->image = $this->sneaker->image;
        $this->name = $this->sneaker->name;
        $this->price = $this->sneaker->price;
        $this->promotion_price = $this->sneaker->promotion_price;
        $this->in_promotion = $this->sneaker->in_promotion;
        $this->color = $this->sneaker->color;
        $this->sizes = $this->sneaker->sizes;
    }

    public function save()
    {
        $this->slug = Str::slug($this->name);

        $this->validate();

        $image = $this->sneaker->image;

        if (is_string($this->image)) {
            Sneaker::findOrFail($this->sneaker->id)->update($this->all());
            return $this->redirect('/admin/sneakers');
        } else {
            $this->image = $this->image->store('public/sneakers');
            Storage::delete($image);
            Sneaker::findOrFail($this->sneaker->id)->update($this->all());
            return $this->redirect('/admin/sneakers');
        }
    }

    #[Layout('layouts.admin')]
    #[Title('Admin - Edit Sneaker')]
    public function render()
    {
        return view('livewire.admin.sneakers.edit-sneaker');
    }
}
