<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicePart;
use Illuminate\Http\Request;

class ServicePartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        return view('backend.pages.service-parts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ServicePart $servicePart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServicePart $servicePart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServicePart $servicePart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServicePart $servicePart)
    {
        //
    }
}
