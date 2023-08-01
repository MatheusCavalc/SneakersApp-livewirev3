<?php

namespace App\Livewire\Admin\Sneakers;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Sneaker;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class IndexSneaker extends Component
{
    public function delete(Sneaker $sneaker)
    {
        Storage::delete($sneaker->image);
        $sneaker->delete();

        $this->js(<<<'JS'
            swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
            });
        JS);
    }

    #[Layout('layouts.admin')]
    #[Title('Admin - Sneakers')]
    public function render()
    {
        return view('livewire.admin.sneakers.index-sneaker')->with([
            'sneakers' => Sneaker::all(),
        ]);
    }
}
