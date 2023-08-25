<div>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flow-root overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg bg-white">
            @include('includes.error-template')
            <div class="h-16  flex items-center px-6 font-medium text-md">
                Edit Products
            </div>
            <div class="-mx-4 -my-2 overflow-x-auto -mx-6 lg:-mx-8 bg-white">
                <form wire:submit.prevent="edit">
                    <div class="inline-block min-w-full py-2 align-middle px-6 lg:px-8">
                        <div class="border-t">
                            <div class="grid grid-cols-4 mx-4">
                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="contact_no"
                                           class="block text-sm font-medium leading-6 text-gray-900">Category <span
                                            class="text-red-700">*</span></label></label>
                                    <div class="mt-1">
                                        <select wire:model.defer="product.category_id"
                                                class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value=""></option>
                                            @foreach($categories as $c)
                                                <option value="{{$c['id']}}">{{$c['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="name"
                                           class="block text-sm font-medium leading-6 text-gray-900">Name <span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input type="text" id="name" autocomplete="off"
                                               wire:model.defer="product.name"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="contact_no"
                                           class="block text-sm font-medium leading-6 text-gray-900">Size</label>
                                    <div class="mt-1">
                                        <select wire:model.defer="product.size_id"
                                                class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value=""></option>
                                            @foreach($sizes as $s)
                                                <option value="{{$s['id']}}">{{$s['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="tier"
                                           class="block text-sm font-medium leading-6 text-gray-900">Pieces in Packing
                                        <span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input type="text" id="tier" autocomplete="off"
                                               wire:model.defer="product.pieces_in_packing"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="supply_price"
                                           class="block text-sm font-medium leading-6 text-gray-900">Supply Price
                                        <span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input type="text" id="supply_price" autocomplete="off"
                                               wire:model.defer="product.supply_price"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="retail_price"
                                           class="block text-sm font-medium leading-6 text-gray-900">Retail Price
                                        <span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input type="text" id="retail_price" autocomplete="off"
                                               wire:model.defer="product.retail_price"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="contact_no"
                                           class="block text-sm font-medium leading-6 text-gray-900">Manufacture</label>
                                    <div class="mt-1">
                                        <select wire:model.defer="product.manufacture_id"
                                                class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value=""></option>
                                            @foreach($manufactures as $m)
                                                <option value="{{$m['id']}}">{{$m['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="contact_no"
                                           class="block text-sm font-medium leading-6 text-gray-900">Supplier
                                    </label>
                                    <div class="mt-1">
                                        <select wire:model.defer="product.supplier_id"
                                                class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value=""></option>

                                        </select>
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="contact_no"
                                           class="block text-sm font-medium leading-6 text-gray-900">Rack</label>
                                    <div class="mt-1">
                                        <select wire:model.defer="product.rack_id"
                                                class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value=""></option>
                                            @foreach($racks as $r)
                                                <option value="{{$r['id']}}">{{$r['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="contact_no"
                                           class="block text-sm font-medium leading-6 text-gray-900">Is Discountable?
                                        <span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <select wire:model.defer="product.discountable"
                                                class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="f">No</option>
                                            <option value="t">Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="contact_no"
                                           class="block text-sm font-medium leading-6 text-gray-900">Status <span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <select wire:model.defer="product.status"
                                                class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value="t">Active</option>
                                            <option value="f">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="h-14 bg-gray-50 flex items-center justify-end border-t px-6 mt-2">
                            <button type="submit"
                                    class="mr-2 rounded-md bg-indigo-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
