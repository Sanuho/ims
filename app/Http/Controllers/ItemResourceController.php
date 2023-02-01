<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Unit;
use Illuminate\Http\Request;

class ItemResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items',[
            "title"=> "Item Master",
            "base"=>"item",
            "items" =>Item::orderBy('item_cd')->filter(request(['search']))->paginate(10)->WithQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item',[
            "title"=> "Item Master Entry",
            "base"=> "item",
            "categories" =>Category::all(),
            "customer" =>Customer::all(),
            "unit" =>Unit::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData= $request->validate([
            'item_cd' => 'required|unique:items|max:255',
            'item_nm'=> ['required','min:4','max:255'],
            'cust_pn'=> 'max:255',
            'unit_id'=> 'required|numeric',
            'pck_unit_cd'=> 'required|numeric',
            'customer_id'=> 'required|numeric',
            'loc_cd'=> 'required|numeric',
            'buy_price'=> 'numeric',
            'sel_price'=> 'numeric',
            'active_flg'=> 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('item',[
            "title"=> "Item Master Entry",
            "base"=> "item",
            "item"=>$item,
            "categories" =>Category::all(),
            "customer" =>Customer::all(),
            "unit" =>Unit::all()
        ]);
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
