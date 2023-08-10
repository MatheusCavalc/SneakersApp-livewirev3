<?php

namespace App\Livewire\Admin\Orders;

use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class IndexOrder extends Component
{
    #[Layout('layouts.admin')]
    #[Title('Admin - Brands')]
    public function render()
    {
        return view('livewire.admin.orders.index-order', [
            'orders' => Order::all(),
        ]);
    }
}
