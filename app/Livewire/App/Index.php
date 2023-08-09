<?php

namespace App\Livewire\App;

use App\Models\Brand;
use App\Models\Sneaker;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    public function per($sneaker)
    {
        $per = (int)((((float)$sneaker->price - (float)$sneaker->promotion_price) / (float)$sneaker->price) * 100);
        return $per;
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
        return view('livewire.app.index', [
            'first_sneaker' => Sneaker::where('id', 1)->first(),
            'second_sneaker' => Sneaker::where('id', 2)->first(),



            'onSale' => Sneaker::where('in_promotion', true)->orderBy('id', 'desc')->take(3)->get(), //orderByRealeaseDate //take 6 or more
            'sneakersNike' => Sneaker::where('brand_id', 1)->orderBy('id', 'desc')->take(3)->get(), //orderByRealeaseDate
            'sneakersAirJordan' => [], //orderByRealeaseDate //take 3
            'sneakersAdidas' => Sneaker::where('brand_id', 2)->orderBy('id', 'desc')->take(3)->get(), //orderByRealeaseDate //
            'allBrands' => Brand::all()
        ]);
    }
}
