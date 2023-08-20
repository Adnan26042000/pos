<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class SuppliersList extends Component
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
        $fetch_suppliers = Supplier::select('id', 'name', 'phone', 'contact_person_name', 'contact_person_phone', 'opening_balance', 'status', 'address')
            ->when(!empty($this->filter['name']), function ($q) {
                return $q->where('name', 'LIKE', '%' . $this->filter['name'] . '%');
            })->when(!empty($this->filter['phone']), function ($q) {
                return $q->where('phone', $this->filter['phone']);
            })->when(!empty($this->filter['status']), function ($q) {
                return $q->where('status', $this->filter['status']);
            })
            ->paginate(30);
        return view('livewire.supplier.suppliers-list', ['fetch_suppliers' => $fetch_suppliers]);
    }
}
