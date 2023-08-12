<?php

namespace App\Http\Livewire\MasterData\Manufacturer;

use App\Models\Manufacturer;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AddManufacturer extends Component
{
    use WithPagination;

    protected $rules = [
        'manufacturer.name' => 'required|string|max:50',
        'manufacturer.contact_no' => 'nullable|string|max:15',
        'manufacturer.status' => 'required|string',
        'manufacturer.address' => 'nullable|string|max:150',
    ];

    protected $validationAttributes = [
        'manufacturer.name' => 'Name',
        'manufacturer.contact_no' => 'Contact #',
        'manufacturer.status' => 'Status',
        'manufacturer.address' => 'Address',
    ];

    public $manufacturer = [];
    public $success;
    public $is_edit = false;

    public function mount()
    {
        $this->manufacturer['status'] = 't';
    }

    public function edit($id)
    {
        try {

            $this->manufacturer = optional(Manufacturer::select('id', 'name', 'contact_no', 'address', 'status')->find($id))->toArray();
            if (!empty($manufacturer)) {
                throw new \Exception('No record found.');
            }
            $this->is_edit = true;
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('error');
            $this->addError('error', $ex->getMessage());
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
                Manufacturer::create($this->manufacturer);
                $this->success = 'Manufacture added successfully.';
                $this->dispatchBrowserEvent('success');
            } else {
                $manufacturer_exists = Manufacturer::where('id', $this->manufacturer['id'])->exists();
                if (!$manufacturer_exists) {
                    throw new \Exception('No record found.');
                }
                Manufacturer::where('id', $this->manufacturer['id'])->update($this->manufacturer);
                $this->success = 'Manufacture updated successfully.';
                $this->dispatchBrowserEvent('success');
                $this->clear();
            }

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
        $this->reset('manufacturer', 'is_edit');
    }

    public function render()
    {
        $fetch_manufacturers = Manufacturer::select('id', 'name', 'contact_no', 'status', 'address')->paginate(30);
        return view('livewire.master-data.manufacturer.add-manufacturer', ['fetch_manufacturers' => $fetch_manufacturers]);
    }
}
