<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class CreateBrand extends Component
{
    use WithFileUploads;

    #[Rule('image')] // 1MB Max
    public $logo;

    #[Rule('required')]
    public $name = '';

    public function save()
    {
        $this->validate();

        Brand::create([
            'logo' => $this->logo->store('public/brands'),
            'name' => $this->name,
        ]);

        return $this->redirect('/admin/brands');
        //->with('status', 'Post successfully created.');
    }

    #[Layout('layouts.admin')]
    #[Title('Admin - Create Brand')]
    public function render()
    {
        return view('livewire.admin.brands.create-brand');
    }
}
