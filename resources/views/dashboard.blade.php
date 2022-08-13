@extends('layouts.app')
@section('content')
@include ('alerts.flash-messages')

<div class="mb-5 space-y-2">
    <h1 class="text-gray-800 text-2xl font-semibold">Hi, {{auth()->user()->name}}</h1>
    <p class="text-gray-700 text-sm">Good evening.</p>
</div>

<div class="container flex flex-row justify-center space-x-10">
    <div class="flex flex-col bg-orange-50 border-orange-300 text-center justify-center px-5 border rounded-md h-52">
        <h2 class="text-3xl font-bold">{{$invetoryCount}}</h2>
        <p class="text-gray-600 text-sm">Total inventory in stock</p>
    </div>
    <div class="flex flex-col bg-orange-50 border-orange-300 text-center justify-center px-5 border rounded-md h-52">
        <h2 class="text-3xl font-bold">{{$itemCount}}</h2>
        <p class="text-gray-600 text-sm">Types of different items</p>
    </div>
    <div class="flex flex-col bg-orange-50 border-orange-300 text-center justify-center px-5 border rounded-md h-52">
        <h2 class="text-3xl font-bold">{{$orderCount}}</h2>
        <p class="text-gray-600 text-sm">Total orders delivered</p>
    </div>
    <div class="flex flex-col bg-orange-50 border-orange-300 text-center justify-center px-5 border rounded-md h-52">
        <h2 class="text-3xl font-bold">{{$requestCount}}</h2>
        <p class="text-gray-600 text-sm">Requests pending approval</p>
    </div>
</div>

@stop
