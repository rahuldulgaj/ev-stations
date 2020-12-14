<?php

namespace App\Http\Controllers;
use Gate;
use Brian2694\Toastr\Facades\Toastr;
use App\User;
use Carbon\Carbon;

use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class RoleController extends Controller
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

        $roles=Role::paginate(15);

        return view('admin.role.index',compact('roles'));
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
        return view('admin.role.create');
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
            'rolename' => 'required',
            'status' => 'required',

    ]);
        
      
        $role = new Role();
        $role->rolename = $request->rolename; 
        $role->role_slug = $request->rolename; 
        $role->status = $request->status;
      //  $role->status = $request ->status == 'active'?1:0;
        $role -> save();
        Toastr::success('Role successfully added!','Success');
        return redirect()->route('role');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       // dd($role->id);
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $roles = Role::find($id);
        return view('admin.role.edit',compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'rolename' => 'required',
            'status' => 'required',

    ]);
        
      
        $role = Role::find($id);
        $role->rolename = $request->rolename; 
        $role->status = $request->status;
        $role -> save();
        Toastr::success('Role successfully added!','Success');
        return redirect()->route('role');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //

    }


    
    public function search(Request $request){
        $role =Role::where('rolename', 'LIKE',"%{$request->search}%")->paginate();
        return view('admin.role.index',compact('role'));
    }
}
