<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use App\User;
use Carbon\Carbon;
use App\Role;

use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if(!Gate::allows('isAdmin')){
        //     abort(401);
        // }
     
        $users = User::where('status','1')->paginate(15);
        
       // dd($users->hasRole('admin','editor')); // and so on
        return view('admin.user.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        return view('admin.user.create');
    }
   
    public function usershow($slug)
    {
           $user = User::where('id', $slug)->first();;
          // dd($user);
           return view('admin.user.show',compact('user'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'username' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,pdf,svg|max:2048',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users|email',
            'address' => 'required',
            'state' => 'required',
            'mobile' => 'required|unique:users|max:11',
            'role'=>'required'

    ]);
        
      
        $user = new User();
        $user->username = $request->username; 
        $image = $request->file('image');
        $userslug  = str_slug($request->username);
     

        $sDirPath = 'uploads/gallery/'.$userslug.'/'; //Specified Pathname
                if(isset($image)){
                            $currentDate = Carbon::now()->toDateString();
                            $imagename = $userslug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                       
                        if(!Storage::disk('public')->exists($sDirPath)){
                            Storage::disk('public')->makeDirectory($sDirPath);
                        }
                        if(Storage::disk('public')->exists($sDirPath.'/'.$user->image)){
                            Storage::disk('public')->delete($sDirPath.'/'.$user->image);
                        }
                       
                        $userimage = Image::make($image)->resize(300, 200)->stream();
                    
                        Storage::disk('public')->put($sDirPath.'/'.$imagename, $userimage);

                    }else{
                        $imagename = $user->image;

                    }
                   
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->alternatecontact = $request->alternatecontact;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->join_date = $request->join_date;
        $user->city_id = $request->city_id;
        $user->state_id = $request->state_id;
        $user->company_id = $request->company_id;
        $user->image    = $imagename;
        $user->status = $request->status;
        $user->password = bcrypt($request->password);

    //    $user -> password = bcrypt($request -> password);
//        $user -> status = $request -> status == 'active'?1:0;
        $user -> save();
        Toastr::success('User successfully added!','Success');
        return redirect()->route('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $request -> validate([
            'username' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,pdf,svg|max:2048',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address'=>'required',
            'role'=>'required',
          //  'password' => 'required',
//            'status' => 'required',
        ]);
        $user = User::find($id);
        $user->username = $request ->username;

       $user->image = $request ->image;

                $image = $request->file('image');
                $userslug  = str_slug($request->username);
              
            $sDirPath = 'uploads/gallery/'.$userslug.'/'; //Specified Pathname
            if(isset($image)){
                        $currentDate = Carbon::now()->toDateString();
                        $imagename = $userslug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                    if(!Storage::disk('public')->exists($sDirPath)){
                        Storage::disk('public')->makeDirectory($sDirPath);
                    }
                    if(Storage::disk('public')->exists($sDirPath.'/'.$user->image)){
                        Storage::disk('public')->delete($sDirPath.'/'.$user->image);
                    }
                    $userimage = Image::make($image)->resize(300, 200)->stream();
                    Storage::disk('public')->put($sDirPath.'/'.$imagename, $userimage);
                }else{
                    $imagename = $user->image;
                }

        $user->firstname = $request->firstname;
        $user->lastname = $request ->lastname;
        $user->role = $request ->role;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->alternatecontact = $request->alternatecontact;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->join_date = $request->join_date;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->company = $request->company;
        $user->role = $request->role;
        $user->image    = $imagename;
      
       // $user -> password = $request -> password;
//        $user -> password = bcrypt($request -> password);
           $user->status = $request -> status;
    //    dd($user);
//        $user -> status = $request -> status == 'active'?1:0;
        $user -> save();
        Toastr::success('Employee successfully updated!','Success');
        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(!Gate::allows('isAdmin')){
            abort(401);
        }
        $user = User::find($id);
        $user -> delete();
        Toastr::error('Employee successfully deleted!','Deleted');
        return redirect()->route('user');
    }

    public function search(Request $request){
        $users =User::where('username', 'LIKE',"%{$request->search}%")->paginate();
        return view('admin.user.index',compact('users'));
    }

}
