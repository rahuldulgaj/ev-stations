
<style>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>

@extends('theme.newdefault')

@section('content')
@livewireStyles

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
      <!-- Begin Page Content -->
<div class="container-fluid">
 <div class="header-body">
 <div class="card shadow mb-4">

          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <!-- <h6 class="h2 text-blue d-inline-block mb-0">Brand Management</h6> -->
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item active"><a href="{{route('admin.user.index')}}">User</a></li>
                  <li class="breadcrumb-item  active" aria-current="page">User</li>
                </ol>
              </nav>
            </div>
            <!-- <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div> -->
          </div>
        </div>  </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <form action="{{route('admin.user.update',$user->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                            {{ method_field('PUT') }}
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
                                <div class="col-md-3">
                                @if(Storage::disk('public')->exists('uploads/gallery/users/'.$user->image) && $user->image)
                  <img src="{{Storage::url('uploads/gallery/users/'.$user->image)}}" alt="Circle image" class="img-fluid rounded-circle shadow" style="width: 100px;">
                  @endif
                </div>   <div class="col-md-9">
                                        <div class="custom-file">
                                        <input type="file" name="image">
                                            <label class="custom-file-label">{{$user->image}}</label>
                                        </div>
                                    </div>
                                  
                                </div>
                               
                                <div class="form-group row">
                                    <label for="contact" class="col-sm-3 text-right control-label col-form-label">Contact Number </label>
                                    <div class="col-sm-9">
                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" name="mobile"  class="form-control" id="contact" placeholder="Contact Number" value="{{$user->mobile}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alternatecontact" class="col-sm-3 text-right control-label col-form-label">Alternate  Number </label>
                                    <div class="col-sm-9">
                                        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" name="alternatecontact" class="form-control" id="alternatecontact" placeholder="Alternate  Number"  value="{{$user->alternatecontact}}">
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
@livewire('country-state-city',['country'=>$user->country_id , 'state'=>$user->state_id,'city'=>$user->city_id])

                              
                                <div class="form-group row">
                 <label class="col-sm-3 text-right control-label col-form-label">Select Company</label>
                           <div class="col-sm-9">
                             <select name="company_id" class="form-control show-tick">
                                 <option value="" disabled selected>Choose Company</option>
                                 @foreach($companylist as $company)
                                     <option value="{{$company->id}}" {{ $user->company_id==$company->id ? 'selected' : '' }}>{{$company->name}}</option>
                                 @endforeach
                             </select>
                         </div></div>

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
                                        <select type="text" name="role_id" class="form-control" id="lname">
                                        @foreach($roles as $role)
                                     <option value="{{$role->id}}" {{ $user->role_id==$role->id ? 'selected' : '' }}>{{$role->name}}</option>
                                 @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label for="joindate" class="col-sm-3 text-right control-label col-form-label">Join date</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="join_date" class="form-control" id="join_date" value="{{$user->join_date}}">
                                    </div>
                                </div> -->
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
     
    </div>
    @livewireScripts
@endsection