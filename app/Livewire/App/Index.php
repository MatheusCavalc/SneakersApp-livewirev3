<?php

namespace App\Livewire\App;

use App\Models\Sneaker;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    public function per($sneaker)
    {
        $per = (((float)$sneaker->price - (float)$sneaker->promotion_price) / (float)$sneaker->price) * 100;
        return (int)$per;
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

            //$this->emit('updateCartCount');

            //session()->flash('success','Product added to the cart successfully');
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

            //$this->emit('updateCartCount');

            //session()->flash('success', 'Product added to the cart successfully');
        }
    }

    #[Layout('layouts.main')]
    #[Title('Home')]
    public function render()
    {
        return view('livewire.app.index', [
            'sneakersNike' => Sneaker::all(),
            'sneakersAirJordan' => [],
            'sneakersAdidas' => [],
        ]);
    }
}
