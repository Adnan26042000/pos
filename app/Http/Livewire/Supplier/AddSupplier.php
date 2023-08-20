<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Rack;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AddSupplier extends Component
{
    use WithPagination;

    protected $rules = [
        'supplier.name' => 'required|string|max:50',
        'supplier.phone' => 'required|string|max:15',
        'supplier.contact_person_name' => 'null|string|max:50',
        'supplier.contact_person_phone' => 'null|string|max:15',
        'supplier.opening_balance' => 'required|numeric|min:0',
        'supplier.status' => 'required|string',
        'supplier.address' => 'required|string|max:200',
    ];

    protected $validationAttributes = [
        'supplier.name' => 'Name',
        'supplier.phone' => 'Phone',
        'supplier.contact_person_name' => 'Primary Contact Person Name',
        'supplier.contact_person_phone' => 'Primary Contact Person Phone',
        'supplier.opening_balance' => 'Opening Balance',
        'supplier.status' => 'Status',
        'supplier.address' => 'Address',
    ];

    public $supplier = [];
    public $success;
    public $is_edit = false;

    public function mount($supplier_id)
    {
        $this->supplier['status'] = 't';
        $this->supplier['opening_balance'] = 0;

        if (!empty($supplier_id)) {
            $this->supplier = optional(Supplier::select('id', 'name', 'phone', 'contact_person_name', 'contact_person_phone', 'opening_balance', 'status', 'address')->find($supplier_id))->toArray();
            if (empty($this->supplier)) {
                session()->flash('error', 'No record found.');
                return $this->redirectTo = '/supplier/suppliers-list';
            }
            $this->is_edit = true;
        }
    }

    public function save(): void
    {
        $this->withValidator(function (\Illuminate\Validation\Validator $validator) {
            if ($validator->fails()) {
                $this->dispatchBrowserEvent('error');
            }
        })->validate();

        try {
            DB::beginTransaction();
            if (!$this->is_edit) {
                Supplier::create($this->supplier);
                $this->success = 'Supplier added successfully.';
                $this->clear();
            } else {
                $supplier_exists = Supplier::where('id', $this->supplier['id'])->exists();
                if (!$supplier_exists) {
                    throw new \Exception('No record found.');
                }

                Supplier::where('id', $this->supplier['id'])->update($this->supplier);
                $this->success = 'Supplier updated successfully.';
            }
            $this->dispatchBrowserEvent('success');
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $this->dispatchBrowserEvent('error');
            $this->addError('error', $ex->getMessage());
        }
    }

    public function clear(): void
    {
        $this->resetErrorBag();
        $this->reset('supplier', 'is_edit');
    }

    public function render()
    {
        return view('livewire.supplier.add-supplier');
    }
}
