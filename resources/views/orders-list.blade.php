@extends('layouts.app')
@section('content')
@include ('alerts.flash-messages')


<div class="flex flex-row justify-between">
    <div>
        <h1 class="text-gray-800 text-lg">Order</h1>
        <p class="text-gray-700 text-sm">List of all orders.</p>
    </div>
    <div class="flex space-x-1">
        <div class="tracking-wide border border-gray-300 
         dark:border-gray-900 transition duration-200 bg-cool-gray-100 dark:bg-gray-800 
                dark:text-gray-400 hover:dark:text-blue-400 hover:dark:bg-gray-900 p-2 rounded-lg text-gray-500
                hover:text-primary hover:border-primary shadow flex space-x-1 text-sm w-max-content">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            <span>{{$requestsCount}}</span> Requests pending
        </div>
        <div class="tracking-wide border border-gray-300 
         dark:border-gray-900 transition duration-200 bg-cool-gray-100 dark:bg-gray-800 
                dark:text-gray-400 hover:dark:text-blue-400 hover:dark:bg-gray-900 p-2 rounded-lg text-gray-500
                hover:text-primary hover:border-primary shadow flex space-x-1 text-sm w-max-content">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            <span>{{$ordersCount}}</span> Orders
        </div>
    </div>
</div>

@if(empty($orders))
<div class="my-5 text-sm text-gray-800 dark:text-gray-400">
    No orders yet :)
</div>
@else

<form method="GET" class="flex flex-row space-x-2">
    <select name="department_id" class="bg-gray-50 

                            text-gray-900 w-full text-sm rounded-lg border focus:outline-2 outline-green-500 border-gray-300 block
                            p-2 dark:bg-gray-800 dark:border-gray-900 dark:placeholder-gray-400 dark:text-gray-400">
        @if($selectedDep)
        <option value="{{$selectedDep->id}}">{{$selectedDep->name}}</option>
        @else
        <option>All</option>
        @endif
        @foreach($departments as $item => $department)
        <option value="{{$item}}">{{$department}}</option>
        @endforeach
    </select>
    <button href=" {{ route('orders.index') }}" class="hover:bg-opacity-90
                    tracking-wide border border-green-500 transition
                    duration-200 bg-green-500 hover:bg-green-600 dark:border-green-600
                    dark:bg-green-600 hover:dark:text-green-500 hover:dark:border-green-500
                    hover:dark:bg-green-600 p-2 px-4 rounded-md text-white hover:border-green-600
                    shadow text-sm space-x-1" type="submit">
        <span>
            Search
        </span>
    </button>
    <a href="{{ route('orders.index') }}" title="Reset" class="tracking-wide border border-gray-300 
                        transition duration-200 bg-white dark:border-gray-900 dark:bg-gray-800 
                        dark:text-gray-400 hover:dark:text-gray-400 hover:dark:border-gray-400 
                        hover:dark:bg-gray-900 p-2 rounded-lg text-gray-500 hover:text-gray-600 
                        hover:border-gray-400 shadow text-sm flex flex-row">

        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M2.5 2v6h6M21.5 22v-6h-6" />
            <path d="M22 11.5A10 10 0 0 0 3.2 7.2M2 12.5a10 10 0 0 0 18.8 4.2" />
        </svg>
    </a>
</form>

<div class="container flex flex-col mt-5 w-full overflow-x-auto rounded-lg shadow">
    <table class="font-text divide-y divide-gray-200 dark:divide-gray-900">
        <thead class="text-left text-xs bg-gray-100 dark:bg-gray-900 text-gray-500 
              dark:text-gray-400 uppercase tracking-wider">
            <tr>
                <th scope="col" class="px-6 py-2 font-medium">
                    Date
                </th>
                <th scope="col" class="px-6 py-2 font-medium">
                    Qty
                </th>
                <th scope="col" class="px-6 py-2 font-medium">
                    Item
                </th>
                <th scope="col" class="px-6 py-2 font-medium">
                    Requested by
                </th>
                <th scope="col" class="px-6 py-2 font-medium">
                    Section
                </th>
                <th scope="col" class="px-6 py-2 font-medium">
                    Status
                </th>
                <th scope="col" class="px-6 py-2 font-medium">
                    Action
                </th>
                <th scope="col" class="px-6 py-2 font-medium">
                    Authorised by
                </th>
            </tr>
        </thead>
        @foreach($orders->sortByDesc('created_at') as $order)
        <td class="px-6 py-2">{{ \Carbon\Carbon::parse($order->created_at)->format('d-M-Y') }}</td>
        <td class="px-6 py-2">{{ $order->qty}}</td>
        <td class="px-6 py-2">{{ $order->items->name }}</td>
        <td class="px-6 py-2">{{ $order->requestedUser->name}}</td>
        <td class="px-6 py-2">{{ $order->section->name }}</td>
        <td class="px-6 py-2">
            @if ($order->status == 1)
            <span class="text-blue-700 bg-blue-100 p-1.5 px-2 rounded-lg text-xs">
                Pending approval
            </span>
            @endif
            @if ($order->status == 2)
            <span class="text-cyan-700 bg-cyan-100 p-1.5 px-2 rounded-lg text-xs">
                Authorised
            </span>
            @endif
            @if ($order->status == 3)
            <span class="text-green-700 bg-green-100 p-1.5 px-2 rounded-lg text-xs">
                Approved
            </span>
            @endif
            @if ($order->status == 4)
            <span class="text-orange-700 bg-orange-100 p-1.5 px-2 rounded-lg text-xs">
                Rejected
            </span>
            @endif
        </td>
        @if ($order->status == 2)
        <td class="px-6 py-2">
            <form action="{{route('orders.approve', $order->id)}}" method="POST" title="Authorise request" class="tracking-wide border 
                                border-gray-100 dark:border-gray-600 hover:border-red-800 transition duration-200 p-1 rounded text-gray-300 
                                hover:text-red-800 hover:bg-red-50 flex space-x-2">
                @csrf
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Approve
                </button>
            </form>
        </td>
        @else
        <td class="px-6 py-2"></td>
        @endif
        @if ($order->status == 2)
        <td class="px-6 py-2">{{$order->authorisedUser->name}}</td>
        @else
        <td class="px-6 py-2"></td>
        @endif

        </tbody>
        @endforeach
    </table>
</div>
<div class="my-10 p-2 rounded-md">
    {{ $orders->links() }}
</div>

{{-- modals --}}
{{-- @include('modals.order-add') --}}

@endif
@stop
