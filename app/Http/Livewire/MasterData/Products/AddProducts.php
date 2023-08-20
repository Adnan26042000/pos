<?php

namespace App\Http\Livewire\MasterData\Products;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Rack;
use App\Models\Size;
use Livewire\Component;

class AddProducts extends Component
{
    public $product = [];
    public $categories = [];
    public $suppliers = [];
    public $sizes = [];
    public $manufactures = [];
    public $racks = [];
    public $success = null;


    protected $rules = [
        'product.name' => 'required',
        'product.pieces_in_packing' => 'required|numeric',
    ];

    protected $validationAttributes = [
        'product.name' => 'Product Name',
        'product.pieces_in_packing' => 'Pieces in Packing',
    ];

    public function mount()
    {
        $this->manufactures = Manufacturer::where('status', 't')->get()->toArray();
        $this->sizes = Size::where('status', 't')->get()->toArray();
        $this->racks = Rack::where('status', 't')->get()->toArray();
        $this->categories = Category::where('status', 't')->get()->toArray();
    }

    public function save()
    {
        $this->withValidator(function (\Illuminate\Validation\Validator $validator) {
            if ($validator->fails()) {
                $this->dispatchBrowserEvent('error');
            }
        })->validate();

        try {
            Product::create($this->product);
            $this->success = 'Product has been added successfully';
            $this->resetAll();
        } catch (\Exception $e) {
            $this->addError('error', $e->getMessage());
        }
    }


    public function resetAll()
    {
        $this->reset('product');
    }

    public function render()
    {
        return view('livewire.master-data.products.add-products');
    }
}
