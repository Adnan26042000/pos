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
                    <a href="#"
                       class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                        <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                        </svg>
                        Team
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                        <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z"/>
                        </svg>
                        Projects
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                        <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                        </svg>
                        Calendar
                    </a>
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
                                Rack
                            </a>

                            <a href=""
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11">
                                Sizes
                            </a>


                            <a href=""
                               class="text-gray-400 hover:bg-gray-700 hover:text-white group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold pl-11">
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
            <div class="text-xs font-semibold leading-6 text-gray-400">Your teams</div>
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
