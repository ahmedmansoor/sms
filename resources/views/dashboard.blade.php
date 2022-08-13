@extends('layouts.app')
@section('content')
@include ('alerts.flash-messages')


<h1 class="text-gray-800 text-lg">Items</h1>
<p class="text-gray-700 text-sm">List of all items.</p>


<div class="container flex flex-col mt-5 w-full overflow-x-auto rounded-lg shadow">
    <span>Total Inventory in stock: {{$invetoryCount}}</span>
    <span>{{$itemCount}} types of items</span>


    <span>Orders qty: {{$orderCount}}</span>
    <span>Requests Pending Approval: {{$requestCount}}</span>




</div>

@stop
