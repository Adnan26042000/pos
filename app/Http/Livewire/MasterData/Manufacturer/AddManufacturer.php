<?php

namespace App\Http\Livewire\MasterData\Manufacturer;

use Livewire\Component;

class AddManufacturer extends Component
{
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

    public function save()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.master-data.manufacturer.add-manufacturer');
    }
}
