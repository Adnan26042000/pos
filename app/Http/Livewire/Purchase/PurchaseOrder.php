<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Supplier;
use App\trait\AddProductsTrait;
use Livewire\Component;

class PurchaseOrder extends Component
{
    use AddProductsTrait;

    public $fetch_suppliers = [];
    public $purchase = [];
    public $is_edit = false;


    protected $rules = [
        'purchase.expected_delivery_date' => 'required|date|after_or_equal:today',
        'purchase.supplier_id' => 'required|integer',
    ];

    protected $validationAttributes = [
        'purchase.expected_delivery_date' => 'Expected Delivery Date',
        'purchase.supplier_id' => 'Supplier',
    ];

    public function save()
    {
        $this->withValidator(function (\Illuminate\Validation\Validator $validator) {
            if ($validator->fails()) {
                $this->dispatchBrowserEvent('error');
            }
        })->validate();

        try {

        } catch (\Exception $ex) {
            $this->addError('error', $ex->getMessage());
            $this->dispatchBrowserEvent('errorPopup');
        }
    }

    public function mount()
    {
        $this->fetch_suppliers = Supplier::where('status', 't')->select('id', 'name')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.purchase.purchase-order');
    }
}
