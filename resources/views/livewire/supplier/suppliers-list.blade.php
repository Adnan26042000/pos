<div>

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flow-root overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg bg-white">
            @include('includes.error-template')
            <div class="h-16  flex items-center px-6 font-medium text-md">
                Search Filters
            </div>
            <div class="-mx-4 -my-2 overflow-x-auto -mx-6 lg:-mx-8 bg-white">
                <form wire:submit.prevent="search">
                    <div class="inline-block min-w-full py-2 align-middle px-6 lg:px-8">
                        <div class="border-t">
                            <div class="grid grid-cols-4 mx-4">

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="name"
                                           class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                    <div class="mt-1">
                                        <input type="text" id="name" autocomplete="off"
                                               wire:model.defer="filter.name"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>


                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="phone"
                                           class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                                    <div class="mt-1">
                                        <input type="text" id="phone" autocomplete="off"
                                               wire:model.defer="filter.phone"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="contact_no"
                                           class="block text-sm font-medium leading-6 text-gray-900">Status </label>
                                    <div class="mt-1">
                                        <select wire:model.defer="filter.status"
                                                class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                            <option value=""></option>
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
                                Search
                            </button>

                            <button type="button" wire:click.prevent="clear"
                                    class="rounded-md bg-red-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="px-4 sm:px-6 lg:px-8">
        <div class="mt-8 flow-root overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
            <div class="h-16 bg-white flex items-center px-6 font-medium text-md">
                Suppliers List
            </div>
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 bg-white">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="border-t">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="py-3.5  pr-3 text-left text-sm font-semibold text-gray-900 pl-6">Name
                                </th>
                                <th scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Phone
                                </th>

                                <th scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Contact Person
                                    Name
                                </th>

                                <th scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Contact Person
                                    Phone
                                </th>

                                <th scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Address
                                </th>

                                <th scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Opening Balance
                                </th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status
                                </th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            @if($fetch_suppliers->isNotEmpty())
                                @foreach($fetch_suppliers as $s)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900 pl-6">
                                            {{$s->name}}
                                        </td>

                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{$s->phone ?? '-'}}
                                        </td>

                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            @if(empty($s->contact_person_name))
                                                -
                                            @else
                                                {{$s->contact_person_name ?? '-'}}
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            @if(empty($s->contact_person_phone))
                                                -
                                            @else
                                            {{$s->contact_person_phone ?? '-'}}
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{$s->address ?? '-'}}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{$s->opening_balance ?? '-'}}
                                        </td>

                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            @if($s->status == 't')
                                                <span
                                                    class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700">Active</span>
                                            @else
                                                <span
                                                    class="inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700">Inactive</span>
                                            @endif
                                        </td>

                                        <td class="relative whitespace-nowrap py-4 pl-3  text-center text-sm font-medium pr-6">
                                            <a href="{{route('supplier.add-supplier',['supplier_id'=>$s->id])}}"
                                               target="_blank"
                                               class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm  text-center text-red-600"
                                        colspan="7">
                                        No Record Yet!
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    @if($fetch_suppliers->isNotEmpty())
                        <div class="h-14 bg-gray-50  border-t px-6 mt-2 py-2">
                            @if($fetch_suppliers->lastPage() >  1)
                                {{$fetch_suppliers->links()}}
                            @else
                                <div class="h-full flex items-center">
                                    <p class="text-sm font-light">Showing <span class="font-medium">1</span> to <span
                                            class="font-medium">1</span> of <span class="font-medium">1</span>
                                        results</p>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
