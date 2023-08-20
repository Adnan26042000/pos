<?php

namespace App\Http\Livewire\Customer;

use App\Models\Customer;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class CustomersList extends Component
{
    use WithPagination;

    public $filter = [];

    public function mount()
    {
        $this->filter['status'] = 't';
    }

    public function search()
    {

    }

    public function render()
    {
        $fetch_customers = Customer::select('id', 'name', 'phone', 'status', 'address')
            ->when(!empty($this->filter['name']), function ($q) {
                return $q->where('name', 'LIKE', '%' . $this->filter['name'] . '%');
            })->when(!empty($this->filter['phone']), function ($q) {
                return $q->where('phone', $this->filter['phone']);
            })->when(!empty($this->filter['status']), function ($q) {
                return $q->where('status', $this->filter['status']);
            })
            ->paginate(30);
        return view('livewire.customer.customers-list', ['fetch_customers' => $fetch_customers]);
    }
}
