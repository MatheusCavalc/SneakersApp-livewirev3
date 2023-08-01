<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Rule;
use Livewire\Component;

class EditBrand extends Component
{
    public Brand $brand;

    #[Rule('required')]
    public $logo;

    #[Rule('required')]
    public $name;

    public function mount($id)
    {
        $this->brand = Brand::findOrFail($id);

        $this->logo = $this->brand->logo;

        $this->name = $this->brand->name;
    }

    public function save()
    {
        $this->validate();

        $image = $this->brand->logo;

        if (is_string($this->logo)) {
            Brand::findOrFail($this->brand->id)->update($this->all());
            return $this->redirect('/admin/brands');
        } else {
            $this->logo = $this->logo->store('brands');
            Storage::delete($image);
            brand::findOrFail($this->brand->id)->update($this->all());
            return $this->redirect('/admin/brands');
        }
    }

    #[Layout('layouts.admin')]
    #[Title('Admin - Edit Brand')]
    public function render()
    {
        return view('livewire.admin.brands.edit-brand');
    }
}
