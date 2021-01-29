<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\NetworkTypes;
use Illuminate\Http\Request;

use Gate;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class NetworkTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $networktypes= NetworkTypes::paginate(10);
        return view('admin.networktype.index',compact('networktypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
           return view('admin.networktype.create');

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
            'name' => 'required|unique:network_types|max:255',
            'status' => 'required',
            'networkcode' => 'required|unique:network_types|max:255',
            'image'     => 'required|image|mimes:jpeg,jpg,png'
    ]);
    
    $image = $request->file('image');
                    if(isset($image)){
                        $currentDate = Carbon::now()->toDateString();
                        $imagebrand = 'networktype-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                        if(!Storage::disk('public')->exists('networktype')){
                            Storage::disk('public')->makeDirectory('networktype');
                        }
                        $brandimg = Image::make($image)->resize(150,150)->stream();
                        Storage::disk('public')->put('networktype/'.$imagebrand, $brandimg);

                    }else{
                        $imagebrand = 'default.png';
                    }
      
        $networktype = new NetworkTypes();
        $networktype->name = $request->name; 
        $networktype->status = $request->status;
        $networktype->networkcode = $request->networkcode;
        $networktype->slug= str_slug($request->name);
        $networktype->image = $imagebrand;
        $networktype-> save();
        Toastr::success('Networktype successfully added!','Success');
        return redirect()->route('admin.networktypes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NetworkTypes  $networkTypes
     * @return \Illuminate\Http\Response
     */
    public function show(NetworkTypes $networkTypes,$id)
    {
        //
        $networktypes = NetworkTypes::find($id);
        return view('admin.networktypes.show',compact('networktypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NetworkTypes  $networkTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(NetworkTypes $networkTypes,$id)
    {
        //
        $networktypes =  NetworkTypes::find($id);
        return view('admin.networktype.edit',compact('networktypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NetworkTypes  $networkTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request -> validate([
            // 'name' => 'required|unique:brand_types|max:255|name:'.$request->name,
             'status' => 'required',
             'networkcode' => 'required|max:255',
             'name' => 'required|max:255',
           //  'image'     => 'required|image|mimes:jpeg,jpg,png'
     ]);
       
       
        $networktypes = NetworkTypes::find($id);
        $image = $request->file('image');
       //  dd($request);
         if(isset($image)){
             $currentDate = Carbon::now()->toDateString();
             $imagecs = 'networktype-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
 
             if(!Storage::disk('public')->exists('networktype')){
                 Storage::disk('public')->makeDirectory('networktype');
             }
             $brandimg = Image::make($image)->resize(150,150)->stream();
             Storage::disk('public')->put('networktype/'.$imagecs, $brandimg);
 
         }else{
             $imagecs = $networktypes->image;
         }
       
         $networktypes->name = $request->name; 
         $networktypes->status = $request->status;
         $networktypes->networkcode = $request->networkcode;
         $networktypes->slug= str_slug($request->name);
         $networktypes->image = $imagecs;
         $networktypes-> save();
         Toastr::success('Network type Successfully Updated!','Success');
         return redirect()->route('admin.networktypes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NetworkTypes  $networkTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $networktypes = NetworkTypes::find($id);
        if(Storage::disk('public')->exists('networktype/'.$networktypes->image)){
            Storage::disk('public')->delete('networktype/'.$networktypes->image);
        }
        $networktypes -> delete();
        Toastr::error('Network Types Successfully deleted!','Deleted');
        return redirect()->route('admin.networktypes.index');
    }

 #######SEARCH networktypes #
 public function search(Request $request){
    $networktypes =NetworkTypes::where('name', 'LIKE',"%{$request->search}%")
    ->whereIn('status', [1, 2])->OrderBy('name','ASC')
    ->paginate('10');
    return view('admin.networktype.index',compact('networktypes'));
}


}
