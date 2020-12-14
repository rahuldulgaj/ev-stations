<?php

namespace App\Http\Controllers;

use App\AutomatedStatus;
use Illuminate\Http\Request;
use Gate;
use Brian2694\Toastr\Facades\Toastr;

class AutomatedStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $automatedstatus= AutomatedStatus::paginate(15);
        return view('admin.automatedstatus.index',compact('automatedstatus'));
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
     * @param  \App\AutomatedStatus  $automatedStatus
     * @return \Illuminate\Http\Response
     */
    public function show(AutomatedStatus $automatedStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AutomatedStatus  $automatedStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(AutomatedStatus $automatedStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AutomatedStatus  $automatedStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AutomatedStatus $automatedStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AutomatedStatus  $automatedStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(AutomatedStatus $automatedStatus)
    {
        //
    }
}
