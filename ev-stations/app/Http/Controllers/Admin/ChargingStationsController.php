<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\ChargingStations;
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
use App\Amenities;
use App\BrandType;
use App\VehicleType;
use App\ConnectorType;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ChargingStationsController extends Controller
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
        $companylist=Company::all();
        $countrylist=Country::all();
        $statelist=State::all();
        $citylist=City::all();
        $amenities=Amenities::get();
        $automatedstatus= AutomatedStatus::get();
        $chargingstations= ChargingStations::paginate(15);
       $connectortypes= ConnectorType::all();
        return view('admin.chargingstations.index',compact('chargingstations','automatedstatus','companylist','countrylist','statelist','amenities','connectortypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companylist=Company::all();
        $countrylist=Country::all();
        $statelist=State::all();
        $citylist=City::all();
        $amenities=Amenities::get();
        $vehicletypes= VehicleType::all();
        $brandtypes= BrandType::all();
        $automatedstatus= AutomatedStatus::get();
        $chargertypes = Chargertype::all();
        $connectortypes= ConnectorType::all();
        return view('admin.chargingstations.create',compact('vehicletypes','brandtypes','amenities','automatedstatus','countrylist','companylist','statelist','citylist','chargertypes','connectortypes'));
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
     //   dd($request);
        $request -> validate([
            'name' => 'required|unique:model_types|max:255',
            'status' => 'required',
            'code' => 'required',
            'ownername' => 'required',
           'company_id' => 'required',
           'latitude' => 'required',
            'longitude' => 'required',
         //   'price' => 'required',
            'mobile'=> 'required',
            'time_slot_id'=> 'required',
            'automated_status_id'=> 'required',
             //  'country_id'=> 'required',
             //   'state_id'=> 'required',
              //   'city_id'=> 'required',
              // 'network_id'=>'required',
              // 'kwatt'=>'required',
              'image'     => 'required|image|mimes:jpeg,jpg,png',
              'numbers_of_ports'=>'required',
        ]);

        $image = $request->file('image');
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagecs = 'chargingstations-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('chargingstations')){
                Storage::disk('public')->makeDirectory('chargingstations');
            }
            $chargingstationsimg = Image::make($image)->resize(150,150)->stream();
            Storage::disk('public')->put('chargingstations/'.$imagecs, $chargingstationsimg);

        }else{
            $imagecs = 'default.png';
        }

        $chargingstation = new ChargingStations();
        $chargingstation->name =   $request->name; 
        $chargingstation->status = $request->status;
        $chargingstation->code =$request->code;
        $chargingstation->ownername =$request->ownername;
        $chargingstation->email =$request->email;
        $chargingstation->latitude =$request->latitude;
        $chargingstation->longitude =$request->longitude;
//$latitude =$request->latitude;
//$longitude =$request->longitude;
        $chargingstation->lat_lang	 =$request->latitude.','.$request->longitude;
        $chargingstation->websites =$request->websites;
        $chargingstation->mobile =$request->mobile;
        $chargingstation->company_id =$request->company_id;
        $chargingstation->time_slot_id =$request->time_slot_id;
        $chargingstation->country_id =$request->country_id;
        $chargingstation->state_id =$request->state_id;
        $chargingstation->city_id =$request->city_id;
        $chargingstation->description =$request->description;
        $chargingstation->image =$request->image;
        $chargingstation->slug = str_slug($request->name);
        $chargingstation->username = str_slug($request->email);
        $chargingstation->numbers_of_ports =$request->numbers_of_ports;
        $chargingstation->automated_status_id =$request->automated_status_id;
        $chargingstation->usagetype_id =$request->usagetype_id;
        $chargingstation->alternatecontact =$request->alternatecontact;
        $chargingstation->address =$request->address;
        $chargingstation->image    = $chargingstationsimg;
      
        $chargingstation-> save();
      //  $chargingstation->connector()->sync([$request->price,$request->connector_type_id]);

        $connectorTypes = $request->input('connector_type_id', []);
        $prices = $request->input('price', []);
        $kwatts = $request->input('kwatt', []);
        $amps = $request->input('amps', []);
        $networkids = $request->input('network_id', []);
        $rateids= $request->input('rate_id', []);

        for ($connectorType=0; $connectorType < count($connectorTypes); $connectorType++) {
            if ($connectorTypes[$connectorType] != '') {
                $chargingstation->connector()->attach($connectorTypes[$connectorType],['price' => $prices[$connectorType],'kwatt' => $kwatts[$connectorType],'amps' => $amps[$connectorType],'network_id' => $networkids[$connectorType],'rate_id' => $rateids[$connectorType]]);
            }
        }
      
       // $chargingstation->amenities()->attach($request->amenities_id);
        Toastr::success('Charging Stations successfully added!','Success');
        return redirect()->route('admin.chargingstations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChargingStations  $chargingStations
     * @return \Illuminate\Http\Response
     */
    public function show(ChargingStations $chargingStations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChargingStations  $chargingStations
     * @return \Illuminate\Http\Response
     */
    public function edit(ChargingStations $chargingStations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChargingStations  $chargingStations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChargingStations $chargingStations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChargingStations  $chargingStations
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChargingStations $chargingStations)
    {
        //
    }
}
