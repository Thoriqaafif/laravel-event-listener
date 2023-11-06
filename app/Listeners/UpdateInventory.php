<?php

namespace App\Listeners;

use App\Events\PurchaseSuccess;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateInventory
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
        // updating inventory for product purchased
        $order = $event->order;

        $order->barang->decrement('jumlah', 1);
    }
}
