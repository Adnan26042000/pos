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
        'product.category_id' => 'required',
        'product.name' => 'required',
        'product.pieces_in_packing' => 'required|numeric',
        'product.supply_price' => 'required|numeric',
        'product.retail_price' => 'required|numeric',
    ];

    protected $validationAttributes = [
        'product.category_id' => 'Category',
        'product.name' => 'Product Name',
        'product.pieces_in_packing' => 'Pieces in Packing',
        'product.supply_price' => 'Supply Price',
        'product.retail_price' => 'Retail Price',
    ];

    public function mount($id)
    {
        if (empty($id)) {
            session()->flash('error', 'Product not found.');
            return $this->redirectTo = '/master-data/products';
        }
        $this->product_id = $id;
        $this->product = optional(Product::find($id))->toArray();
        if (empty($this->product)) {
            session()->flash('error', 'Product not found.');
            return $this->redirectTo = '/master-data/products';
        }

        $this->product['supply_price'] = round($this->product['supply_price'] * $this->product['pieces_in_packing'],2);
        $this->product['retail_price'] = round($this->product['retail_price'] * $this->product['pieces_in_packing'],2);

        $this->manufactures = Manufacturer::where('status', 't')->get()->toArray();
        $this->sizes = Size::where('status', 't')->get()->toArray();
        $this->racks = Rack::where('status', 't')->get()->toArray();
        $this->categories = Category::where('status', 't')->get()->toArray();
    }

    public function edit()
    {
        $this->withValidator(function (\Illuminate\Validation\Validator $validator) {
            if ($validator->fails()) {
                $this->dispatchBrowserEvent('error');
            }
        })->validate();

        try {
            if (Product::where('id', '!=', $this->product_id)->where('name', $this->product['name'])->exists()) {
                throw new \Exception('Product Name already exists.');
            }
            $found = Product::find($this->product_id);
            if (empty($found)) {
                throw new \Exception('No record found.');
            }
            $this->product['supply_price'] = round($this->product['supply_price'] / $this->product['pieces_in_packing'],2);
            $this->product['retail_price'] = round($this->product['retail_price'] / $this->product['pieces_in_packing'],2);
            $found->update($this->product);
            $this->product['supply_price'] = round($this->product['supply_price'] * $this->product['pieces_in_packing'],2);
            $this->product['retail_price'] = round($this->product['retail_price'] * $this->product['pieces_in_packing'],2);
            $this->success = 'Product updated successfully.';
        } catch (\Exception $e) {
            $this->addError('error', $e->getMessage());
            $this->dispatchBrowserEvent('error');
        }
    }

    public function render()
    {
        return view('livewire.master-data.products.edit-products');
    }
}
