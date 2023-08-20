<?php

namespace App\Http\Livewire\MasterData\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $search = [];

    public function search()
    {
        $this->resetPage();
    }

    public function clear()
    {
        $this->reset('search');
    }

    public function render()
    {
        $products = Product::leftjoin('sizes as s', 's.id', '=', 'products.size_id')
            ->leftjoin('categories as c', 'c.id', '=', 'products.category_id')
            ->leftjoin('manufacturers as m', 'm.id', '=', 'products.manufacture_id')
            ->leftjoin('racks as r', 's.id', '=', 'products.rack_id')
            ->when(!empty($this->search['name']), function ($q) {
                return $q->where('products.', $this->search['name']);
            })->when(!empty($this->search['status']), function ($q) {
                return $q->where('products.status', $this->search['status']);
            })
            ->select('products.id','products.name as name','s.name as size','m.name as manufacture_name','r.name as rack_name','c.name as category_name','products.status','products.pieces_in_packing')
            ->orderBy('products.created_at', 'desc')
            ->paginate();

        return view('livewire.master-data.products.product-list',compact('products'));
    }
}
