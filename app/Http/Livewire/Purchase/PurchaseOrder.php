<?php

namespace App\Http\Livewire\Purchase;

use App\trait\AddProductsTrait;
use Livewire\Component;

class PurchaseOrder extends Component
{
    use AddProductsTrait;

    public function render()
    {
        return view('livewire.purchase.purchase-order');
    }
}
