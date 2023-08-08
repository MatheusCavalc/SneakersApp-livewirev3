<?php

namespace App\Livewire\Component;

use Livewire\Component;
use Livewire\Attributes\On;

class Cart extends Component
{
    public function removeItem($sneaker_id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$sneaker_id])) {
            unset($cart[$sneaker_id]);
            session()->put('cart', $cart);

            $this->dispatch('cart-updated');
        }
    }

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
