<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Amenities;
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
        $amenities= Amenities::paginate(10);
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
        
      
        $amenities = new Amenities();
        $amenities->name = $request->name; 
        $amenities->status = $request->status;
        $amenities->slug= str_slug($request->name);
        $amenities-> save();
        Toastr::success('Amenities successfully added!','Success');
        return redirect()->route('admin.amenities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function show(Amenities $amenities)
    {
        //
        $amenities = Amenities::find($id);
        return view('admin.amenities.show',compact('amenities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function edit(Amenities $amenities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amenities $amenities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amenities $amenities)
    {
        //
    }
}
