<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

use App\ModelType;
use App\VehicleType;
use App\BrandType;

use Carbon\Carbon;
use Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class ModelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $modeltypes= ModelType::latest()
        ->whereIn('status', [1, 2])->OrderBy('name','ASC')->paginate('10');
        return view('admin.modeltype.index',compact('modeltypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $vehicletypes= VehicleType::all();
        $brandtypes= BrandType::all();
        return view('admin.modeltype.create',compact('vehicletypes','brandtypes'));
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
             'name' => 'required|unique:model_types|max:255',
             'status' => 'required',
             'modelcode' => 'required',
             'brand_types_id' => 'required',
             'vehicle_types_id' => 'required',
             'charging_standard' => 'required',
             'battary_size' => 'required',
             'price' => 'required',
        ]);
        $modeltype = new ModelType();
        $modeltype->name =   $request->name; 
        $modeltype->status = $request->status;
        $modeltype->modelcode =$request->modelcode;
        $modeltype->brand_types_id =$request->brand_types_id;
        $modeltype->vehicle_types_id =$request->vehicle_types_id;
        $modeltype->battary_size =$request->battary_size;
        $modeltype->charging_standard =$request->charging_standard;
        $modeltype->compatiable_charging =$request->compatiable_charging;
        $modeltype->range =$request->range;
        $modeltype->dc_charging_time =$request->dc_charging_time;
        $modeltype->home_plug_charging_time =$request->home_plug_charging_time;
        $modeltype->swappable_battary =$request->swappable_battary;
        $modeltype->price =$request->price;
        $modeltype->description =$request->description;
        $modeltype->image =$request->image;
        $modeltype->slug = str_slug($request->name);
        $modeltype-> save();
        Toastr::success('Model Types successfully added!','Success');
        return redirect()->route('admin.modeltype.index');
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
        $modeltype =  ModelType::find($id);
        return view('admin.modeltype.show',compact('modeltype'));
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
        $vehicletypes= VehicleType::all();
        $brandtypes= BrandType::all();
        $modeltype =  ModelType::find($id);
        return view('admin.modeltype.edit',compact('modeltype','vehicletypes','brandtypes'));
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
            'name' => 'required',
            'status' => 'required',
            'modelcode' => 'required',
           'brand_types_id' => 'required',
           'vehicle_types_id' => 'required',
           'charging_standard' => 'required',
           'battary_size' => 'required',
           'price' => 'required',
        ]);
         
            $modeltype =  ModelType::find($id);
            $modeltype->name =   $request->name; 
            $modeltype->status = $request->status;
            $modeltype->modelcode =$request->modelcode;
            $modeltype->brand_types_id =$request->brand_types_id;
            $modeltype->vehicle_types_id =$request->vehicle_types_id;
            $modeltype->battary_size =$request->battary_size;
            $modeltype->charging_standard =$request->charging_standard;
            $modeltype->compatiable_charging =$request->compatiable_charging;
            $modeltype->range =$request->range;
            $modeltype->dc_charging_time =$request->dc_charging_time;
            $modeltype->home_plug_charging_time =$request->home_plug_charging_time;
            $modeltype->swappable_battary =$request->swappable_battary;
            $modeltype->price =$request->price;
            $modeltype->description =$request->description;
            $modeltype->image =$request->image;
            $modeltype->slug = str_slug($request->name);
            $modelslug = str_slug($request->name);
            $sDirPath = 'uploads/gallery/model/'.$modelslug.'/'; //Specified Pathname
            if(isset($image)){
                        $currentDate = Carbon::now()->toDateString();
                        $imagename = $modelslug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                   
                    if(!Storage::disk('public')->exists($sDirPath)){
                        Storage::disk('public')->makeDirectory($sDirPath);
                    }
                    if(Storage::disk('public')->exists($sDirPath.'/'.$modeltype->image)){
                        Storage::disk('public')->delete($sDirPath.'/'.$modeltype->image);
                    }
                   
                    $modelimage = Image::make($image)->resize(300, 200)->stream();
                
                    Storage::disk('public')->put($sDirPath.'/'.$imagename, $modelimage);

                }else{
                    $imagename = $modeltype->image;

                }
           
            $modeltype-> save();
        Toastr::success('Model Types successfully added!','Success');
        return redirect()->route('admin.modeltype.index');
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
        $modeltype =  ModelType::find($id);
        $modeltype -> delete();
        Toastr::error('Model successfully deleted!','Deleted');
        return redirect()->route('admin.modeltype.index');
    }
    public function search(Request $request){
        $modeltypes = ModelType::where('name', 'LIKE',"%{$request->search}%")
        ->whereIn('status', [1, 2])->OrderBy('name','ASC')
        ->paginate('10');
        return view('admin.modeltype.index',compact('modeltypes'));
    }
}
