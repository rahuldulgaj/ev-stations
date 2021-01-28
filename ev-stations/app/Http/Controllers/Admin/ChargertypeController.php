<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Chargertype;
use Illuminate\Http\Request;
use Gate;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ChargertypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         //
        //  if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }

        $chargertypes= Chargertype::paginate(15);
        return view('admin.chargertype.index',compact('chargertypes'));
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
      //  $chargertypes = Chargertype::all();
        return view('admin.chargertype.create');
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
            'code' => 'required|unique:chargertypes|max:255',
    ]);
        
      
        $chargertype = new Chargertype();
        $chargertype->name = $request->name; 
        $chargertype->status = $request->status;
        $chargertype->code = $request->code;
        $chargertype->slug= str_slug($request->name);
        $chargertypeslug  = str_slug($request->name);
        $image = $request->file('image');
        $sDirPath = 'chargertype/'; //Specified Pathname
        if(isset($image)){
                    $currentDate = Carbon::now()->toDateString();
                    $imagename = $chargertypeslug.uniqid().'.'.$image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists($sDirPath)){
                    Storage::disk('public')->makeDirectory($sDirPath);
                }
                if(Storage::disk('public')->exists($sDirPath.'/'.$chargertype->image)){
                    Storage::disk('public')->delete($sDirPath.'/'.$chargertype->image);
                }
                $chargertypeimage = Image::make($image)->resize(50, 50)->stream();
                Storage::disk('public')->put($sDirPath.'/'.$imagename, $chargertypeimage);
            }else{
                $imagename = 'default.png';
            }
            $chargertype->image    = $imagename;    
        $chargertype-> save();
        Toastr::success('Chargertype successfully added!','Success');
        return redirect()->route('admin.chargertype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chargertype  $chargertype
     * @return \Illuminate\Http\Response
     */
    public function show(Chargertype $chargertype)
    {
        //
        $chargertypes = Chargertype::all();
        return view('admin.chargertype.show',compact('chargertypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chargertype  $chargertype
     * @return \Illuminate\Http\Response
     */
    public function edit(Chargertype $chargertype)
    {
        //
        $chargertypes =  Chargertype::find($chargertype->id);
        return view('admin.chargertype.edit',compact('chargertypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chargertype  $chargertype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chargertype $chargertype)
    {
        //
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
        $request -> validate([
            'name' => 'required|max:255',
            'status' => 'required',
            'code' => 'required|max:255',
          // 'ct_company' => 'required',
          //  'state_id' => 'required',
          //  'title'     => 'required|unique:properties|max:255',
    ]);
        
        $chargertype = Chargertype::find($chargertype->id);
        $chargertype->name = $request->name; 
        $chargertype->status = $request->status;
        $chargertype->code = $request->code;
        $chargertypeslug  = str_slug($request->name);
        $chargertype->slug=         $chargertypeslug;
        $image = $request->file('image');
        $sDirPath = 'chargertype/'; //Specified Pathname
        if(isset($image)){
                    $currentDate = Carbon::now()->toDateString();
                    $imagename = $chargertypeslug.uniqid().'.'.$image->getClientOriginalExtension();
                if(!Storage::disk('public')->exists($sDirPath)){
                    Storage::disk('public')->makeDirectory($sDirPath);
                }
                if(Storage::disk('public')->exists($sDirPath.'/'.$chargertype->image)){
                    Storage::disk('public')->delete($sDirPath.'/'.$chargertype->image);
                }
                $chargertypeimage = Image::make($image)->resize(50, 50)->stream();
                Storage::disk('public')->put($sDirPath.'/'.$imagename, $chargertypeimage);
            }else{
                $imagename = $chargertype->image;
            }
            $chargertype->image    = $imagename;    
        $chargertype-> save();
        Toastr::success('Chargertype successfully Updated!','Success');
        return redirect()->route('admin.chargertype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chargertype  $chargertype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chargertype $chargertype)
    {
        //
        $chargertype = Chargertype::find($chargertype->id);
        if(Storage::disk('public')->exists('chargertype/'.$chargertype->image)){
            Storage::disk('public')->delete('chargertype/'.$chargertype->image);
        }
        $chargertype->delete();
        Toastr::success('message', 'Chargertype deleted successfully.');
        return back();
    }
    #######SEARCH BRAND #
    public function search(Request $request){

        $chargertypes =Chargertype::where('name', 'LIKE',"%{$request->search}%")
        ->whereIn('status', [1, 2])->OrderBy('name','ASC')
        ->paginate('10');
        return view('admin.chargertype.index',compact('chargertypes'));
    }
}
