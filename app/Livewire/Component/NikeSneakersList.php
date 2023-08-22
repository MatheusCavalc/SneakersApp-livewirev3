<?php

namespace App\Livewire\Component;

use App\Models\Sneaker;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NikeSneakersList extends Component
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
                    'size' => $sneaker->sizes[0],
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
                'size' => $sneaker->sizes[0],
                'price' => $price,
                'total_price' => (float)$price * $quantity
            ];

            session()->put('cart', $cart);
        }

        $this->dispatch('cart-updated');
    }

    public function addToWishlist($id)
    {
        if (!auth()->user()) {
            return $this->redirect('/login');
        }

        $data = Wishlist::where('sneaker_id', $id)->where('wishlist_owner', Auth::user()->id)->exists();

        if (Sneaker::find($id)) {
            if (!$data) {
                Wishlist::create([
                    'wishlist_owner' => Auth::user()->id,
                    'sneaker_id' => $id
                ]);
            }
        } else {
            return;
        }
    }

    public function render()
    {
        return view('livewire.component.nike-sneakers-list', [
            'sneakersNike' => Sneaker::all(),
        ]);
    }
}
