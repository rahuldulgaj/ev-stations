<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\VehicleType;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
            'image'     => 'required|image|mimes:jpeg,jpg,png'
        ]);
        $image = $request->file('image');

        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagecs = 'vehicletype-'.uniqid().'.'.$image->getClientOriginalExtension();
    
            if(!Storage::disk('public')->exists('vehicletype')){
                Storage::disk('public')->makeDirectory('vehicletype');
            }
            $amenitiesimg = Image::make($image)->resize(150,150)->stream();
            Storage::disk('public')->put('vehicletype/'.$imagecs, $amenitiesimg);
    
        }else{
            $imagecs = 'default.png';
        }

        $vehicletype = new VehicleType();
        $vehicletype->name = $request->name; 
        $vehicletype->status = $request->status;
        $vehicletype->slug= str_slug($request->name);
        $vehicletype->image=$imagecs;
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
    public function show(VehicleType $vehicletype)
    {
        $vehicletype = VehicleType::withCount('comments')->find($vehicletype->id);

        return view('admin.vehicletype.show',compact('vehicletype'));
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
     $image = $request->file('image');
    if(isset($image)){
        $currentDate = Carbon::now()->toDateString();
        $imagecs = 'vehicletype-'.uniqid().'.'.$image->getClientOriginalExtension();

        if(!Storage::disk('public')->exists('vehicletype')){
            Storage::disk('public')->makeDirectory('vehicletype');
        }
        $amenitiesimg = Image::make($image)->resize(150,150)->stream();
        Storage::disk('public')->put('vehicletype/'.$imagecs, $amenitiesimg);

    }else{
        $imagecs =  $vehicletype->image;
    }
         $vehicletype =  VehicleType::find($id);
         $vehicletype->name = $request->name; 
         $vehicletype->status = $request->status;
         $vehicletype->slug= str_slug($request->name);
         $vehicletype->image=$imagecs;
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
       // $vehicletype =  VehicleType::find($id);
        $vehicletype = VehicleType::find($id)->delete();
        Toastr::error('Vehicletype successfully deleted!','Deleted');
        return redirect()->route('admin.vehicletype.index');
    }

    public function search(Request $request){
        
       dd($request);
        $vehicletypes =VehicleType::where('name', 'LIKE',"%{$request->search}%")->paginate();
        return view('admin.vehicletype.show',compact('vehicletypes'));
    }
}
