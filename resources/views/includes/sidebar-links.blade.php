@php
    $active = "bg-gray-700 text-white";
@endphp

<nav class="flex flex-1 flex-col">
    <ul role="list" class="flex flex-1 flex-col gap-y-7">
        <li>
            <ul role="list" class="-mx-2 space-y-1">
                <li>
                    <a href="#"
                       class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                        <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div
                        @if(request()->segment(1) == 'sale')  x-data="{dropdown : true}"
                         @else  x-data="{dropdown : false}" @endif class="rounded-md"
                         x-bind:class="{ 'bg-gray-800': dropdown, 'bg-gray-900': !dropdown }">
                        <div @click="dropdown = !dropdown"
                             class="text-gray-400 hover:bg-gray-700 hover:text-white group flex rounded-md p-2 text-sm leading-6 font-semibold items-center justify-between flex-row cursor-pointer">
                            <div class="flex flex-row gap-x-3 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"/>
                                </svg>
                                Sales
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-4 h-4"
                                     x-bind:class="{ 'rotate-90': dropdown, 'rotate-0': !dropdown }">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                                </svg>
                            </div>
                        </div>

                        <div x-show="dropdown"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                        >
                            <a href=""
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11
                               ">
                                Add Sale
                            </a>

                            <a href=""
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11
                               ">
                                Sales List
                            </a>

                        </div>
                    </div>
                </li>


                <li>
                    <div
                        @if(request()->segment(1) == 'purchase')  x-data="{dropdown : true}"
                         @else  x-data="{dropdown : false}" @endif class="rounded-md"
                         x-bind:class="{ 'bg-gray-800': dropdown, 'bg-gray-900': !dropdown }">
                        <div @click="dropdown = !dropdown"
                             class="text-gray-400 hover:bg-gray-700 hover:text-white group flex rounded-md p-2 text-sm leading-6 font-semibold items-center justify-between flex-row cursor-pointer">
                            <div class="flex flex-row gap-x-3 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                </svg>
                                Purchases
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-4 h-4"
                                     x-bind:class="{ 'rotate-90': dropdown, 'rotate-0': !dropdown }">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                                </svg>
                            </div>
                        </div>

                        <div x-show="dropdown"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                        >
                            <a href="{{route('purchase.create-purchase-order')}}"
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11
                               @if(request()->segment(1) == 'purchase' && request()->segment(2) == 'create-purchase-order') {{$active}} @endif
                               ">
                                Create Purchase Order
                            </a>

                            <a href=""
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11
                               ">
                                Purchase Orders List
                            </a>

                        </div>
                    </div>
                </li>

                <li>
                    <div @if(request()->segment(1) == 'customer')  x-data="{dropdown : true}"
                         @else  x-data="{dropdown : false}" @endif class="rounded-md"
                         x-bind:class="{ 'bg-gray-800': dropdown, 'bg-gray-900': !dropdown }">
                        <div @click="dropdown = !dropdown"
                             class="text-gray-400 hover:bg-gray-700 hover:text-white group flex rounded-md p-2 text-sm leading-6 font-semibold items-center justify-between flex-row cursor-pointer">
                            <div class="flex flex-row gap-x-3 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                </svg>
                                Customers
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-4 h-4"
                                     x-bind:class="{ 'rotate-90': dropdown, 'rotate-0': !dropdown }">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                                </svg>
                            </div>
                        </div>

                        <div x-show="dropdown"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                        >
                            <a href="{{route('customer.add-customer')}}"
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11
                               @if(request()->segment(1) == 'customer' && request()->segment(2) == 'add-customer') {{$active}} @endif
                               ">
                                Add Customer
                            </a>

                            <a href="{{route('customer.customers-list')}}"
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11
                               @if(request()->segment(1) == 'customer' && request()->segment(2) == 'customers-list') {{$active}} @endif
                               ">
                                Customers List
                            </a>

                            <a href=""
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11
                               ">
                                Customers Payment
                            </a>

                        </div>
                    </div>
                </li>


                <li>
                    <div @if(request()->segment(1) == 'supplier')  x-data="{dropdown : true}"
                         @else  x-data="{dropdown : false}" @endif class="rounded-md"
                         x-bind:class="{ 'bg-gray-800': dropdown, 'bg-gray-900': !dropdown }">
                        <div @click="dropdown = !dropdown"
                             class="text-gray-400 hover:bg-gray-700 hover:text-white group flex rounded-md p-2 text-sm leading-6 font-semibold items-center justify-between flex-row cursor-pointer">
                            <div class="flex flex-row gap-x-3 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                                </svg>
                                Suppliers
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-4 h-4"
                                     x-bind:class="{ 'rotate-90': dropdown, 'rotate-0': !dropdown }">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                                </svg>
                            </div>
                        </div>

                        <div x-show="dropdown"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                        >
                            <a href="{{route('supplier.add-supplier')}}"
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11
                               @if(request()->segment(1) == 'supplier' && request()->segment(2) == 'add-supplier') {{$active}} @endif
                               ">
                                Add Supplier
                            </a>

                            <a href="{{route('supplier.suppliers-list')}}"
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11
                               @if(request()->segment(1) == 'supplier' && request()->segment(2) == 'suppliers-list') {{$active}} @endif
                               ">
                                Suppliers List
                            </a>

                            <a href=""
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11
                               ">
                                Suppliers Payment
                            </a>

                        </div>
                    </div>
                </li>


                <li>
                    <div @if(request()->segment(1) == 'master-data')  x-data="{dropdown : true}"
                         @else  x-data="{dropdown : false}" @endif class="rounded-md"
                         x-bind:class="{ 'bg-gray-800': dropdown, 'bg-gray-900': !dropdown }">
                        <div @click="dropdown = !dropdown"
                             class="text-gray-400 hover:bg-gray-700 hover:text-white group flex rounded-md p-2 text-sm leading-6 font-semibold items-center justify-between flex-row cursor-pointer">
                            <div class="flex flex-row gap-x-3 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5"
                                     stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"/>
                                </svg>
                                Master Data
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-4 h-4"
                                     x-bind:class="{ 'rotate-90': dropdown, 'rotate-0': !dropdown }">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                                </svg>
                            </div>
                        </div>

                        <div x-show="dropdown"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                        >
                            <a href="{{route('master-data.manufacturer')}}"
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11
                               @if(request()->segment(1) == 'master-data' && request()->segment(2) == 'manufacturer') {{$active}} @endif
                               ">
                                Manufacturers
                            </a>

                            <a href="{{route('master-data.category')}}"
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11
                               @if(request()->segment(1) == 'master-data' && request()->segment(2) == 'category') {{$active}} @endif
                               ">
                                Categories
                            </a>

                            <a href="{{route('master-data.rack')}}"
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11
                               @if(request()->segment(1) == 'master-data' && request()->segment(2) == 'rack') {{$active}} @endif
                               ">
                                Racks
                            </a>

                            <a href="{{route('master-data.sizes')}}"
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11
                                @if(request()->segment(1) == 'master-data' && request()->segment(2) == 'sizes') {{$active}} @endif">
                                Sizes
                            </a>


                            <a href="{{route('master-data.products')}}"
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11
                           @if(request()->segment(1) == 'master-data' && request()->segment(2) == 'products') {{$active}} @endif">
                                Products
                            </a>

                        </div>
                    </div>
                </li>
                <li>
                    <a href="#"
                       class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                        <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z"/>
                        </svg>
                        Reports
                    </a>
                </li>

            </ul>
        </li>
        <li>
            <div class="text-xs font-semibold leading-6 text-gray-400">Favourites</div>
            <ul role="list" class="-mx-2 mt-2 space-y-1">
                <li>
                    <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                    <a href="#"
                       class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                        <span
                                            class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">H</span>
                        <span class="truncate">Heroicons</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                        <span
                                            class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">T</span>
                        <span class="truncate">Tailwind Labs</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                        <span
                                            class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">W</span>
                        <span class="truncate">Workcation</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
