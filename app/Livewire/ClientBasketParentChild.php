<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ClientBasketParentChild extends Component
{
    public string $customer_name = '';
    public string $customer_email = '';

    public array $orderProducts = [];
    public Collection $allProducts;

    public bool $success = false;

    public function mount()
    {
        $this->allProducts = Product::where('price', '>', 0)->where('in_stock', true)->orderBy('name')->get();
        $this->orderProducts[] = [
            'product_id' => '',
            'quantity' => 1,
        ];
    }

    public function addProduct(): void
    {
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
    }

    public function removeProduct($index): void
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    #[Computed]
    public function totalPrice(): float
    {
        $total = 0;
        foreach ($this->orderProducts as $orderProduct) {
            if ( !empty( $orderProduct['product_id'] ) ) {
                $product = $this->allProducts->firstWhere('id', $orderProduct['product_id']);
                if ($product) {
                    $total += $product->price * $orderProduct['quantity'];
                }
            }
        }
        return $total;
    }

    public function render()
    {
        return view('livewire.client-basket-parent-child');
    }
}
