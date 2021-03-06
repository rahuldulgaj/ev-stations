<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\BrandType;
use Illuminate\Http\Request;

use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;



class BrandTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands= BrandType::whereIn('status', [1, 2])
        ->OrderBy('name','ASC')
        ->paginate('10');
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.brand.create');
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
            'brandcode' => 'required|unique:brand_types|max:255',
            'image'     => 'required|image|mimes:jpeg,jpg,png'
    ]);
    
    $image = $request->file('image');
                    if(isset($image)){
                        $currentDate = Carbon::now()->toDateString();
                        $imagebrand = 'brand-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                        if(!Storage::disk('public')->exists('brand')){
                            Storage::disk('public')->makeDirectory('brand');
                        }
                        $brandimg = Image::make($image)->resize(150,150)->stream();
                        Storage::disk('public')->put('brand/'.$imagebrand, $brandimg);

                    }else{
                        $imagebrand = 'default.png';
                    }
      
        $brandtype = new BrandType();
        $brandtype->name = $request->name; 
        $brandtype->status = $request->status;
        $brandtype->brandcode = $request->brandcode;
        $brandtype->slug= str_slug($request->name);
        $brandtype->image = $imagebrand;
        $brandtype-> save();
        Toastr::success('Brandtype successfully added!','Success');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BrandType  $brandtype
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
        $brand = BrandType::find($id);
        return view('admin.brand.show',compact('brand'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $brand =  BrandType::find($id);
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * 
    * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrandType  $brandtype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request -> validate([
           // 'name' => 'required|unique:brand_typess|max:255|name:'.$request->name,
            'status' => 'required',
            'brandcode' => 'required|max:255',
            'name' => 'required|max:255',
          //  'image'     => 'required|image|mimes:jpeg,jpg,png'
    ]);
      
       
       $brandtype = BrandType::find($id);
        $image = $request->file('image');
        
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagecs = 'brand-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('brand')){
                Storage::disk('public')->makeDirectory('brand');
            }
            $brandimg = Image::make($image)->resize(150,150)->stream();
            Storage::disk('public')->put('brand/'.$imagecs, $brandimg);

        }else{
            $imagecs = $brandtype->image;
        }
      
        $brandtype->name = $request->name; 
        $brandtype->status = $request->status;
        $brandtype->brandcode = $request->brandcode;
        $brandtype->slug= str_slug($request->name);
        $brandtype->image = $imagecs;
        $brandtype-> save();
        Toastr::success('Brand Successfully Updated!','Success');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $brand = BrandType::find($id);
        if(Storage::disk('public')->exists('brand/'.$brand->image)){
            Storage::disk('public')->delete('brand/'.$brand->image);
        }
        $brand -> delete();
        Toastr::error('Brand successfully deleted!','Deleted');
        return redirect()->route('admin.brand.index');
    }
 #######SEARCH BRAND #
    public function search(Request $request){
        $brands =BrandType::where('name', 'LIKE',"%{$request->search}%")
        ->whereIn('status', [1, 2])->OrderBy('name','ASC')
        ->paginate('10');
        return view('admin.brand.index',compact('brands'));
    }
}
