<?php

namespace App\Livewire\Admin\Sneakers;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Sneaker;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class CreateSneaker extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public $brand_id = '';

    #[Rule('image')] // 1MB Max
    public $image;

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

    public function save()
    {
        $this->validate();

        Sneaker::create([
            'brand_id' => $this->brand_id,
            'image' => $this->image->store('public/sneakers'),
            'name' => $this->name,
            'price' => $this->price,
            'promotion_price' => $this->promotion_price,
            'in_promotion' => $this->in_promotion == '' ? false : $this->in_promotion,
            'color' => $this->color,
            'sizes' => $this->sizes,
        ]);

        return $this->redirect('/admin/sneakers');
        //->with('status', 'Post successfully created.');
    }

    #[Layout('layouts.admin')]
    #[Title('Admin - Create Sneaker')]
    public function render()
    {
        return view('livewire.admin.sneakers.create-sneaker');
    }
}
