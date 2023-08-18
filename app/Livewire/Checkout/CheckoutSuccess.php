<?php

namespace App\Livewire\Checkout;

use App\Enums\PaymentStatus;
use App\Jobs\SendOrderEmailJob;
use App\Jobs\UpdateOrderJob;
use App\Models\Order;
use Illuminate\Http\Request;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CheckoutSuccess extends Component
{
    public $order_id;
    public $session_id;

    public function mount(Request $request)
    {
        $this->order_id = $request->get('order_id');
        $this->session_id = $request->get('session_id');
    }

    public function success()
    {
        //Stripe::setApiKey(getenv('STRIPE_SECRET'));

        session()->forget('cart');

        //$session = Session::retrieve($this->session_id);

        $order = Order::findOrFail($this->order_id);

        UpdateOrderJob::withChain([
            new SendOrderEmailJob($order->email, $order)
        ])->dispatch($this->order_id, PaymentStatus::Paid, /*$session->payment_intent*/);
    }

    #[Layout('layouts.main')]
    #[Title('Home')]
    public function render()
    {
        //$this->success();

        return view('livewire.checkout.checkout-success');
    }
}
