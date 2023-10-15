<?php

namespace App\Http\Controllers\Admin;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $addresses=Address::all();

        return view('backend.pages.addresses.index',[
            'addresses'=>$addresses
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.pages.addresses.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request,[

            'name'=>'required',
            'phone'=>'required',
            'st_name'=>'required',
            'address'=>'required'
        ]);

        Address::create([
         'name'=>$request['name'],
         'city_id'=>$request['city_id'],
         'map_link'=>$request['map_link'],
         'address'=>$request['st_name']."-".$request['address'],
         'phone'=>$request['phone']
        ]);


        return redirect()->route('addresses')->with('status','تم اضافة السجل بنجاح');


        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        return view('backend.pages.addresses.edit',['ad'=>$address]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        //


        $this->validate($request,[

            'name'=>'required',
            'phone'=>'required',
            'st_name'=>'required',
            'address'=>'required'
        ]);

       $address->update([
         'name'=>$request['name'],
         'city_id'=>$request['city_id'],
         'map_link'=>$request['map_link'],
         'address'=>$request['st_name']."-".$request['address'],
         'phone'=>$request['phone']
        ]);


        return redirect()->route('addresses')->with('status','تم تعديل السجل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        //

        $address->delete();

        return redirect()->route('addresses')->with('status','تم حذف السجل بنجاح');

    }
}
