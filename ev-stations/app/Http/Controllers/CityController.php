<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Gate;
use Brian2694\Toastr\Facades\Toastr;
use App\State;


class CityController extends Controller
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

        $cities=City::paginate(15);
        return view('admin.city.index',compact('cities'));
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
        $statelist = State::all();
        return view('admin.city.create',compact('statelist'));
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
            'name' => 'required|unique:cities|max:255',
            'status' => 'required',
            'citycode' => 'required',
            'state_id' => 'required',
          //  'title'     => 'required|unique:properties|max:255',
    ]);
        
      
        $city = new City();
        $city->name = $request->name; 
        $city->status = $request->status;
        $city->city_slug= str_slug($request->name);
        $city->state_id= $request->state_id;
        $city->citycode=$request->citycode;
      //  $role->status = $request ->status == 'active'?1:0;
        $city-> save();
        Toastr::success('City successfully added!','Success');
        return redirect()->route('city.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
        $cities = City::select("cities.*","states.name as statename")
        ->join("states","states.id","=","cities.state_id")->where('cities.id', $city->id)->first();
         return view('admin.city.show',compact('cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
        $city =  City::find($city->id);
        
        $statelist = State::all();
        return view('admin.city.edit',compact('city','statelist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'state_id' => 'required',
            'status' => 'required',
            'name' => 'required|max:255',

          //  'title'     => 'required|unique:properties|max:255',
    ]);
        
      
        $city = City::find($city->id);
        $city->name = $request->name; 
        $city->status = $request->status;
        $city->city_slug= str_slug($request->name);
        $city->citycode= $request->citycode;
      //  $role->status = $request ->status == 'active'?1:0;
        $city-> save();
        Toastr::success('city successfully added!','Success');
        return redirect()->route('city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
        $city = City::find($city->id);

        $city->delete();
        Toastr::success('message', 'City deleted successfully.');
        return back();
    }
}
