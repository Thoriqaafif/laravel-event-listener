<?php
 
namespace App\Listeners;
 
use App\Events\DeleteProduct;
use App\Events\PurchaseSuccess;
use Auth;
use Illuminate\Events\Dispatcher;
 
class ProductEventSubscriber
{
    /**
     * Handle user login events.
     */
    private function handleUpdateCredit(PurchaseSuccess $event): void 
    {
        $order = $event->order;

        Auth::user()->decrement('kredit', $order->barang->harga);
    }
 
    /**
     * Handle user logout events.
     */
    private function handleUpdateInventory(PurchaseSuccess $event): void 
    {
        $order = $event->order;

        $order->barang->decrement('jumlah', 1);
    }

    public function handlePurchaseSuccess(PurchaseSuccess $event): void
    {
        $this->handleUpdateCredit($event);
        $this->handleUpdateInventory($event);
    }

    public function handleDeleteProduct(DeleteProduct $event): void
    {
    }
 
    /**
     * Register the listeners for the subscriber.
     *
     * @return array<string, string>
     */
    public function subscribe(Dispatcher $events): array
    {
        return [
            PurchaseSuccess::class => 'handlePurchaseSuccess',
            DeleteProduct::class => 'handleDeleteProduct',
        ];
    }
}