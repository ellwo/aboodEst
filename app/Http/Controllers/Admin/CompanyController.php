<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


        $companies=Company::all();
        return view('backend.pages.componies.index',['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('backend.pages.componies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'img'=>'required',

        ]);

        Company::create([
            'img'=>$request['img'],
            'name'=>$request['name'],
            'link'=>$request['link']
        ]);

        return redirect()->route('companies')->with('status','تم تعديل الخدمة ينجاح ');
    }


    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {

        return view('backend.pages.componies.edit',['co'=>$company]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //

        $this->validate($request,[
            'img'=>'required',

        ]);

       $company->update([
            'img'=>$request['img'],
            'name'=>$request['name'],
            'link'=>$request['link']
        ]);

        return redirect()->route('companies')->with('status','تم تعديل الخدمة ينجاح ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {

        $company->delete();

        return redirect()->route('companies')->with('status','تم حذف السجل بنجاح');

        //
    }
}
