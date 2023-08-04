<?php

namespace App\Livewire\App;

use App\Models\Sneaker;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class SneakerView extends Component
{
    public Sneaker $sneaker;

    public $quantity = 1;

    public $size;

    public function mount($id)
    {
        $this->sneaker = Sneaker::findOrFail($id);
    }

    public function decrement()
    {
        if ($this->quantity == 1)
            return;

        $this->quantity--;
    }

    public function increment()
    {
        if ($this->quantity == 3)
            return;

        $this->quantity++;
    }

    public function chooseSize($size)
    {
        $this->size = $size;
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
        return view('livewire.app.sneaker-view');
    }
}
