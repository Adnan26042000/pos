<?php

namespace App\Http\Livewire\MasterData\Rack;

use App\Models\Rack;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AddRack extends Component
{
    use WithPagination;

    protected $rules = [
        'rack.name' => 'required|string|max:20',
        'rack.tier' => 'required|string|max:20',
        'rack.status' => 'required|string',
    ];

    protected $validationAttributes = [
        'rack.name' => 'Name',
        'rack.tier' => 'Tier',
        'rack.status' => 'Status',
    ];

    public $rack = [];
    public $success;
    public $is_edit = false;

    public function mount()
    {
        $this->rack['status'] = 't';
    }

    public function edit($id)
    {
        try {
            $this->rack = optional(Rack::select('id', 'name', 'tier', 'status')->find($id))->toArray();
            if (!empty($rack)) {
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

                $dup_tier = Rack::where('name', $this->rack['name'])->where('tier', $this->rack['tier'])->exists();
                if ($dup_tier) {
                    throw new \Exception('Tier already exists.');
                }


                Rack::create($this->rack);
                $this->success = 'Rack added successfully.';
            } else {
                $rack_exists = Rack::where('id', $this->rack['id'])->exists();
                if (!$rack_exists) {
                    throw new \Exception('No record found.');
                }

                $dup_tier = Rack::where('id', '!=', $this->rack['id'])->where('name', $this->rack['name'])->where('tier', $this->rack['tier'])->exists();
                if ($dup_tier) {
                    throw new \Exception('Tier already exists.');
                }

                Rack::where('id', $this->rack['id'])->update($this->rack);
                $this->success = 'Rack updated successfully.';
            }
            $this->dispatchBrowserEvent('success');
            $this->clear();

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
        $this->reset('rack', 'is_edit');
    }

    public function render()
    {
        $fetch_rack = Rack::select('id', 'name', 'tier', 'status')->paginate(30);

        return view('livewire.master-data.rack.add-rack', ['fetch_rack' => $fetch_rack]);
    }
}
