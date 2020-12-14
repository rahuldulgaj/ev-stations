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
                    <h4 class="page-title">EV Station Manager</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('evstation.index')}}">EV Station </a></li>
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
                        <form action="{{route('evstation.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <!-- <h4 class="card-title">Add Employee</h4> -->
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">EV-Station Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Charger Type Name">
                                    </div>
                                </div>
                                <div class="card-body">
                                <!-- <h4 class="card-title">Add Employee</h4> -->
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">EV Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="evs_code" class="form-control" id="evs_code" placeholder="Enter Code">
                                    </div>
                                </div>
                                <div class="card-body">
                                <!-- <h4 class="card-title">Add Employee</h4> -->
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">EV Owner Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="ownername" class="form-control" id="ownername" placeholder="Enter Owner Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter Address">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Latitude</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="latitude" class="form-control" id="lat" placeholder="Enter Latitude">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Longitude</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="longitude" class="form-control" id="lang" placeholder="Enter Longitude">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Charger Type Company</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter evstation Username Code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Mobile</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="mobile" class="form-control" id="ct_company" placeholder="Enter Mobile">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Alternate Mobile</label>
                                    <div class="col-sm-9">
                                        <input type="alternatecontact" name="alternatecontact" class="form-control" id="alternatecontact" placeholder="Enter Alternate Mobile">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Usage Type</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="usagetype" class="form-control" id="usagetype" placeholder="Enter Usage Type">
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Automated Status Type</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="automated_status" class="form-control" id="automated_status" placeholder="Enter Automated Status">
                                    </div>
                                </div> -->
                                <div class="form-group row">
                 <label class="col-sm-3 text-right control-label col-form-label">Select Automated Status</label>
                           <div class="col-sm-9">
                             <select name="automated_status" class="form-control show-tick">
                                 <option value="" disabled selected>Choose Automated</option>
                                 @foreach($automatedstatus as $automated)
                                     <option value="{{$automated->id}}">{{$automated->name}}</option>
                                 @endforeach
                             </select>
                         </div>
                         </div>
                                <!-- <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="country_id" class="form-control" id="country_id" placeholder=" Country">
                                    </div>
                                </div> -->
                                <div class="form-group row">
                 <label class="col-sm-3 text-right control-label col-form-label">Select Country</label>
                           <div class="col-sm-9">
                             <select name="country_id" class="form-control show-tick">
                                 <option value="" disabled selected>Choose Country</option>
                                 @foreach($countrylist as $country)
                                     <option value="{{$country->id}}">{{$country->name}}</option>
                                 @endforeach
                             </select>
                         </div>
                         </div>
                         <div class="form-group row">
                 <label class="col-sm-3 text-right control-label col-form-label">Select State</label>
                           <div class="col-sm-9">
                             <select name="state_id" class="form-control show-tick">
                                 <option value="" disabled selected>Choose State</option>
                                 @foreach($statelist as $state)
                                     <option value="{{$state->id}}">{{$state->name}}</option>
                                 @endforeach
                             </select>
                         </div>
                         </div>
                         <div class="form-group row">
                 <label class="col-sm-3 text-right control-label col-form-label">Select City</label>
                           <div class="col-sm-9">
                             <select name="city_id" class="form-control show-tick">
                                 <option value="" disabled selected>Choose City</option>
                                 @foreach($citylist as $city)
                                     <option value="{{$city->id}}">{{$city->name}}</option>
                                 @endforeach
                             </select>
                         </div>
                         </div>
                         <div class="form-group row">
                 <label class="col-sm-3 text-right control-label col-form-label">Select Company</label>
                           <div class="col-sm-9">
                             <select name="company_id" class="form-control show-tick">
                                 <option value="" disabled selected>Choose Company</option>
                                 @foreach($companylist as $company)
                                     <option value="{{$company->id}}">{{$company->name}}</option>
                                 @endforeach
                             </select>
                         </div>
                         </div>
                                <!-- <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="city_id" class="form-control" id="city_id" placeholder="City">
                                    </div>
                                </div> -->
                                <!-- <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Company</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="company_id" class="form-control" id="company_id" placeholder="Company">
                                    </div>
                                </div> -->
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
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="status" class="form-control" id="status" placeholder="Status">
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
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