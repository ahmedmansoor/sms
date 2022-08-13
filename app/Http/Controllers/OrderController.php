<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Department;
use App\Models\Item;
use App\Models\Order;
use App\Models\Section;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $departments = Department::where('id', '<>', '')->pluck('name', 'id')->toArray();


        // get seleceted Soe
        if ($request->department_id) {
            $section = Section::where('department_id', $request->department_id)->first();

            $selectedDep = Department::all()
                ->where('id', $request->department_id)->first();

            $orders = Order::where('status', '!=', Order::DRAFT_STATUS)
                ->where('section_id', $section->id)
                ->where('status', '!=', Order::PENDING_STATUS)
                ->paginate(15);

            $requestsCount = Order::where('status', '=', Order::AUTHORISED_STATUS)
                ->where('section_id', $section->id)->count();

            $ordersCount = Order::where('status', '=', Order::APPROVED_STATUS)
                ->where('section_id', $section->id)->count();

            return view('orders-list', compact(
                'orders',
                'departments',
                'selectedDep',
                'requestsCount',
                'ordersCount'
            ));
        } else {
            $selectedDep = false;
        }

        $orders = Order::where('status', '!=', Order::DRAFT_STATUS)
            ->where('status', '!=', Order::PENDING_STATUS)
            ->paginate(15);

        $requestsCount = Order::where('status', '=', Order::AUTHORISED_STATUS)->count();
        $ordersCount = Order::where('status', '=', Order::APPROVED_STATUS)->count();

        return view(
            'orders-list',
            compact(
                'orders',
                'departments',
                'selectedDep',
                'requestsCount',
                'ordersCount'
            )
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function requests()
    {
        $orders = Order::where('section_id', auth()->user()->section_id)
            ->paginate(15);

        $requestsCount = Order::where('status', '=', Order::AUTHORISED_STATUS)
            ->where('section_id', auth()->user()->section_id)->count();

        $ordersCount = Order::where('status', '=', Order::APPROVED_STATUS)
            ->where('section_id', auth()->user()->section_id)->count();

        return view(
            'orders-requests',
            compact(
                'orders',
                'ordersCount',
                'requestsCount',
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $item = Item::where('id', '=', $request->input('id'))->first();

        // dd($item->id);
        // dd($item->qty, (int)$request->qty);
        if ((int)$request->qty > $item->qty) {
            return back()->with('error', 'Requested quantity unavailable.');
        }

        Order::create([
            'item_id' => $item->id,
            'qty' => $request->qty,
            'requested_by' => auth()->user()->id,
            'section_id' => auth()->user()->section->id,
            'remarks' => $request->remarks,
            'status' => Order::PENDING_STATUS,
        ]);

        return back()->with('success', 'New order placed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function authorise(Request $request, Order $order, $id)
    {
        $item = Order::where('id', '=', $id)->first();
        $item->status = Order::AUTHORISED_STATUS;
        $item->authorised_by = auth()->user()->id;
        $item->update();

        return back()->with('success', 'Order authorised');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request, Order $order, $id)
    {
        $order = Order::where('id', '=', $id)->first();
        // check in stock
        $item = Item::where('id', $order->item_id)->first();
        $itemAvailable = $item->qty - $order->qty;

        if ($itemAvailable < 0) {
            return back()->with('error', 'Qty requested unavailable');
        }

        $item->qty = $itemAvailable;
        $item->update();

        $order->status = Order::APPROVED_STATUS;
        $order->approved_by = auth()->user()->id;
        $order->update();

        return back()->with('success', 'Order approved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}