<?php

namespace App\Listeners;

use App\Events\PurchaseSuccess;
use Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateCredit
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PurchaseSuccess $event): void
    {
        //
        $order = $event->order;

        Auth::user()->decrement('kredit', $order->barang->harga);
    }
}
