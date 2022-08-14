<!-- Main modal -->
<div id="modalAddStock" tabindex="-1" aria-hidden="true" class="font-text fixed top-0 left-0 right-0 z-50 hidden 
    w-full overflow-x-hidden bg-gray-700 backdrop-blur-sm bg-opacity-10 overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-96 h-full md:h-auto -mt-44">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="modalAddStock">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="py-6 px-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Enter New Stock</h3>
                <form role="form" action="{{ route('items.stock') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input id="itemId" hidden type="text" name="id">
                    <div class="modal-body divide-y divide-slate-200">
                        <div class="-mt-1 flex space-y-1 flex-col justify-between py-2 w-full">
                            <label class="mt-3 text-xs text-gray-500 dark:text-gray-300">Name</label>
                            <input id="itemName" name="name" readonly class="bg-white rounded-lg outline-none w-full">
                        </div>
                        <div class="-mt-1 flex flex-col justify-between py-2 w-full">
                            <div class="flex flex-row justify-between">
                                <label class="mt-3 text-xs text-gray-500 dark:text-gray-300">Qty</label>
                            </div>
                            <div class="w-full">
                                <input id="qty" name="qty" type="number" required class="bg-gray-200 rounded-lg outline-none w-full
                                        focus-within:outline border-none focus:outline-orange-500 p-2 my-2 mt-4">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-5 space-x-1">
                        <button type="submit" class="text-white bg-orange-500
                        hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-200 rounded-lg border
                        border-orange-200 text-sm font-medium px-5 py-2.5 focus:z-10
                        dark:bg-orange-700 dark:text-orange-300 dark:border-orange-500 dark:hover:text-white
                        dark:hover:bg-orange-600 dark:focus:ring-orange-600">Add</button>
                        <button data-modal-toggle="modalAddStock" type="button" class="text-gray-500 bg-white 
                        hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border 
                        border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 
                        dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white 
                        dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
