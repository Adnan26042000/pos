<?php

namespace App\Http\Livewire\MasterData\Products;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Rack;
use App\Models\Size;
use Livewire\Component;

class EditProducts extends Component
{
    public $product_id;
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
        'product.status' => 'required',
    ];

    protected $validationAttributes = [
        'product.name' => 'Product Name',
        'product.pieces_in_packing' => 'Pieces in Packing',
        'product.status' => 'Status',
    ];

    public function mount($id)
    {
        if (!empty($id)) {
            $this->product_id = $id;
            $product_exists = Product::find($id);
            if ($product_exists){
                $this->manufactures = Manufacturer::where('status', 't')->get()->toArray();
                $this->sizes = Size::where('status', 't')->get()->toArray();
                $this->racks = Rack::where('status', 't')->get()->toArray();
                $this->categories = Category::where('status', 't')->get()->toArray();
                $this->search();
            }
        }
    }

    public function search()
    {
        $this->product = Product::find($this->product_id)->toArray();
    }

    public function edit()
    {
        $this->withValidator(function (\Illuminate\Validation\Validator $validator) {
            if ($validator->fails()) {
                $this->dispatchBrowserEvent('error');
            }
        })->validate();

        try {

            if (Product::where('id','!=',$this->product_id)->where('name',$this->product['name'])->exists()){
                throw new \Exception('Product Name already exists');
            }
            Product::find($this->product_id)->update($this->product);
            $this->success = 'Product has been edited successfully';
            $this->search();
        } catch (\Exception $e) {
            $this->addError('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.master-data.products.edit-products');
    }
}
