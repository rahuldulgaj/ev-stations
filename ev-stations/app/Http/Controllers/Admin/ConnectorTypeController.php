<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ConnectorType;
use Illuminate\Http\Request;

use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ConnectorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $connectortypes= ConnectorType::paginate(15);
        return view('admin.connectortype.index',compact('connectortypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.connectortype.create');

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
            'name' => 'required|max:255',
            'status' => 'required',
            'image'     => 'required|image|mimes:jpeg,jpg,png'
        
    ]);
        
      
        $connectortype = new ConnectorType();
        $connectortype->name = $request->name; 
        $connectortype->status = $request->status;
        $connectortypeslug  = str_slug($request->name);
        $connectortype->slug=$connectortypeslug;
        $image = $request->file('image');
        $sDirPath = 'connectortype/'; //Specified Pathname
        if(isset($image)){
                    $currentDate = Carbon::now()->toDateString();
                    $imagename = $connectortypeslug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists($sDirPath)){
                    Storage::disk('public')->makeDirectory($sDirPath);
                }
                if(Storage::disk('public')->exists($sDirPath.'/'.$connectortype->image)){
                    Storage::disk('public')->delete($sDirPath.'/'.$connectortype->image);
                }
                $connectortypeimage = Image::make($image)->resize(300, 200)->stream();
                Storage::disk('public')->put($sDirPath.'/'.$imagename, $connectortypeimage);
            }else{
                $imagename = $connectortype->image;
            }
            $connectortype->image    = $imagename;    
        $connectortype-> save();
        Toastr::success('Connector Type successfully added!','Success');
        return redirect()->route('admin.connectortype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConnectorType  $connectorType
     * @return \Illuminate\Http\Response
     */
    public function show(ConnectorType $connectorType)
    {
        //
        $connectortypes = ConnectorType::all();
        return view('admin.connectortype.show',compact('connectortypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConnectorType  $connectorType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $connectortypes =  ConnectorType::find($id);
        return view('admin.connectortype.edit',compact('connectortypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConnectorType  $connectorType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $request -> validate([
            'name' => 'required|max:255',
            'status' => 'required',
            'image'     => 'required|image|mimes:jpeg,jpg,png'
    ]);
        
        $connectortype = ConnectorType::find($id);
        $connectortype->name = $request->name; 
        $connectortype->status = $request->status;
        $connectortypeslug  = str_slug($request->name);
        $connectortype->slug= $connectortypeslug ;
        $image = $request->file('image');
        $sDirPath = 'connectortype/'; //Specified Pathname
        if(isset($image)){
                    $currentDate = Carbon::now()->toDateString();
                    $imagename = $connectortypeslug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists($sDirPath)){
                    Storage::disk('public')->makeDirectory($sDirPath);
                }
                if(Storage::disk('public')->exists($sDirPath.'/'.$connectortype->image)){
                    Storage::disk('public')->delete($sDirPath.'/'.$connectortype->image);
                }
                $connectortypeimage = Image::make($image)->resize(300, 200)->stream();
                Storage::disk('public')->put($sDirPath.'/'.$imagename, $connectortypeimage);
            }else{
                $imagename = $connectortype->image;
            }
            $connectortype->image    = $imagename;    
        $connectortype-> save();
        Toastr::success('ConnectorType successfully Updated!','Success');
        return redirect()->route('admin.connectortype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConnectorType  $connectorType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConnectorType $connectorType)
    {
        //
    }
}
