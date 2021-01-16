<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\NetworkTypes;
use Illuminate\Http\Request;

use Gate;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class NetworkTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $networktypes= NetworkTypes::paginate(10);
        return view('admin.networktype.index',compact('networktypes'));
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
     * @param  \App\NetworkTypes  $networkTypes
     * @return \Illuminate\Http\Response
     */
    public function show(NetworkTypes $networkTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NetworkTypes  $networkTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(NetworkTypes $networkTypes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NetworkTypes  $networkTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NetworkTypes $networkTypes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NetworkTypes  $networkTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(NetworkTypes $networkTypes)
    {
        //
    }
}
