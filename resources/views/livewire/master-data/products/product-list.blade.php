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
                                           class="block text-sm font-medium leading-6 text-gray-900">Product Name</label>
                                    <div class="mt-1">
                                        <input type="text" id="name" autocomplete="off"
                                               wire:model.defer="search.name"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="mx-2 my-2 col-span-4 md:col-span-2 lg:col-span-1">
                                    <label for="contact_no"
                                           class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                                    <div class="mt-1">
                                        <select wire:model.defer="search.status"
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
            <div class="h-16 bg-white flex justify-between items-center px-6 font-medium text-md">
                <span>Products List</span>
                <div>
                    <a href="{{route('master-data.add-products')}}"
                            class="mr-2 rounded-md bg-indigo-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Add Product
                    </a>
                </div>
            </div>
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 bg-white">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="border-t">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="py-3.5  pr-3 text-left text-sm font-semibold text-gray-900 pl-6">#
                                </th>
                                <th scope="col"
                                    class="py-3.5  pr-3 text-left text-sm font-semibold text-gray-900 pl-6">Product Name
                                </th>
                                <th scope="col"
                                    class="py-3.5  pr-3 text-left text-sm font-semibold text-gray-900 pl-6">Size
                                </th>
                                <th scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Pieces in Packing
                                </th> <th scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Supply Price
                                </th> <th scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Retail Price
                                </th>
                                <th scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Category
                                </th>
                                <th scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Manufacture
                                </th>
                                <th scope="col"
                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Rack
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status
                                </th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            @if($products->isNotEmpty())
                                @foreach($products as $p)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900 pl-6">
                                            {{$loop->iteration}}
                                        </td>
                                        <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900 pl-6">
                                            {{$p->name}}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{$p->size ?? '-'}}
                                        </td><td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{$p->pieces_in_packing ?? '-'}}
                                        </td><td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{$p->supply_price ?? '-'}}
                                        </td><td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{$p->retail_price ?? '-'}}
                                        </td><td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{$p->category_name ?? '-'}}
                                        </td><td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{$p->manufacture_name ?? '-'}}
                                        </td><td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{$p->rack_name ?? '-'}}
                                        </td>


                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            @if($p->status == 't')
                                                <span
                                                    class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700">Active</span>
                                            @else
                                                <span
                                                    class="inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700">Inactive</span>
                                            @endif
                                        </td>


                                        <td class="relative whitespace-nowrap py-4 pl-3  text-center text-sm font-medium pr-6">
                                            <a href="{{route('master-data.edit-products',$p->id)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm  text-center text-red-600"
                                        colspan="10">
                                        No Record Yet!
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
{{--                    @if($fetch_size->isNotEmpty())--}}
{{--                        <div class="h-14 bg-gray-50  border-t px-6 mt-2 py-2">--}}
{{--                            @if($fetch_size->lastPage() >  1)--}}
{{--                                {{$fetch_size->links()}}--}}
{{--                            @else--}}
{{--                                <div class="h-full flex items-center">--}}
{{--                                    <p class="text-sm font-light">Showing <span class="font-medium">1</span> to <span--}}
{{--                                            class="font-medium">1</span> of <span class="font-medium">1</span>--}}
{{--                                        results</p>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    @endif--}}
                </div>
            </div>
        </div>
    </div>

</div>
