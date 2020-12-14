@extends('theme.default')

@section('content')


    <div class="page-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Admin Manager</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('user')}}">User</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <form action="{{route('user.update',$user->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            {{--@method('PUT')--}}
                            <div class="card-body">
                                <h4 class="card-title">ADD USER</h4>

                                <div class="form-group row">
                                    <label for="firstname" class="col-sm-3 text-right control-label col-form-label">First name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="firstname" class="form-control" id="firstname" value="{{$user->firstname}}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lastname" class="col-sm-3 text-right control-label col-form-label">Last name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="lastname" class="form-control" id="lastname" value="{{$user->lastname}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" class="form-control" id="lname" value="{{$user->email}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="username" class="form-control" id="username" value="{{$user->username}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">File Upload</label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" value="{{$user->image}}">
                                            <label class="custom-file-label">{{$user->image}}</label>
                                            {{--<div class="invalid-feedback">Example invalid custom file feedback</div>--}}
                                        </div>
                                    </div>
                                </div>
                               
                                
                                <div class="form-group row">
                                    <label for="contact" class="col-sm-3 text-right control-label col-form-label">Contact Number </label>
                                    <div class="col-sm-9">
                                        <input type="number" name="mobile" class="form-control" id="contact"  value="{{$user->mobile}}">
                                    </div>
                                </div>
                              
                                <div class="form-group row">
                                    <label for="alternatecontact" class="col-sm-3 text-right control-label col-form-label">Alternate  Number </label>
                                    <div class="col-sm-9">
                                        <input type="number" name="alternatecontact" class="form-control" id="alternatecontact"  value="{{$user->alternatecontact}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                <label for="address_line_1" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                <div class="col-sm-9">

                                 <textarea name="address" class="form-control" spellcheck="false">{{$user->address}}</textarea></div>
                                 </div>
                                <!-- <div class="form-group row">
                                    <label for="address" class="col-sm-3 text-right control-label col-form-label">Address </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" class="form-control" id="alternatecontact" placeholder="Address">
                                    </div>
                                </div> -->


                              
                                <div class="form-group row">
                                    <label for="gender" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="gender" class="form-control" id="gender" placeholder="Gender">
                                            <option value="male"  {{ $user->gender=='male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ $user->gender=='female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                </div> 

                                <div class="form-group row">
                                  
                                    <label for="state" class="col-sm-2 text-right control-label col-form-label">State</label>
                                    <div class="col-sm-2">
                                        <input type="text"  name="state" class="form-control" id="state" value="{{$user->state}}">
                                    </div>
                                    <label for="lname" class="col-sm-2 text-right control-label col-form-label">City</label>
                                    <div class="col-sm-2">
                                        <input type="text"  name="city" class="form-control" id="city" value="{{$user->city}}">
                                    </div>
                                    <label for="lname" class="col-sm-2 text-right control-label col-form-label">Company Name</label>
                                    <div class="col-sm-2">
                                        <input type="text"  name="company" class="form-control" id="company" value="{{$user->company}}">
                                    </div>
                                   
                                </div>
                                <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="status" class="form-control" id="status" placeholder="Status">
                                            <option value="1" {{ $user->status=='1' ? 'selected' : '' }}>Active</option>
                                            <option value="2" {{ $user->status=='2' ? 'selected' : '' }}>Deactive</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Role</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="role" class="form-control" id="lname">
                                            <option  value="admin" {{ $user->role=='admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="employee" {{ $user->role=='employee' ? 'selected' : '' }}>Employee</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="joindate" class="col-sm-3 text-right control-label col-form-label">Join date</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="join_date" class="form-control" id="join_date" value="{{$user->join_date}}">
                                    </div>
                                </div>
                                </div>
                            
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer text-center">
            All Rights Reserved by BrainyDx. Designed and Developed by <a href="#">Brainydx</a>.
        </footer>
    </div>

@endsection