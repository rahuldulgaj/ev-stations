<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Company;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies= Company::OrderBy('name','ASC')->paginate(15);
        return view('admin.company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies = Company::all();
        return view('admin.company.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|unique:companies|max:255',
            'status' => 'required',
    ]);
    $company = new Company();
    $company->name = $request->name; 
    $company->status = $request->status;
    $company->slug= str_slug($request->name);
   // $country->state_id= $request->state_id;
    $company->companycode=$request->companycode;
  //  $role->status = $request ->status == 'active'?1:0;
    $company-> save();
    Toastr::success('Company successfully added!','Success');
    return redirect()->route('admin.company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
        $companies = Company::find($company->id)->first();
        return view('admin.company.show',compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        $company = Company::where('id', $company->id)->first();
          return view('admin.company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
        $request -> validate([
            'name' => 'required|unique:companies|max:255',
            'status' => 'required',
    ]);
    $company = Company::find($company->id);
    $company->name = $request->name; 
    $company->status = $request->status;
    $company->slug= str_slug($request->name);
   // $country->state_id= $request->state_id;
    $company->companycode=$request->companycode;
  //  $role->status = $request ->status == 'active'?1:0;
    $company-> save();
    Toastr::success('Company successfully added!','Success');
    return redirect()->route('admin.company.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
        $company = Company::find($company->id);
        $company->delete();
        Toastr::success('message', 'State deleted successfully.');
        return back();
    }

     #######SEARCH BRAND #
     public function search(Request $request){

        $companies =Company::where('name', 'LIKE',"%{$request->search}%")
        ->whereIn('status', [1, 2])->OrderBy('name','ASC')
        ->paginate('10');
        return view('admin.company.index',compact('companies'));
    }
}
