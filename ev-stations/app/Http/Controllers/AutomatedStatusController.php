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
        $automatedstatus= AutomatedStatus::simplePaginate(15);
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
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
       // $statelist = State::all();
        return view('admin.automatedstatus.create');
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
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'name' => 'required|unique:automated_status|max:255',
            'status' => 'required',
    ]);
        
      
        $automatedStatus = new AutomatedStatus();
        $automatedStatus->name = $request->name; 
        $automatedStatus->status = $request->status;
      //  $automatedStatus->slug= str_slug($request->name);
      //  $automatedStatus->status = $request ->status == 'active'?1:0;
        $automatedStatus-> save();
        Toastr::success('Automated Status successfully added!','Success');
        return redirect()->route('automatedstatus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AutomatedStatus  $automatedStatus
     * @return \Illuminate\Http\Response
     */
    public function show(AutomatedStatus $automatedstatus)
    {
        //
        $automatedStatus = AutomatedStatus::where('id', $automatedstatus->id)->first();
        return view('admin.automatedstatus.show',compact('automatedStatus'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AutomatedStatus  $automatedStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(AutomatedStatus $automatedstatus)
    {
        //
        //dd($automatedStatus);
        $automatedStatus =  AutomatedStatus::find($automatedstatus->id);
       // dd($automatedstatus);
//$automatedStatus = AutomatedStatus::where('automated_status.id', $automatedStatus->id)->first();
        return view('admin.automatedstatus.edit',compact('automatedStatus'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AutomatedStatus  $automatedStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AutomatedStatus $automatedstatus)
    {
        //
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'name' => 'required|max:255',
            'status' => 'required',
    ]);
        
      
    $automatedstatus = AutomatedStatus::find($automatedstatus->id);
        $automatedstatus->name = $request->name; 
        $automatedstatus->status = $request->status;
      //  $automatedStatus->slug= str_slug($request->name);
      //  $automatedStatus->status = $request ->status == 'active'?1:0;
        $automatedstatus-> save();
        Toastr::success('Automated Status successfully added!','Success');
        return redirect()->route('automatedstatus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AutomatedStatus  $automatedStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(AutomatedStatus $automatedstatus)
    {
        //
    }
}
