<?php

namespace App\Livewire\Admin\Orders;

use App\Enums\ShippingStatus;
use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ShowOrder extends Component
{
    public Order $order;

    public function mount($id)
    {
        $this->order = Order::findOrFail($id);
    }

    public function toPending()
    {
        $this->order->update([
            'status_shipping' => ShippingStatus::Pending,
        ]);
    }

    public function toOnShipping()
    {
        $this->order->update([
            'status_shipping' => ShippingStatus::On_Shipping,
        ]);
    }

    #[Layout('layouts.admin')]
    #[Title('Admin - Brands')]
    public function render()
    {
        //dd($this->order);

        return view('livewire.admin.orders.show-order');
    }
}
