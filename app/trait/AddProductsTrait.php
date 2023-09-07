<?php

namespace App\trait;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

trait AddProductsTrait
{
    public $search;
    public $fetch_products = [];

    public $product_trait = false;
    public $temp_selected_product = [];

    public $selected_products = [];

    public function updatedSearch($val): void
    {
        $this->fetch_products = [];
        if (strlen($val) > 2) {
            $this->fetch_products = Product::where('name', 'LIKE', '%' . $val . '%')
                ->limit(10)->get()->toArray();
        }
        $this->dispatchBrowserEvent('productSearch');
    }

    public function openAddProductModal(): void
    {
        $this->product_trait = true;
        $this->dispatchBrowserEvent('autoSelectSearchBox');
    }

    public function closeAddProductModal(): void
    {
        $this->product_trait = false;
    }

    public function updatedTempSelectedProduct(): void
    {
        if (!empty($this->temp_selected_product['product_id']) && !empty($this->temp_selected_product['qty'])) {
            $this->selected_products = array_values($this->selected_products);

            if (in_array($this->temp_selected_product['product_id'], array_column($this->selected_products, 'product_id'))) {

                $index = array_search($this->temp_selected_product['product_id'],array_column($this->selected_products, 'product_id'));
                $this->selected_products[$index]['qty'] += $this->temp_selected_product['qty'];
            } else {
                $this->selected_products[] = $this->temp_selected_product;
            }
            $this->temp_selected_product = [];
        }
    }


}
