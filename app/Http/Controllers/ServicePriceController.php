<?php

namespace App\Http\Controllers;

use App\Models\ServicePrice;
use Illuminate\Http\Request;

class ServicePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $service_prices=ServicePrice::all();
        return view('pages.service-prices.index',[
            'service_prices'=>$service_prices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //]
    }

    /**
     * Display the specified resource.
     */
    public function show(ServicePrice $servicePrice)
    {
        //
        return view('pages.service-prices.show',['post'=>$servicePrice]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServicePrice $servicePrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServicePrice $servicePrice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServicePrice $servicePrice)
    {
        //
    }
}
