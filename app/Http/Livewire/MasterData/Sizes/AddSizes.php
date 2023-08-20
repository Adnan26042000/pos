<?php

namespace App\Http\Livewire\MasterData\Sizes;

use App\Models\Size;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AddSizes extends Component
{

    use WithPagination;

    protected $rules = [
        'sizes.name' => 'required|string|max:20',
        'sizes.prefix' => 'required|string|max:20',
        'sizes.status' => 'required|string',
    ];

    protected $validationAttributes = [
        'sizes.name' => 'Name',
        'sizes.prefix' => 'Prefix',
        'sizes.status' => 'Status',
    ];

    public $sizes = [];
    public $success;
    public $is_edit = false;

    public function mount()
    {
        $this->sizes['status'] = 't';
    }

    public function edit($id)
    {
        try {
            $this->sizes = optional(Size::select('id', 'name', 'tier', 'status')->find($id))->toArray();
            if (!empty($this->sizes)) {
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

                Size::create($this->sizes);
                $this->success = 'Size added successfully.';
            } else {
                $size_exists = Size::where('id', $this->sizes['id'])->exists();
                if (!$size_exists) {
                    throw new \Exception('No record found.');
                }

                $dup_tier = Size::where('id', '!=', $this->sizes['id'])->where('name', $this->sizes['name'])->exists();
                if ($dup_tier) {
                    throw new \Exception('Size already exists.');
                }

                Size::where('id', $this->sizes['id'])->update($this->sizes);
                $this->success = 'Size updated successfully.';
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
        $this->reset('sizes', 'is_edit');
    }

    public function render()
    {
        $fetch_size = Size::select('id', 'name', 'prefix', 'status')->paginate(30);

        return view('livewire.master-data.sizes.add-sizes',compact('fetch_size'));
    }
}
