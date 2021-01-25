<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehicleType;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vehicletypes= VehicleType::paginate(10);
        return view('admin.vehicletype.index',compact('vehicletypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.vehicletype.create');
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
        $request -> validate([
            'name' => 'required|unique:vehicle_types|max:255',
            'status' => 'required',

    ]);
        
      
        $vehicletype = new VehicleType();
        $vehicletype->name = $request->name; 
        $vehicletype->status = $request->status;
        $vehicletype->slug= str_slug($request->name);
        $vehicletype-> save();
        Toastr::success('VehicleType successfully added!','Success');
        return redirect()->route('admin.vehicletype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $vehicletype =  VehicleType::find($id);
        return view('admin.vehicletype.edit',compact('vehicletype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $vehicletype =  VehicleType::find($id);
        return view('admin.vehicletype.edit',compact('vehicletype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request -> validate([
            // 'name' => 'required|unique:brand_typess|max:255|name:'.$request->name,
             'status' => 'required',
             'name' => 'required|max:255'
 
 
     ]);
         
         $vehicletype =  VehicleType::find($id);
         $vehicletype->name = $request->name; 
         $vehicletype->status = $request->status;
         $vehicletype->slug= str_slug($request->name);
         $vehicletype-> save();
         Toastr::success('Vehicle Type Successfully Updated!','Success');
         return redirect()->route('admin.vehicletype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $vehicletype =  VehicleType::find($id);
        $vehicletype -> delete();
        Toastr::error('Vehicletype successfully deleted!','Deleted');
        return redirect()->route('admin.vehicletype.index');
    }

    public function search(Request $request){
        $vehicletype =VehicleType::where('name', 'LIKE',"%{$request->search}%")->paginate();
        return view('admin.vehicletype.index',compact('vehicletype'));
    }
}
