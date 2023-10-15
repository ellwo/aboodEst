<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
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
        return view('backend.pages.service-prices.index',[
            'service_prices'=>$service_prices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


        if(isset($request['copy'])){


            $se=ServicePrice::find($request['copy']);
        $services=Service::all();
        return view('backend.pages.service-prices.copy',[
            'services'=>$services,
            'se'=>$se
        ]);
        }
        $services=Service::all();
        return view('backend.pages.service-prices.create',[
            'services'=>$services
        ]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //]
        $this->validate($request,[
            'titel'=>'required',
            'price'=>'required|numeric',

        ]);
        ServicePrice::create([
            'titel'=>$request['titel'],
            'price'=>$request['price'],
            'active'=>$request['active'],
            'note'=>$request['note'],
            'service_id'=>$request['service_id']
        ]);


        return redirect()->route('service_prices')->with('status','تم اضافة السجل بنجاح');
    }
 //


    /**
     * Display the specified resource.
     */
    public function show(ServicePrice $servicePrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServicePrice $servicePrice)
    {
        $services=Service::all();

        return view('backend.pages.service-prices.edit',['se'=>$servicePrice,
    'services'=>$services]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServicePrice $servicePrice)
    {

        $this->validate($request,[
            'titel'=>'required',
            'price'=>'required|numeric',
        ]);
       $servicePrice->update([
            'titel'=>$request['titel'],
            'price'=>$request['price'],
            'active'=>$request['active'],
            'note'=>$request['note'],
            'service_id'=>$request['service_id']
        ]);


        return redirect()->route('service_prices')->with('status','تم اضافة السجل بنجاح');

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
