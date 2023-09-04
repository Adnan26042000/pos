<div x-data="{modal: false}" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8"
                style="width: 700px !important;">
                <div class="absolute right-0 top-0 pt-5 pr-4">
                    <button type="button"
                            class="rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                             aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <div class="sm:flex sm:items-start">
                    <div class="text-center sm:mt-0 sm:text-left w-full">
                        <div class="col-span-4 border-b">
                            <div class="mx-6 flex flex-row">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                                    </svg>
                                </div>
                                <div class="w-full">
                                    <input type="text" autocomplete="off" placeholder="Search..." id="search"
                                           wire:model.debounce.500="search"
                                           class="h-16 w-full border-0 bg-transparent pr-4 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm">
                                </div>

                            </div>
                        </div>
                        <div class="max-h-96 overflow-y-auto">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50 sticky top-0 z-10">
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

                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Qty
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                @if(!empty($fetch_products))
                                    @foreach($fetch_products as $i=> $p)
                                        <tr class="hover:bg-gray-100 hover:text-gray-900 text-gray-900 product"
                                            wire:key="{{$p['id']}}" id="{{$p['id']}}">
                                            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium pl-6">
                                                {{$p['name']}}
                                            </td>

                                            <td class="whitespace-nowrap px-3 py-4 text-sm">
                                                {{number_format($p['supply_price'],2)}}
                                            </td>

                                            <td class="whitespace-nowrap px-3 py-4 text-sm">
                                                {{number_format($p['retail_price'],2)}}
                                            </td>

                                            <td class="whitespace-nowrap px-3 py-4 text-sm">
                                                <input type="text" autocomplete="off" id="qty_{{$p['id']}}" value="1"
                                                       {{--                                                       wire:model="fetch_products.{{$i}}.qty"--}}
                                                       class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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

                        <div class="border-t flex flex-wrap items-center bg-gray-50 px-4 py-2.5 text-xs text-gray-700">
                            Type <kbd
                                class="mx-1 flex h-5 w-5 items-center justify-center rounded border border-gray-400 bg-white font-semibold text-gray-900 sm:mx-2">F2</kbd>
                            <span class="sm:hidden">for projects,</span><span class="hidden sm:inline">to select search box</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let search = document.querySelector("#search");
    setTimeout(() => {
        search.focus();
    }, 600)
    window.addEventListener('productSearch', () => {
        let selected_product = -1;
        let products = null;
        products = document.querySelectorAll(".product");
        if (products.length > 0) {
            search.addEventListener("keydown", (e) => {
                if (e.key == 'ArrowUp' || e.key == 'ArrowDown') {
                    if (e.key == 'ArrowUp') {
                        selected_product--;
                        if (selected_product < 0) {
                            selected_product = products.length - 1;
                        }
                    } else if (e.key == 'ArrowDown') {
                        selected_product++;
                        if (selected_product > products.length - 1) {
                            selected_product = 0;
                        }
                    }

                    products.forEach((product) => {
                        product.classList.remove('bg-indigo-600', 'text-white', 'hover:bg-indigo-600', 'hover:text-white')
                    })
                    products[selected_product].classList.add('bg-indigo-600', 'text-white', 'hover:bg-indigo-600', 'hover:text-white');
                    products[selected_product].querySelector(`#qty_${products[selected_product].id}`).focus();

                    products.forEach((product, index) => {
                        product.querySelector(`#qty_${product.id}`).addEventListener('focus', () => {
                            products.forEach((product) => {
                                product.classList.remove('bg-indigo-600', 'text-white', 'hover:bg-indigo-600', 'hover:text-white')
                            })
                            selected_product = index;
                            products[selected_product].classList.add('bg-indigo-600', 'text-white', 'hover:bg-indigo-600', 'hover:text-white');
                        })

                        product.addEventListener("keydown", (e) => {
                            products[selected_product].classList.add('bg-indigo-600', 'text-white', 'hover:bg-indigo-600', 'hover:text-white');
                            if (e.key == 'ArrowUp' || e.key == 'ArrowDown') {
                                if (e.key == 'ArrowUp') {
                                    selected_product--;
                                    if (selected_product < 0) {
                                        selected_product = products.length - 1;
                                    }
                                } else if (e.key == 'ArrowDown') {
                                    selected_product++;
                                    if (selected_product > products.length - 1) {
                                        selected_product = 0;
                                    }
                                }

                                products.forEach((product) => {
                                    product.classList.remove('bg-indigo-600', 'text-white', 'hover:bg-indigo-600', 'hover:text-white')
                                })
                                products[selected_product].classList.add('bg-indigo-600', 'text-white', 'hover:bg-indigo-600', 'hover:text-white');
                                products[selected_product].querySelector(`#qty_${products[selected_product].id}`).focus();
                            }
                        })
                    })
                }
            })
        }
        window.addEventListener('keyup', e => {
            if (e.key == 'F2') {
                search.focus();
                selected_product = -1;
                products.forEach((product) => {
                    product.classList.remove('bg-indigo-600', 'text-white', 'hover:bg-indigo-600', 'hover:text-white')
                })
            }
        })
    })

</script>
</div>
