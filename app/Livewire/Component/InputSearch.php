<?php

namespace App\Livewire\Component;

use App\Models\Sneaker;
use Livewire\Component;

class InputSearch extends Component
{
    public $search = '';

    public function searchSneakers()
    {
        return $this->redirect('/search/sneaker' . '/' . $this->search);
        //return $this->redirect('/search/sneaker' . '/' . $this->search, navigate: true);
    }

    public function render()
    {
        $results = [];

        if (strlen($this->search) >= 1) {
            $results = Sneaker::where('name', 'LIKE', "%{$this->search}%")->limit(5)->get();
        }

        return view('livewire.component.input-search', [
            'sneakers' => $results,
        ]);
    }
}
