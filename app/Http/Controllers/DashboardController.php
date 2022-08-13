<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orderCount = Order::where('status', Order::APPROVED_STATUS)->count();
        $requestCount = Order::where('status', Order::AUTHORISED_STATUS)->count();
        $itemCount = Item::all()->count();
        $invetoryCount = Item::all()->sum('qty');

        return view(
            'dashboard',
            compact(
                'orderCount',
                'itemCount',
                'requestCount',
                'invetoryCount'
            )
        );
    }
}