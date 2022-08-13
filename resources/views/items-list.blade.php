@extends('layouts.app')
@section('content')
@include ('alerts.flash-messages')

<h1 class="text-gray-800 text-lg">Items</h1>
<p class="text-gray-700 text-sm">List of all items.</p>

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
                <th scope="col" class="px-6 py-2 font-medium">
                    Brand
                </th>
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
        @foreach($items->sortByDesc('created_at') as $item)
        <td class="px-6 py-2">{{ $item->name }}</td>
        <td class="px-6 py-2">{{ $item->brand}}</td>
        <td class="px-6 py-2">{{ $item->category->name }}</td>
        <td class="px-6 py-2">{{ $item->remarks }}</td>
        <td class="px-6 py-2">{{ $item->qty }}</td>
        <td class="flex flex-row space-x-1">
            <button onclick="btnModalPlaceOrder('{{$item->id}}','{{$item->name}}' , '{{$item->qty}}')" data-modal-toggle="modalPlaceOrder" type="button" class="tracking-wide border border-gray-300 
         dark:border-gray-900 transition duration-200 bg-cool-gray-100 dark:bg-gray-800 
                dark:text-gray-400 hover:dark:text-blue-400 hover:dark:bg-gray-900 p-2 rounded-lg text-gray-500
                hover:text-primary hover:border-primary shadow flex space-x-1 text-sm w-max-content">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span>Order</span>
            </button>

            <button onclick="btnModalAddStock('{{$item->id}}','{{$item->name}}')" data-modal-toggle="modalAddStock" type="button" class="tracking-wide border border-gray-300 
         dark:border-gray-900 transition duration-200 bg-cool-gray-100 dark:bg-gray-800 
                dark:text-gray-400 hover:dark:text-blue-400 hover:dark:bg-gray-900 p-2 rounded-lg text-gray-500
                hover:text-primary hover:border-primary shadow flex space-x-1 text-sm w-max-content">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span>Add Stock</span>
            </button>
        </td>
        </tbody>
        @endforeach
    </table>
</div>
<div class="my-10 p-2 rounded-md">
    {{ $items->links() }}
</div>

@include('modals.stock-add')
@include('modals.order-add')

@endif
@stop
