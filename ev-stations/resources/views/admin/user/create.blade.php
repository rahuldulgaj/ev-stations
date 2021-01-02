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
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.user.index')}}">User</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">

        
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <form action="{{route('admin.user.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <!-- <h4 class="card-title">Add Employee</h4> -->
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">First name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="firstname" class="form-control" id="fname" placeholder="Enter First Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Last name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="lastname" class="form-control" id="lname" placeholder="Enter Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email Id">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Username</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter a user name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">File Upload</label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input ">
                                            <label class="custom-file-label">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                </div>
                                
                               

                                <div class="form-group row">
                                    <label for="contact" class="col-sm-3 text-right control-label col-form-label">Contact Number </label>
                                    <div class="col-sm-9">
                                        <input type="number" name="mobile" class="form-control" id="contact" placeholder="Contact Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alternatecontact" class="col-sm-3 text-right control-label col-form-label">Alternate  Number </label>
                                    <div class="col-sm-9">
                                        <input type="number" name="alternatecontact" class="form-control" id="alternatecontact" placeholder="Alternate  Number">
                                    </div>
                                </div>
                                <div class="form-group row"><label for="address_line_1" class="col-sm-3 text-right control-label col-form-label">Address </label>
                                <div class="col-sm-9">
                                 <textarea name="address" class="form-control" spellcheck="false"></textarea>
                                 </div></div>
                                
                               
                                <!-- <div class="form-group row">
                                    <label for="address" class="col-sm-3 text-right control-label col-form-label">Address </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" class="form-control" id="alternatecontact" placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="permanent" class="col-sm-3 text-right control-label col-form-label">Permanent Address </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="permanentaddress" class="form-control" id="permanent" placeholder="Permanent Address">
                                    </div>
                                </div> -->
                               
                                 <div class="form-group row">
                                    <label for="gender" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="gender" class="form-control" id="gender" placeholder="Gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div> 
                               
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label for="lname" class="col-sm-2 text-right control-label col-form-label">State</label>
                                    <div class="col-sm-2">
                                        <input type="text"  name="state_id" class="form-control" id="state">
                                    </div>
                                    <label for="lname" class="col-sm-2 text-right control-label col-form-label">City</label>
                                    <div class="col-sm-2">
                                        <input type="text"  name="city_id" class="form-control" id="city">
                                    </div>
                                    <label for="company" class="col-sm-2 text-right control-label col-form-label">Company Name</label>
                                    <div class="col-sm-2">
                                        <input type="text"  name="company_id" class="form-control" id="company">
                                    </div>
                                   
                                </div>
                               
                                <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="status" class="form-control" id="status" placeholder="Status">
                                            <option value="1">Active</option>
                                            <option value="2">Deactive</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Role</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="role_id" class="form-control" id="role" placeholder="Role">
                                            <option value="1">Admin</option>
                                            <option value="4">User</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <!-- <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Date Of Joining</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="join_date" class="form-control" id="join_date">
                                    </div>
                                </div> -->
                            </div>

                            <!-- COMPANY DETAILS -->

                         
              
               

                             
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
            All Rights Reserved by Brainydx Pvt. Ltd. Designed and Developed by <a href="https://Brainydx.com/">Brainydx</a>.
        </footer>
    </div>

    @endsection
    @push('scripts')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>

    <script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    @endpush