<?php

namespace App\Http\Controllers;

use App\Models\SalesDetail;
use App\Http\Requests\StoreSalesDetailRequest;
use App\Http\Requests\UpdateSalesDetailRequest;

class SalesDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreSalesDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesDetail  $salesDetail
     * @return \Illuminate\Http\Response
     */
    public function show(SalesDetail $salesDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesDetail  $salesDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesDetail $salesDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalesDetailRequest  $request
     * @param  \App\Models\SalesDetail  $salesDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalesDetailRequest $request, SalesDetail $salesDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesDetail  $salesDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesDetail $salesDetail)
    {
        //
    }
}
