<aside class="sidebar w-56 bg-white shadow-xl min-h-screen">
    <section>
        <header class="flex-col space-y-3 fixed h-screen">
            <div class="p-3 flex flex-row space-x-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="6" y="4" width="4" height="16"></rect>
                    <rect x="14" y="4" width="4" height="16"></rect>
                </svg>
                <h1 class="text-xl font-extrabold">PMS</h1>
            </div>
            <nav class="text-sm bg-white w-min">
                <ul class="py-1 space-y-2">
                    <li>
                        <a href=" {{ route('dashboard.index') }}" class="{{(request()->is('*/')) ? 'dark:shadow w-full
                    flex items-center p-2 text-gray-500 bg-gray-50 border border-gray-300 dark:border-gray-600 
                    dark:text-gray-300 rounded-lg dark:bg-opacity-5 space-x-2':
                    'flex items-center w-full
                    p-2 text-gray-500 rounded-lg dark:text-gray-300 border hover:border-gray-300 space-x-2 
                    border-white dark:border-gray-900 dark:hover:border-gray-700'}}">
                            <svg xmlns=" http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span>
                                Dashboard
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href=" {{ route('items.index') }}" class="{{(request()->is('*/items')) ? 'dark:shadow w-full
                    flex items-center p-2 text-gray-500 bg-gray-50 border border-gray-300 dark:border-gray-600 
                    dark:text-gray-300 rounded-lg dark:bg-opacity-5 space-x-2':
                    'flex items-center w-full
                    p-2 text-gray-500 rounded-lg dark:text-gray-300 border hover:border-gray-300 space-x-2 
                    border-white dark:border-gray-900 dark:hover:border-gray-700'}}">
                            <svg xmlns=" http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span>
                                Items
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href=" {{ route('requests.index') }}" class="{{(request()->is('*/requests')) ? 'dark:shadow w-full
                    flex items-center p-2 text-gray-500 bg-gray-50 border border-gray-300 dark:border-gray-600 
                    dark:text-gray-300 rounded-lg dark:bg-opacity-5 space-x-2':
                    'flex items-center w-full
                    p-2 text-gray-500 rounded-lg dark:text-gray-300 border hover:border-gray-300 space-x-2 
                    border-white dark:border-gray-900 dark:hover:border-gray-700'}}">
                            <svg xmlns=" http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span>
                                Requests
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href=" {{ route('orders.index') }}" class="{{(request()->is('*/orders')) ? 'dark:shadow w-full
                    flex items-center p-2 text-gray-500 bg-gray-50 border border-gray-300 dark:border-gray-600 
                    dark:text-gray-300 rounded-lg dark:bg-opacity-5 space-x-2':
                    'flex items-center w-full
                    p-2 text-gray-500 rounded-lg dark:text-gray-300 border hover:border-gray-300 space-x-2 
                    border-white dark:border-gray-900 dark:hover:border-gray-700'}}">
                            <svg xmlns=" http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span>
                                Orders
                            </span>
                        </a>
                    </li>

                </ul>
            </nav>

        </header>
    </section>
</aside>
