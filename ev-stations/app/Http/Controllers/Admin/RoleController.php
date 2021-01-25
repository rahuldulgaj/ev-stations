<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function index(Request $request)
    {
        //
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }

        // $roles = Role::query();
        // if (request('search')) {
        //     $roles->where('name', 'Like', '%' . request('search') . '%');
        // }
        //  return $roles->orderBy('id', 'DESC')->paginate(10);

        $roles=Role::Where([
            ['name','!=',Null],[function($query) use ($request){
                if(($search =$request->search)){
                    $query->orwhere('name','LIKE','%'.$search.'%')->get();
                }
            }]
        ])
       ->OrderBy('name','ASC')->paginate(15);
       // $roles=Role::OrderBy('name','ASC')->paginate(15);
        return view('admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $request -> validate([
            'name' => 'required|unique:roles|max:255',
            'status' => 'required',

    ]);
        
      
        $role = new Role();
        $role->name = $request->name; 
        $role->slug =str_slug($request->name);
        $role->status = $request->status;
      //  $role->status = $request ->status == 'active'?1:0;
        $role -> save();
        Toastr::success('Role successfully added!','Success');
        return redirect()->route('admin.role.index');

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
        
        $request -> validate([
            'name' => 'required|max:255',
            'status' => 'required',

    ]);
      
        $role = Role::find($id);
        $role->name = $request->name;
        $role->slug =str_slug($request->name);
        $role->status = $request->status;
        $role -> save();
        Toastr::success('Role successfully added!','Success');
        return redirect()->route('admin.role.index');

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
        $role = Role::find($id)->delete();
        Toastr::error('Role successfully deleted!','Deleted');
        return redirect()->route('admin.role.index');

    }


    
    public function search(Request $request){
      
        $role =Role::where('name', 'LIKE',"%{$request->search}%")->paginate();
        dd($role);
        return view('admin.role.index',compact('role'));
    }
}
