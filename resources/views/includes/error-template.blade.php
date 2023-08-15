<div>
    <div>
        {{--pop up--}}
        <div aria-live="assertive"
             x-data="{errorPopup: false }"
             class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6 z-50">
            <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
                <div x-on:error.window="errorPopup = true; setTimeout(()=>errorPopup = false,5000); errorPopup = true;"
                     x-show="errorPopup"
                     class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5 bg-red-100"
                     x-transition:enter="transform ease-out duration-300 transition"
                     x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                     x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                >
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-red-400" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                <p class="text-sm font-medium text-gray-900">Error</p>
                                @if($errors->any())
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li class="mt-1 text-sm text-gray-500">{{$error}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="ml-4 flex flex-shrink-0">
                                <button type="button"
                                        @click="errorPopup=false"
                                        class="inline-flex rounded-md  text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <span class="sr-only">Close</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--success message--}}
        <div aria-live="assertive"
             class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6 z-50"
             x-data="{successPopup: false}">
            <div class="flex w-full flex-col items-center space-y-4 sm:items-end">

                <div
                    class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5 bg-green-100"
                    x-on:success.window="successPopup = true; setTimeout(()=>successPopup = false,5000);"
                    x-show="successPopup"
                    x-transition:enter="transform ease-out duration-300 transition"
                    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                >
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-0.5">
                                <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                     stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div class="ml-3 w-0 flex-1 ">
                                @if(!empty($success))
                                    <p class="mt-1 text-sm text-gray-900">{{$success}}</p>
                                @endif
                            </div>
                            <div class="ml-4 flex flex-shrink-0">
                                <button type="button"
                                        @click="successPopup=false"
                                        class="inline-flex rounded-md  text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mt-0.5">
                                    <span class="sr-only">Close</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    cards--}}
    <div>
        @if($errors->any())
            <div class="px-6 mt-6">
                <div class="rounded-md bg-red-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor"
                                 aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">There {{$errors->count() == 1?'was':'were'}}
                                {{$errors->count()}} {{$errors->count() == 1?'error':'errors'}} with your
                                submission</h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul role="list" class="list-disc space-y-1 pl-5">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

{{--        @if(!empty($success)  || session()->has('success'))--}}
{{--            <div class="px-6 mt-6">--}}
{{--                <div class="rounded-md bg-green-50 p-4">--}}
{{--                    <div class="flex">--}}
{{--                        <div class="flex-shrink-0">--}}
{{--                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor"--}}
{{--                                 aria-hidden="true">--}}
{{--                                <path fill-rule="evenodd"--}}
{{--                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"--}}
{{--                                      clip-rule="evenodd"/>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="ml-3">--}}
{{--                            @if(!empty($success))--}}
{{--                                <p class="text-sm font-medium text-green-800">{{$success}}</p>--}}
{{--                            @else--}}
{{--                                <p class="text-sm font-medium text-green-800">{{session('success')}}</p>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <div class="ml-auto pl-3">--}}
{{--                            <div class="-mx-1.5 -my-1.5">--}}
{{--                                <button type="button"--}}
{{--                                        class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">--}}
{{--                                    <span class="sr-only">Dismiss</span>--}}
{{--                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
{{--                                        <path--}}
{{--                                            d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>--}}
{{--                                    </svg>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
    </div>
</div>
