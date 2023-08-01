<?php

namespace App\Livewire\Admin\Sneakers;

use App\Models\Sneaker;
use Livewire\Component;

class IndexSneaker extends Component
{
    public function delete(Sneaker $sneaker)
    {
        $sneaker->delete();

        $this->js(<<<'JS'
            swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
            });
        JS);
    }

    public function render()
    {
        return view('livewire.admin.sneakers.index-sneaker')->with([
            'sneakers' => Sneaker::all(),
        ]);
    }
}
