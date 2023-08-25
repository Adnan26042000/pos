<div>

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flow-root overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg bg-white">
            @include('includes.error-template')
            <div class="h-16  flex items-center justify-between px-6 font-medium text-md">
                Create Purchase Order
                <button type="button"
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
                                    <label for="name"
                                           class="block text-sm font-medium leading-6 text-gray-900">Name <span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input type="text" id="name" autocomplete="off"
                                               wire:model.defer="supplier.name"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>


                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="phone"
                                           class="block text-sm font-medium leading-6 text-gray-900">Phone <span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input type="text" id="phone" autocomplete="off"
                                               wire:model.defer="supplier.phone"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>


                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="contact_person_name"
                                           class="block text-sm font-medium leading-6 text-gray-900">Primary Contact
                                        Person Name </label>
                                    <div class="mt-1">
                                        <input type="text" id="contact_person_name" autocomplete="off"
                                               wire:model.defer="supplier.contact_person_name"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>


                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="contact_person_phone"
                                           class="block text-sm font-medium leading-6 text-gray-900">Primary Contact
                                        Person Phone </label>
                                    <div class="mt-1">
                                        <input type="text" id="contact_person_phone" autocomplete="off"
                                               wire:model.defer="supplier.contact_person_phone"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="opening_balance"
                                           class="block text-sm font-medium leading-6 text-gray-900">Opening Balance
                                        <span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input type="number" step="0.01" id="opening_balance" autocomplete="off"
                                               wire:model.defer="supplier.opening_balance"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>


                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="contact_no"
                                           class="block text-sm font-medium leading-6 text-gray-900">Status <span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <select wire:model.defer="supplier.status"
                                                class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value=""></option>
                                            <option value="t">Active</option>
                                            <option value="f">Inactive</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="mx-2 my-2 col-span-4">
                                    <label for="address"
                                           class="block text-sm font-medium leading-6 text-gray-900">Address
                                        <span
                                            class="text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <textarea rows="4" id="address" autocomplete="off"
                                                  wire:model.defer="supplier.address"
                                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                        <div class="h-14 bg-gray-50 flex items-center justify-end border-t px-6 mt-2">--}}
                        {{--                            <button type="submit"--}}
                        {{--                                    class="mr-2 rounded-md bg-indigo-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">--}}
                        {{--                                {{$is_edit?'Update':'Add'}}--}}
                        {{--                            </button>--}}

                        {{--                            <button type="button" wire:click.prevent="clear"--}}
                        {{--                                    class="rounded-md bg-red-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">--}}
                        {{--                                Reset--}}
                        {{--                            </button>--}}
                        {{--                        </div>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('includes.trait.add-products')
</div>
