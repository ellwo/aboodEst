<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $counters=Counter::all();
        return view('backend.pages.counters.index',[
            'counters'=>$counters
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.pages.counters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'titel'=>['required'],
            'img'=>['required'],
            'value'=>['required','min:1','numeric']
        ]);

        Counter::create(
            [
                'titel'=>$request['titel'],
                'img'=>$request['img'],
                'value'=>$request['value']
            ]
            );

            return redirect()->route('counters')->with('status','تم اضافة السجل  ينجاح ');

    }

    /**
     * Display the specified resource.
     */
    public function show(Counter $counter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Counter $counter)
    {
        //
        return view('backend.pages.counters.edit',['counter'=>$counter]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Counter $counter)
    {
        //

        $this->validate($request,[
            'titel'=>['required'],
            'img'=>['required'],
            'value'=>['required','min:1','numeric']
        ]);

        $counter->update(            [
                'titel'=>$request['titel'],
                'img'=>$request['img'],
                'value'=>$request['value']
            ]
            );

            return redirect()->route('counters')->with('status','تم تعديل السجل  ينجاح ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Counter $counter)
    {

        $counter->delete();
        //

        return redirect()->route('counters')->with('status','تم حذف السجل  ينجاح ');

    }
}
