<?php

namespace App\Livewire\App;

use App\Models\Sneaker;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class SearchView extends Component
{
    public $search = '';

    public $sneakers = '';

    public function mount($search)
    {
        $this->search = $search;
    }

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

    #[Layout('layouts.main')]
    #[Title('Home')]
    public function render()
    {
        $this->sneakers = Sneaker::query()
            ->where('name', 'LIKE', "%{$this->search}%")
            ->get();

        return view('livewire.app.search-view');
    }
}
