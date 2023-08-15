<?php

namespace App\Http\Livewire\MasterData\Categories;

use App\Models\Category;
use App\Models\Manufacturer;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class AddCategories extends Component
{
    use WithPagination;

    protected $rules = [
        'category.name' => 'required|string|max:100',
        'category.status' => 'required|string',
    ];

    protected $validationAttributes = [
        'category.name' => 'Name',
        'category.status' => 'Status',
    ];

    public $category = [];
    public $success;
    public $is_edit = false;

    public function mount()
    {
        $this->category['status'] = 't';
    }

    public function edit($id)
    {
        try {
            $this->category = optional(Category::select('id', 'name', 'status')->find($id))->toArray();
            if (!empty($category)) {
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
                $dup_category = Category::where('name', $this->category['name'])->exists();
                if ($dup_category) {
                    throw new \Exception('Category already exists.');
                }

                Category::create($this->category);
                $this->success = 'Category added successfully.';
            } else {
                $category_exists = Category::where('id', $this->category['id'])->exists();
                if (!$category_exists) {
                    throw new \Exception('No record found.');
                }
                $dup_category = Category::where('id', '!=', $this->category['id'])->where('name', $this->category['name'])->exists();
                if ($dup_category) {
                    throw new \Exception('Category already exists.');
                }

                Category::where('id', $this->category['id'])->update($this->category);
                $this->success = 'Category updated successfully.';
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
        $this->reset('category', 'is_edit');
    }

    public function render()
    {
        $fetch_categories = Category::select('id', 'name', 'status')->paginate(30);
        return view('livewire.master-data.categories.add-categories', ['fetch_categories' => $fetch_categories]);
    }
}
