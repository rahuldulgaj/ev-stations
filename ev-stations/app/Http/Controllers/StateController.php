<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use Gate;
use Brian2694\Toastr\Facades\Toastr;
use App\Country;

class StateController extends Controller
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

        $states=State::paginate(15);
        return view('admin.state.index',compact('states'));
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
        $countrylist = Country::all();
        return view('admin.state.create',compact('countrylist'));
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
           // 'statename' => 'required',
            'status' => 'required',
            'name' => 'required|unique:states|max:255',
          //  'title'     => 'required|unique:properties|max:255',
    ]);
        
      
        $state = new State();
        $state->name = $request->name; 
        $state->status = $request->status;
        $state->state_slug= str_slug($request->name);
        $state->statecode=$request->statecode;
        $state->country_id= $request->country_id;
      //  $role->status = $request ->status == 'active'?1:0;
        $state-> save();
        Toastr::success('State successfully added!','Success');
        return redirect()->route('state.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
         $countrylist = Country::all();
        // $state = State::where('id', $state->id)->first();
        $state = State::select("states.*","countries.name as countryname")
        ->join("countries","countries.id","=","states.country_id")->where('states.id',$state->id)->first();
         return view('admin.state.show',compact('state','countrylist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
       $countrylist = Country::all();
       $state =  State::find($state->id);
    return view('admin.state.edit',compact('state','countrylist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        //
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
           // 'statename' => 'required',
            'status' => 'required',
            'name' => 'required|max:255',
           'country_id'     => 'required',
    ]);
        
      
        $state = State::find($state->id);
        $state->name = $request->name; 
        $state->status = $request->status;
        $state->state_slug= str_slug($request->name);
        $state->statecode= $request->statecode;
        $state->country_id= $request->country_id;
      //  $role->status = $request ->status == 'active'?1:0;
        $state-> save();
        Toastr::success('State successfully added!','Success');
        return redirect()->route('state.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //
        $state = State::find($state->id);
        $state->delete();
        Toastr::success('message', 'State deleted successfully.');
        return back();
    }
}
