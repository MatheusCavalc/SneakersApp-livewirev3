<?php

namespace App\Livewire\App;

use App\Models\Sneaker;
use App\Models\Wishlist as ModelsWishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Wishlist extends Component
{
    public function addToCart(Sneaker $sneaker, $quantity)
    {
        $cart = session()->get('cart');

        if (!$cart) {
            $price = $sneaker->in_promotion == true ? $sneaker->promotion_price : $sneaker->price;
            $cart = [
                $sneaker->id => [
                    'id' => $sneaker->id,
                    'name' => $sneaker->name,
                    'image' => $sneaker->image,
                    'quantity' => $quantity,
                    'price' => $price,
                    'total_price' => (float)$price * $quantity
                ]
            ];

            session()->put('cart', $cart);
        }

        if (isset($cart)) {
            $price = $sneaker->in_promotion == true ? $sneaker->promotion_price : $sneaker->price;
            $cart[$sneaker->id] = [
                'id' => $sneaker->id,
                'name' => $sneaker->name,
                'image' => $sneaker->image,
                'quantity' => $quantity,
                'price' => $price,
                'total_price' => (float)$price * $quantity
            ];

            session()->put('cart', $cart);
        }

        $this->dispatch('cart-updated');
    }

    public function removeToWishlist($id)
    {
        $sneaker = ModelsWishlist::where('sneaker_id', $id)->where('wishlist_owner', Auth::user()->id)->first();
        if ($sneaker) {
            $sneaker->delete();
        }

        $this->dispatch('remove-sneaker')->self();
    }

    #[Layout('layouts.main')]
    #[Title('Home')]
    public function render()
    {
        return view('livewire.app.wishlist', [
            'wishlist' => ModelsWishlist::where('wishlist_owner', '=', Auth::user()->id)->get(),
        ]);
    }
}
