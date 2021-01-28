<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Amenities;

use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;


class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $amenities= Amenities::whereIn('status', [1, 2])->OrderBy('name','ASC')
        ->paginate(10);
        return view('admin.amenities.index',compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          //  $chargertypes = Chargertype::all();
          return view('admin.amenities.create');
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
            'name' => 'required|max:255',
            'status' => 'required',
            'image'     => 'required|image|mimes:jpeg,jpg,png'
    ]);
        
    $image = $request->file('image');
    $slug =str_slug($request->name);
    if(isset($image)){
        $currentDate = Carbon::now()->toDateString();
        $imagecs = 'amenities'.'-'.uniqid().'.'.$image->getClientOriginalExtension();

        if(!Storage::disk('public')->exists('amenities')){
            Storage::disk('public')->makeDirectory('amenities');
        }
        $amenitiesimg = Image::make($image)->resize(150,150)->stream();
        Storage::disk('public')->put('amenities/'.$imagecs, $amenitiesimg);

    }else{
        $imagecs = 'default.png';
    }
        $amenities = new Amenities();
        $amenities->name = $request->name; 
        $amenities->status = $request->status;
        $amenities->slug= $slug;
        $amenities->image    = $imagecs;
        $amenities-> save();
        Toastr::success('Amenities successfully added!','Success');
        return redirect()->route('admin.amenities.index');
    }

    
    // public function show(Amenities $amenities)
    // {
    //     //
    //     $amenities = Amenities::find($amenities->id);
    //     return view('admin.amenities.index',compact('amenities'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $amenities =  Amenities::find($id);
        return view('admin.amenities.edit',compact('amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request -> validate([
            'name' => 'required|max:255',
            'status' => 'required',
           // 'image'     => 'required|image|mimes:jpeg,jpg,png'
    ]);
    $amenities = Amenities::find($id);
    $image = $request->file('image');

    $slug =str_slug($request->name);
    if(isset($image)){
        $currentDate = Carbon::now()->toDateString();
        $imagecs = 'amenities'.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        if(!Storage::disk('public')->exists('amenities')){
            Storage::disk('public')->makeDirectory('amenities');
        }
        $amenitiesimg = Image::make($image)->resize(150,150)->stream();
        Storage::disk('public')->put('amenities/'.$imagecs, $amenitiesimg);
    }else{
        $imagecs =$amenities->image;
    }
     
        $amenities->name = $request->name; 
        $amenities->status = $request->status;
        $amenities->slug= $slug;
        $amenities->image    = $imagecs;
        $amenities-> save();
        Toastr::success('Amenities successfully added!','Success');
        return redirect()->route('admin.amenities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $amenities =  Amenities::find($id);

        if(Storage::disk('public')->exists('amenities/'.$amenities->image)){
            Storage::disk('public')->delete('amenities/'.$amenities->image);
        }
        $amenities -> delete();
        Toastr::error('Amenities successfully deleted!','Deleted');
        return redirect()->route('admin.amenities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        //dd('test');
        $amenities =Amenities::where('name', 'LIKE',"%{$request->search}%")
        ->whereIn('status', [1, 2])->OrderBy('name','ASC')
        ->paginate(10);
        return view('admin.amenities.index',compact('amenities'));
    }
}
