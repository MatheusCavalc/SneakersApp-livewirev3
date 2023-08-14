<?php

namespace App\Livewire\Admin\Collections;

use App\Models\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class IndexCollection extends Component
{
    public function delete(Collection $collection)
    {
        Storage::delete($collection->image);
        $collection->delete();

        $this->js(<<<'JS'
            swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
            });
        JS);
    }

    #[Layout('layouts.admin')]
    #[Title('Admin - Collections')]
    public function render()
    {
        return view('livewire.admin.collections.index-collection', [
            'collections' => Collection::all(),
        ]);
    }
}
