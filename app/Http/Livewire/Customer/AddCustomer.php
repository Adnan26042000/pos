<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddCustomer extends Component
{
    protected $rules = [
        'customer.name' => 'required|string|max:50',
        'customer.phone' => 'required|string|max:15',
        'customer.status' => 'required|string',
        'customer.address' => 'required|string|max:200',
    ];

    protected $validationAttributes = [
        'customer.name' => 'Name',
        'customer.phone' => 'Phone',
        'customer.status' => 'Status',
        'customer.address' => 'Address',
    ];

    public $customer = [];
    public $success;
    public $is_edit = false;

    public function mount($customer_id)
    {
        $this->customer['status'] = 't';

        if (!empty($customer_id)) {
            $this->customer = optional(Customer::select('id', 'name', 'phone', 'status', 'address')->find($customer_id))->toArray();
            if (empty($this->customer)) {
                session()->flash('error', 'No record found.');
                return $this->redirectTo = '/customer/customers-list';
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
                Customer::create($this->customer);
                $this->success = 'Customer added successfully.';
                $this->clear();
            } else {
                $customer_exists = Customer::where('id', $this->customer['id'])->exists();
                if (!$customer_exists) {
                    throw new \Exception('No record found.');
                }

                Customer::where('id', $this->customer['id'])->update($this->customer);
                $this->success = 'Customer updated successfully.';
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
        $this->reset('customer', 'is_edit');
    }

    public function render()
    {
        return view('livewire.customer.add-customer');
    }
}
