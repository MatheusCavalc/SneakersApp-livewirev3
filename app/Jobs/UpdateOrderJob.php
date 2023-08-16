<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected String $order_id,
        protected $status_payment,
        //protected $stripe_payment_id = null,
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Order::where('id', $this->order_id)->update([  //queue?job
            'status_payment' => $this->status_payment,
            //'stripe_payment_id' => $this->stripe_payment_id,
        ]);
    }
}
