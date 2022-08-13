@extends('layouts.app')
@section('content')
@include ('alerts.flash-messages')


<div class="flex flex-row justify-between">
    <div class="flex flex-row justify-between">
        <div class="mb-5 space-y-2">
            <h1 class="text-gray-800 text-2xl font-semibold">Requests</h1>
            <p class="text-gray-500 text-sm">List of all requests of {{auth()->user()->section->name}}</p>
        </div>
    </div>

    <div class="flex flex-row self-end space-x-4 w-max">
        <div class="flex space-x-1 text-gray-500 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>
                Pending requests: <span class="font-semibold bg-orange-100 p-1 px-2 rounded-md text-orange-500">{{$requestsCount}}</span>
            </span>
        </div>
        <div class="flex space-x-1 text-gray-500 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>
            <span>
                Total order: <span class="font-semibold bg-orange-100 p-1 px-2 rounded-md text-orange-500">{{$ordersCount}}</span>
            </span>
        </div>
    </div>
</div>

@if(empty($orders))
<div class="my-5 text-sm text-gray-800 dark:text-gray-400">
    No orders yet :)
</div>
@else

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
        <td class="px-6 py-2">
            @if ($order->status == 1)
            <span class="text-blue-500 bg-blue-100 p-1.5 px-2 rounded-lg text-xs">
                Pending
            </span>
            @endif
            @if ($order->status == 2)
            <span class="text-cyan-600 bg-cyan-100 p-1.5 px-2 rounded-lg text-xs">
                Authorised
            </span>
            @endif
            @if ($order->status == 3)
            <span class="text-green-500 bg-green-100 p-1.5 px-2 rounded-lg text-xs">
                Approved
            </span>
            @endif
            @if ($order->status == 4)
            <span class="text-orange-500 bg-orange-100 p-1.5 px-2 rounded-lg text-xs">
                Rejected
            </span>
            @endif
        </td>
        @if ($order->status == 1)
        <td class="px-6 py-2">
            @role('super-admin|admin|inventory-clerk')
            <form action="{{route('orders.authorise', $order->id)}}" method="POST" title="Authorise request" class="tracking-wide
                hover:bg-green-100 dark:border-green-900 transition duration-200 dark:bg-green-800 
                hover:text-green-600 hover:dark:text-blue-400 hover:dark:bg-green-900 p-1 px-2 rounded-lg text-gray-500
                 flex space-x-1 text-sm w-max-content border bg-border hover:bg-border-500">
                @csrf
                <button type="submit" class="flex space-x-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>
                        Authorise
                    </span>
                </button>
            </form>
            @endrole

        </td>
        @else
        <td class="px-6 py-2"></td>
        @endif
        @if ($order->status == 3)
        <td class="px-6 py-2">{{$order->approvedUser->name}}</td>
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
