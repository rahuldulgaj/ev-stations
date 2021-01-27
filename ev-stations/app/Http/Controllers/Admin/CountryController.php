<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Country;
use Illuminate\Http\Request;
use Gate;
use Brian2694\Toastr\Facades\Toastr;
use App\State;


class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }

        $countries=Country::OrderBy('name','ASC')->SimplePaginate(5);
        return view('admin.country.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
       // $statelist = State::all();
        return view('admin.country.create');
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
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }

        $request -> validate([
            'name' => 'required|unique:countries|max:255',
            'status' => 'required',
            'countrycode' => 'required',
    ]);
        
      
        $country = new Country();
        $country->name = $request->name; 
        $country->status = $request->status;
        $country->slug= str_slug($request->name);
       // $country->state_id= $request->state_id;
        $country->countrycode=$request->countrycode;
      //  $role->status = $request ->status == 'active'?1:0;
        $country-> save();
        Toastr::success('Country successfully added!','Success');
        return redirect()->route('admin.country.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
         $country = Country::find($country->id)->first();
         return view('admin.country.show',compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
        $country = Country::where('id', $country->id)->first();
      //  $statelist = State::all();
        return view('admin.country.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $request -> validate([
            'name' => 'required',
            'status' => 'required',
            'countrycode' => 'required',
    ]);
        
       
        $country = Country::find($country->id);
        $country->name = $request->name; 
        $country->status = $request->status;
        $country->slug= str_slug($request->name);
       // $country->state_id= $request->state_id;
        $country->countrycode=$request->countrycode;
      //  $role->status = $request ->status == 'active'?1:0;
        $country-> save();
        Toastr::success('Country successfully added!','Success');
        return redirect()->route('admin.country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
        $country = Country::find($country->id);
        $country->delete();
        Toastr::success('message', 'State deleted successfully.');
        return back();
    }

    #######SEARCH BRAND #
    public function search(Request $request){

        $countries =Country::where('name', 'LIKE',"%{$request->search}%")
        ->whereIn('status', [1, 2])->OrderBy('name','ASC')
        ->paginate('10');
        return view('admin.country.index',compact('countries'));
    }
}
