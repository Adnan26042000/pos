<div class="relative z-10" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-25 transition-opacity"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
    ></div>

    <div class="fixed inset-0 z-10 overflow-y-auto p-4 sm:p-6 md:p-20">
        <div class="mx-auto max-w-xl transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-black ring-opacity-5 transition-all"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
        >
            <div class="relative">
                <svg class="pointer-events-none absolute left-4 top-3.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                </svg>
                <input type="text" class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm" placeholder="Search..." role="combobox" aria-expanded="false" aria-controls="options">
            </div>

            <div class="border-t">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="py-3.5  pr-3 text-left text-sm font-semibold text-gray-900 pl-6">Name
                        </th>
                        <th scope="col"
                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Supply Price
                        </th>

                        <th scope="col"
                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Retail Price
                        </th>

                        <th scope="col"
                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Qty
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
{{--                    @if($fetch_suppliers->isNotEmpty())--}}
{{--                        @foreach($fetch_suppliers as $s)--}}
{{--                            <tr>--}}
{{--                                <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900 pl-6">--}}
{{--                                    {{$s->name}}--}}
{{--                                </td>--}}

{{--                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">--}}
{{--                                    {{$s->phone ?? '-'}}--}}
{{--                                </td>--}}

{{--                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">--}}
{{--                                    @if(empty($s->contact_person_name))--}}
{{--                                        ---}}
{{--                                    @else--}}
{{--                                        {{$s->contact_person_name ?? '-'}}--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">--}}
{{--                                    @if(empty($s->contact_person_phone))--}}
{{--                                        ---}}
{{--                                    @else--}}
{{--                                        {{$s->contact_person_phone ?? '-'}}--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">--}}
{{--                                    {{$s->address ?? '-'}}--}}
{{--                                </td>--}}
{{--                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">--}}
{{--                                    {{$s->opening_balance ?? '-'}}--}}
{{--                                </td>--}}

{{--                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">--}}
{{--                                    @if($s->status == 't')--}}
{{--                                        <span--}}
{{--                                            class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700">Active</span>--}}
{{--                                    @else--}}
{{--                                        <span--}}
{{--                                            class="inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700">Inactive</span>--}}
{{--                                    @endif--}}
{{--                                </td>--}}

{{--                                <td class="relative whitespace-nowrap py-4 pl-3  text-center text-sm font-medium pr-6">--}}
{{--                                    <a href="{{route('supplier.add-supplier',['supplier_id'=>$s->id])}}"--}}
{{--                                       target="_blank"--}}
{{--                                       class="text-indigo-600 hover:text-indigo-900">Edit</a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                    @else--}}
                        <tr>
                            <td class="whitespace-nowrap px-3 py-4 text-sm  text-center text-red-600"
                                colspan="7">
                                No Record Yet!
                            </td>
                        </tr>
{{--                    @endif--}}
                    </tbody>
                </table>
            </div>
         </div>
    </div>
</div>
