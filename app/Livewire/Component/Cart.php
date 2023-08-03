<?php

namespace App\Livewire\Component;

use Livewire\Component;
use Livewire\Attributes\On;

class Cart extends Component
{
    #[On('cart-updated')]
    public function render()
    {
        $cart = session()->get('cart');

        $cartItemsTotal = $cart == null ? 0 : array_sum(array_map(fn ($item) => $item['quantity'], $cart));

        return view('livewire.component.cart', [
            'cartItemsTotal' => $cartItemsTotal,
            'cartBox' => json_decode(json_encode($cart), FALSE)
        ]);
    }
}
