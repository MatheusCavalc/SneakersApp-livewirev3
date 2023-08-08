<?php

namespace App\Livewire\App;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class OrdersView extends Component
{
    #[Layout('layouts.main')]
    #[Title('Home')]
    public function render()
    {
        $orders = auth()->user()->my_orders;

        return view('livewire.app.orders-view', compact('orders'));
    }
}
