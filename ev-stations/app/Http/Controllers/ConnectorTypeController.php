<?php

namespace App\Http\Controllers;

use App\ConnectorType;
use Illuminate\Http\Request;

use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ConnectorTypeController extends Controller
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
     * @param  \App\ConnectorType  $connectorType
     * @return \Illuminate\Http\Response
     */
    public function show(ConnectorType $connectorType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConnectorType  $connectorType
     * @return \Illuminate\Http\Response
     */
    public function edit(ConnectorType $connectorType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConnectorType  $connectorType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConnectorType $connectorType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConnectorType  $connectorType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConnectorType $connectorType)
    {
        //
    }
}
