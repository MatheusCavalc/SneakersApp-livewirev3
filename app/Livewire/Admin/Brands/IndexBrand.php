<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class IndexBrand extends Component
{
    public function delete(Brand $brand)
    {
        Storage::delete($brand->logo);
        $brand->delete();

        $this->js(<<<'JS'
            swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
            });
        JS);
    }

    #[Layout('layouts.admin')]
    #[Title('Admin - Brands')]
    public function render()
    {
        return view('livewire.admin.brands.index-brand')->with([
            'brands' => Brand::all(),
        ]);
    }
}
