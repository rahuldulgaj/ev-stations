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
    public function show(AutomatedStatus $automatedStatus)
    {
        //
        $automatedstatus = AutomatedStatus::find($automatedStatus->id)->first();
        return view('admin.automatedstatus.show',compact('automatedstatus'));

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
        $automatedstatus = AutomatedStatus::where('id', $automatedStatus->id)->first();
        return view('admin.automatedStatus.edit',compact('automatedstatus'));

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
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'name' => 'required|max:255',
            'status' => 'required',
    ]);
        
      
    $automatedStatus = AutomatedStatus::find($automatedStatus->id);
        $automatedStatus->name = $request->name; 
        $automatedStatus->status = $request->status;
      //  $automatedStatus->slug= str_slug($request->name);
      //  $automatedStatus->status = $request ->status == 'active'?1:0;
        $automatedStatus-> save();
        Toastr::success('Automated Status successfully added!','Success');
        return redirect()->route('automatedstatus.index');
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
