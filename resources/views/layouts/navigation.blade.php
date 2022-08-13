<aside class="sidebar w-56 bg-white border-r min-h-screen">
    <section>
        <header class="flex-col space-y-3 fixed h-screen w-56 px-2">

            <div class="px-2 mt-4 flex flex-row space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                </svg>
                <h1 class="text-xl font-extrabold">SMS</h1>
            </div>
            <nav class="text-sm bg-white w-full">
                <ul class="py-1 space-y-2 w-full">
                    @role('super-admin|admin|inventory-clerk')
                    <li>
                        {{-- {{dd(request())}} --}}
                        <a href=" {{ route('dashboard.index') }}" class="{{(\Route::current()->getName() == 'dashboard.index') ? 'dark:shadow w-full
                    flex items-center p-2 text-orange-500 bg-orange-100 dark:border-gray-600 
                    dark:text-gray-300 rounded-lg dark:bg-opacity-5 space-x-2':'flex items-center w-full
                    p-2 text-gray-500 rounded-lg dark:text-gray-300 border hover:border-gray-300 space-x-2 
                    border-white dark:border-gray-900 dark:hover:border-gray-700'}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                            <span>
                                Dashboard
                            </span>
                        </a>
                    </li>
                    @endrole

                    <li>
                        <a href=" {{ route('items.index') }}" class="{{(\Route::current()->getName() == 'items.index') ? 'dark:shadow w-full
                    flex items-center p-2 text-orange-500 bg-orange-100 dark:border-gray-600 
                    dark:text-gray-300 rounded-lg dark:bg-opacity-5 space-x-2':'flex items-center w-full
                    p-2 text-gray-500 rounded-lg dark:text-gray-300 border hover:border-gray-300 space-x-2 
                    border-white dark:border-gray-900 dark:hover:border-gray-700'}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span>
                                Items
                            </span>
                        </a>
                    </li>
                    {{-- {{dd(\Route::current()->getName())}} --}}

                    <li>
                        <a href=" {{ route('requests.index') }}" class="{{(\Route::current()->getName() == 'requests.index') ? 'dark:shadow w-full
                    flex items-center p-2 text-orange-500 bg-orange-100 dark:border-gray-600 
                    dark:text-gray-300 rounded-lg dark:bg-opacity-5 space-x-2':'flex items-center w-full
                    p-2 text-gray-500 rounded-lg dark:text-gray-300 border hover:border-gray-300 space-x-2 
                    border-white dark:border-gray-900 dark:hover:border-gray-700'}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                            </svg>
                            <span>
                                Requests
                            </span>
                        </a>
                    </li>

                    @role('super-admin|admin|inventory-clerk')
                    <li>
                        <a href=" {{ route('orders.index') }}" class="{{(\Route::current()->getName() == 'orders.index') ? 'dark:shadow w-full
                    flex items-center p-2 text-orange-500 bg-orange-100 dark:border-gray-600 
                    dark:text-gray-300 rounded-lg dark:bg-opacity-5 space-x-2':'flex items-center w-full
                    p-2 text-gray-500 rounded-lg dark:text-gray-300 border hover:border-gray-300 space-x-2 
                    border-white dark:border-gray-900 dark:hover:border-gray-700'}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            <span>
                                Orders
                            </span>
                        </a>
                    </li>
                    @endrole
                </ul>
            </nav>

        </header>
    </section>
</aside>
