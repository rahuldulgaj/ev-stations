@extends('admin.layout.master')

@section('content')

    @include('admin.includes.sidebar')

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
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Employees</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Employees</a></li>
                  <li class="breadcrumb-item active">Create</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
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
                        <form action="{{route('user.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">Add Employee</h4>
                                
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
                                            <input type="file" name="image" class="custom-file-input">
                                            <label class="custom-file-label">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">First name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="fname" class="form-control" id="fname" placeholder="Enter First Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Last name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="lname" class="form-control" id="lname" placeholder="Enter Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fathername" class="col-sm-3 text-right control-label col-form-label">Father name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="fathername" class="form-control" id="fathername" placeholder="Enter Father Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mothername" class="col-sm-3 text-right control-label col-form-label">Mother name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="mothername" class="form-control" id="mothername" placeholder="Enter Mother Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="contact" class="col-sm-3 text-right control-label col-form-label">Contact Number </label>
                                    <div class="col-sm-9">
                                        <input type="number" name="phone" class="form-control" id="contact" placeholder="Contact Number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alternatecontact" class="col-sm-3 text-right control-label col-form-label">Alternate  Number </label>
                                    <div class="col-sm-9">
                                        <input type="number" name="alternatecontact" class="form-control" id="alternatecontact" placeholder="Alternate  Number">
                                    </div>
                                </div>
                                <div class="form-group"><label for="address_line_1">Address Line 1</label> <textarea name="address" class="form-control" spellcheck="false"></textarea></div>
                                <div class="form-group row">
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
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email Id">
                                    </div>
                                </div>
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
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Date Of Birth</label>
                                    <div class="col-sm-9">
                                        <input type="date"  name="dob" class="form-control" id="dob">
                                    </div>
                                    <!-- <div class="col-sm-4">
                                        <input type="date" name="date_to" class="form-control" id="ToDate">
                                    </div> -->
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Age</label>
                                    <div class="col-sm-3">
                                        <input type="text"  name="age" class="form-control" id="age">
                                    </div>
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">City</label>
                                    <div class="col-sm-3">
                                        <input type="text"  name="city" class="form-control" id="city">
                                    </div>
                                   
                                </div>
                                <!-- <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="status" class="form-control" placeholder="Status">
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="status" class="form-control" id="status" placeholder="Status">
                                            <option value="active">Active</option>
                                            <option value="deactive">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- COMPANY DETAILS -->
                            <div class="card">
                <div class="header bg-indigo">
                    <h2>Company Details</h2>
                </div>
                <div class="card-body">
                                
                                <div class="form-group row">
                                    <label for="employee_id" class="col-sm-3 text-right control-label col-form-label">Employee ID</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="employee_id" class="form-control" id="employee_id" placeholder="Enter Employee ID">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Role</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="role" class="form-control" id="role" placeholder="Role">
                                            <option value="admin">Admin</option>
                                            <option value="employee">Employee</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="department_id" class="col-sm-3 text-right control-label col-form-label">Department</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="department" class="form-control" id="department" placeholder="Enter Department">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Date Of Joining</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="join_date" class="form-control" id="join_date">
                                    </div>
                                   
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 text-right control-label col-form-label">Salary</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="salary" class="form-control" >
                                    </div>
                                </div>
                                                </div>
                    

                    <!-- DOCUMENTS -->
                            <div class="card">
                                <div class="header bg-indigo">
                                    <h2>Documents</h2>
                                </div> </div>
                                <div class="card-body">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Resume </label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="resume" class="custom-file-input">
                                            <label class="custom-file-label">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">ID Proof </label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="id_proof" class="custom-file-input">
                                            <label class="custom-file-label">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Offer Letter</label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="offer_letter" class="custom-file-input">
                                            <label class="custom-file-label">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">NOC</label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="noc" class="custom-file-input">
                                            <label class="custom-file-label">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">10th </label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="sscc" class="custom-file-input">
                                            <label class="custom-file-label">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">12th</label>
                                    <div class="col-md-9">
                                        <div class="custom-file">
                                            <input type="file" name="hscc" class="custom-file-input">
                                            <label class="custom-file-label">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>
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
            All Rights Reserved by Brainydx Pvt. Ltd. Designed and Developed by <a href="https://Brainydx.com/">Brainydx</a>.
        </footer>
    </div>

    @endsection
    @push('scripts')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>

    <script src="{{ asset('backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    @endpush