@extends('layouts.app')
@section('content')
@include ('alerts.flash-messages')

<div class="mb-5 space-y-2">
    <h1 class="text-gray-800 text-2xl font-semibold">Items</h1>
    <p class="text-gray-700 text-sm">List of all items in stock.</p>
</div>

<div class="flex flex-row justify-between">
    <div>
        <button data-modal-toggle="modalAddItem" type="button" class="text-white bg-orange-500 
                    hover:bg-opacity-80 p-2  text-sm px-3 rounded-md" type="submit">
            <span>
                New Item
            </span>
        </button>
    </div>
    <div class="flex space-x-2">
        <form method="GET">
            <button href="{{ route('items.index') }}" class="text-gray-600 bg-gray-100 
                    hover:bg-opacity-80 p-2  text-sm px-3 rounded-full" type="submit">
                <span>
                    All
                </span>
            </button>
        </form>
        <form method="GET">
            <input hidden name="category" value="1" type="text">
            <button href="{{ route('items.index') }}" class="text-orange-500 bg-orange-100 
                    hover:bg-opacity-80 p-2  text-sm px-3 rounded-full" type="submit">
                <span>
                    Computer Technology
                </span>
            </button>
        </form>
        <form method="GET">
            <input hidden name="category" value="2" type="text">
            <button href="{{ route('items.index') }}" class="text-orange-500 bg-orange-100 
                    hover:bg-opacity-80 p-2  text-sm px-3 rounded-full" type="submit">
                <span>
                    Computer Accessories
                </span>
            </button>
        </form>

        <form method="GET">
            <input hidden name="category" value="3" type="text">
            <button href="{{ route('items.index') }}" class="text-orange-500 bg-orange-100 
                    hover:bg-opacity-80 p-2  text-sm px-3 rounded-full" type="submit">
                <span>
                    Office Machines
                </span>
            </button>
        </form>

        <form method="GET">
            <input hidden name="category" value="4" type="text">
            <button href="{{ route('items.index') }}" class="text-orange-500 bg-orange-100 
                    hover:bg-opacity-80 p-2  text-sm px-3 rounded-full" type="submit">
                <span>
                    Office Furniture Supplies
                </span>
            </button>
        </form>

        <form method="GET">
            <input hidden name="category" value="5" type="text">
            <button href="{{ route('items.index') }}" class="text-orange-500 bg-orange-100 
                    hover:bg-opacity-80 p-2  text-sm px-3 rounded-full" type="submit">
                <span>
                    Office Essentials
                </span>
            </button>
        </form>
        <form method="GET">
            <input hidden name="category" value="6" type="text">
            <button href="{{ route('items.index') }}" class="text-orange-500 bg-orange-100 
                    hover:bg-opacity-80 p-2  text-sm px-3 rounded-full" type="submit">
                <span>
                    Breakroom
                </span>
            </button>
        </form>
    </div>
</div>

@if(empty($items))
<div class="my-5 text-sm text-gray-800 dark:text-gray-400">
    No items found :)
</div>
@else

<div class="container flex flex-col mt-5 w-full overflow-x-auto rounded-lg shadow">
    <table class="font-text divide-y divide-gray-200 dark:divide-gray-900">
        <thead class="text-left text-xs bg-gray-100 dark:bg-gray-900 text-gray-500 
              dark:text-gray-400 uppercase tracking-wider">
            <tr>
                <th scope="col" class="px-6 py-2 font-medium">
                    Name
                </th>
                {{-- <th scope="col" class="px-6 py-2 font-medium">
                    Brand
                </th> --}}
                <th scope="col" class="px-6 py-2 font-medium">
                    Category
                </th>
                <th scope="col" class="px-6 py-2 font-medium">
                    Remarks
                </th>
                <th scope="col" class="px-6 py-2 font-medium">
                    In Stock
                </th>
                <th scope="col" class="px-6 py-2 font-medium">
                    Actions
                </th>
            </tr>
        </thead>
        @foreach($items as $item)
        <td class="px-6 py-2">{{ $item->name }}</td>
        {{-- <td class="px-6 py-2">{{ $item->brand}}</td> --}}
        <td class="px-6 py-2">{{ $item->category->name }}</td>
        <td class="px-6 py-2">{{ $item->remarks }}</td>
        @if($item->qty == '0')
        <td class="px-6 py-2"><span class="p-1 px-2 bg-gray-100 rounded-lg text-xs">Out of stock</span></td>

        @else
        <td class="px-6 py-2 text-center">{{ $item->qty }}</td>
        @endif
        <td class="flex flex-row space-x-1 p-2">
            <button onclick="btnModalPlaceOrder('{{$item->id}}','{{$item->name}}' , '{{$item->qty}}')" data-modal-toggle="modalPlaceOrder" type="button" class="tracking-wide
                hover:bg-gray-100 
         dark:border-gray-900 transition duration-200 dark:bg-gray-800 
                dark:text-gray-400 hover:dark:text-blue-400 hover:dark:bg-gray-900 p-1 px-2 rounded-lg text-gray-500
                 flex space-x-1 text-sm w-max-content">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-7a2 2 0 012-2h2m3-4H9a2 2 0 00-2 2v7a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-1m-1 4l-3 3m0 0l-3-3m3 3V3" />
                </svg>
                <span>Order</span>
            </button>
            @role('super-admin|admin|inventory-clerk')
            <button onclick="btnModalAddStock('{{$item->id}}','{{$item->name}}')" data-modal-toggle="modalAddStock" type="button" class="tracking-wide
                hover:bg-gray-100 
         dark:border-gray-900 transition duration-200 dark:bg-gray-800 
                dark:text-gray-400 hover:dark:text-blue-400 hover:dark:bg-gray-900 p-1 px-2 rounded-lg text-gray-500
                 flex space-x-1 text-sm w-max-content">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span>Add Stock</span>
            </button>
            @endrole
        </td>
        </tbody>
        @endforeach
    </table>
</div>
<div class="my-10 p-2 rounded-md">
    {{ $items->links() }}
</div>

@include('modals.item-add')
@include('modals.stock-add')
@include('modals.order-add')

@endif
@stop
