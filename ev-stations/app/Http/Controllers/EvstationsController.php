<?php

namespace App\Http\Controllers;

use App\Evstations;
use Illuminate\Http\Request;
use Gate;
use App\Chargertype;
use App\Country;
use App\City;
use App\Company;
use App\User;
use App\State;
use Carbon\Carbon;
use App\AutomatedStatus;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



class EvstationsController extends Controller
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

        $evstations= Evstations::paginate(15);
        return view('admin.evstations.index',compact('evstations'));
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
        $chargertypes = Chargertype::all();
        $companylist=Company::all();
        $countrylist=Country::all();
        $statelist=State::all();
        $citylist=City::all();
        $automatedstatus=AutomatedStatus::all();
        return view('admin.evstations.create',compact('countrylist','statelist','citylist','chargertypes','companylist','automatedstatus'));
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
            'name' => 'required|max:255',
            'status' => 'required',
            // 'ct_code' => 'required|unique:chargertypes|max:255',
            // 'ct_company' => 'required',
          //  'evs_slug'     => 'required|unique:properties|max:255',
          'evs_code'     => 'required|unique:evstations|max:255',
          'ownername'     => 'required',
          'address'     => 'required',
        //  'username'     => 'required|unique:properties|max:255',
          'latitude'     => 'required',
          'longitude'     => 'required',
        //  'lat_lang'     => 'required|unique:properties|max:255',
          'mobile'     => 'required',
        //  'alternateconatct'     => 'required',
          'usagetype'     => 'required',
          'automated_status'     => 'required',
          'country_id'     => 'required',
          'state_id'     => 'required', 
          'city_id'     => 'required',
          'company_id'     => 'required',
         // 'image'     => 'required',
         // 'join_date'=>'required'
    ]);
    $evstation = new Evstations();
    $evstation->name = $request->name; 
    $evstation->status = $request->status;
    $evstation->evs_code = $request->evs_code;
    //$evstation->evs_code = $request->ev_code;
    $evstation->ownername = $request->ownername;
    $evstation->address = $request->address;
    $evstation->username = $request->username;
    $evstation->mobile = $request->mobile;
    $evstation->latitude = $request->latitude;
    $evstation->longitude = $request->longitude;
    $evstation->lat_lang = $request->latitude.','.$request->longitude;
    $evstation->alternatecontact = $request->alternatecontact;
    $evstation->usagetype = $request->usagetype;
    $evstation->automated_status = $request->automated_status;
    $evstation->country_id = $request->country_id;
    $evstation->company_id = $request->company_id;
    $evstation->state_id = $request->state_id;
    $evstation->city_id = $request->city_id;
    $evstation->evs_slug= str_slug($request->name);
    $evslug  = str_slug($request->name);
    $image = $request->file('image');
    $sDirPath = 'uploads/gallery/evstations/'; //Specified Pathname
    if(isset($image)){
                $currentDate = Carbon::now()->toDateString();
                $imagename = $evslug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists($sDirPath)){
                Storage::disk('public')->makeDirectory($sDirPath);
            }
            if(Storage::disk('public')->exists($sDirPath.'/'.$evstation->image)){
                Storage::disk('public')->delete($sDirPath.'/'.$evstation->image);
            }
            $evtypeimage = Image::make($image)->resize(300, 200)->stream();
            Storage::disk('public')->put($sDirPath.'/'.$imagename, $evtypeimage);
        }else{
            $imagename = $evstation->image;
        }
        $evstation->image    = $imagename;   
        $evstation-> save();
        Toastr::success('EVstation successfully added!','Success');
        return redirect()->route('EVstation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evstations  $evstations
     * @return \Illuminate\Http\Response
     */
    public function show(Evstations $evstations)
    {
        //
        $evstations=Evstations::all();
        return view('admin.evstations.edit',compact('evstations'));


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evstations  $evstations
     * @return \Illuminate\Http\Response
     */
    public function edit(Evstations $evstations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evstations  $evstations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evstations $evstations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evstations  $evstations
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evstations $evstations)
    {
        //
    }
}
