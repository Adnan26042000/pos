<div>

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flow-root overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg bg-white">
            @include('includes.error-template')
            <div class="h-16  flex items-center justify-between px-6 font-medium text-md">
                Create Purchase Order
                <button type="button" wire:click.prevent="openAddProductModal"
                        class="mr-2 rounded-md bg-indigo-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Add Products
                </button>
            </div>
            <div class="-mx-4 -my-2 overflow-x-auto -mx-6 lg:-mx-8 bg-white">
                <form wire:submit.prevent="save">
                    <div class="inline-block min-w-full py-2 align-middle px-6 lg:px-8">
                        <div class="border-t">
                            <div class="grid grid-cols-4 mx-4">

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="date"
                                           class="block text-sm font-medium leading-6 text-gray-900">PO Date<span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input type="text" id="date" value="{{\Carbon\Carbon::now()->toDateString()}}"
                                               disabled
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="created_by"
                                           class="block text-sm font-medium leading-6 text-gray-900">PO Create By<span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input type="text" id="created_by" value="{{auth()->user()->name ?? '-'}}"
                                               disabled
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="status"
                                           class="block text-sm font-medium leading-6 text-gray-900">PO Status<span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input type="text" id="status" value="Draft"
                                               disabled
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="expected_delivery_date"
                                           class="block text-sm font-medium leading-6 text-gray-900">Expected Delivery
                                        Date<span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input type="date" id="expected_delivery_date"  wire:model.defer="purchase.expected_delivery_date"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="expected_delivery_date"
                                           class="block text-sm font-medium leading-6 text-gray-900">Supplier<span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <select id="expected_delivery_date" wire:model.defer="purchase.supplier_id"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value=""></option>
                                            @foreach($fetch_suppliers as $supplier)
                                            <option value="{{$supplier['id']}}">{{$supplier['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>
                                                <div class="h-14 bg-gray-50 flex items-center justify-end border-t px-6 mt-2">
                                                    <button type="submit"
                                                            class="mr-2 rounded-md bg-indigo-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                                        {{$is_edit?'Update':'Add'}}
                                                    </button>
                                                </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        @include('includes.trait.add-products')
</div>
