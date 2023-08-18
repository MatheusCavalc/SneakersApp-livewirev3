<?php

namespace App\Livewire\Checkout;

use App\Enums\PaymentStatus;
use App\Jobs\UpdateOrderJob;
use Illuminate\Http\Request;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CheckoutFailure extends Component
{
    public $order_id;

    public function mount(Request $request)
    {
        $this->order_id = $request->get('order_id');
    }

    public function failure()
    {
        new UpdateOrderJob($this->order_id, PaymentStatus::Failed);
    }

    #[Layout('layouts.main')]
    #[Title('Home')]
    public function render()
    {
        //$this->failure();

        return view('livewire.checkout.checkout-failure');
    }
}
