<?php

namespace App\Http\Controllers;

use App\BrandType;
use Illuminate\Http\Request;

class BrandTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands= BrandType::paginate(15);
        return view('admin.brand.index',compact('brands'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BrandType  $brandType
     * @return \Illuminate\Http\Response
     */
    public function show(BrandType $brandType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BrandType  $brandType
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandType $brandType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrandType  $brandType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrandType $brandType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BrandType  $brandType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandType $brandType)
    {
        //
    }
}
