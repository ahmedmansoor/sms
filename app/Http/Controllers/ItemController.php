<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\StoreStockRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->category) {
            $items = Item::where('item_category_id', $request->category)->paginate(15);
            return view('items-list', compact('items'));
        }
        $items = Item::orderBy('created_at', 'desc')->paginate(15);
        return view('items-list', compact('items'));
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
    public function store(StoreItemRequest $request)
    {
        Item::create([
            'name' => $request->name,
            'item_category_id' => $request->item_category_id,
            'brand' => $request->brand,
            'qty' => $request->qty,
            'remarks' => $request->remarks,
            'received_by' => auth()->user()->id,
            'status' => Item::AVAILABLE_STATUS,
        ]);

        return back()->with('success', 'New item added.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stock(StoreStockRequest $request)
    {
        $item = Item::where('id', '=', $request->input('id'))->first();
        $qtyAdded = $request->input('qty') + $item->qty;
        $item->qty = $qtyAdded;

        $item->update();

        return back()->with('success', 'New stock added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}