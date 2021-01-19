@extends('theme.newdefault')

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
                  <li class="breadcrumb-item active"><a href="{{route('admin.modeltype.index')}}">Model Type</a></li>
                  <li class="breadcrumb-item  active" aria-current="page">Model Type</li>
                </ol>
              </nav>
            </div>
            <!-- <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div> -->
          </div>
      
        </div>



     

        
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <form action="{{route('admin.modeltype.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <!-- <h4 class="card-title">Add Employee</h4> -->


                                               <!-- Brand -->
                            <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label" for="exampleFormControlSelect1">Brand Type</label>
                            <div class="col-sm-9">
                            <select class="form-control" name="brand_types_id" id="exampleFormControlSelect1">
                            <option value=''>Choose Brand</option>
                            @foreach($brandtypes as $brandtype)
                            <option value="{{ $brandtype->id }}">{{ $brandtype->name }}</option>
                             @endforeach
                            </select>   
                            </div>
                            </div>

                                               <div class="form-group row">
                              <label class="col-sm-3 text-right control-label col-form-label" for="exampleFormControlSelect1">Vehicle Type</label>
                             <div class="col-sm-9 dropdown">
                            <select class="form-control" name="vehicle_types_id" id="exampleFormControlSelect1">
                            <option value=''>Choose Vehicle</option>
                              @foreach($vehicletypes as $vehicletype)
                              <img src="{{Storage::url('vehicletype/'.$vehicletype->image)}}"/>      <option value="{{ $vehicletype->id }}">{{ $vehicletype->name }}</option>
                            @endforeach
                        </select>
                          </div>
                         </div>
                               
                        <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Model Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Model Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Model Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="modelcode" class="form-control" id="name" placeholder="Enter Model Code">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Battary Size</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="battary_size" class="form-control" id="name" placeholder="Enter Battary Size">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Charging Standard</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="charging_standard" class="form-control" id="name" placeholder="Enter Charging Standard">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Compatiable Charging</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="compatiable_charging" class="form-control" id="name" placeholder="Enter Compatiable Charging">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Range</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="range" class="form-control" id="name" placeholder="Enter Range">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">DC Charging Time</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="dc_charging_time" class="form-control" id="name" placeholder="Enter DC Charging Time">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Home Plug Charging Time</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="home_plug_charging_time" class="form-control" id="name" placeholder="Enter Home Plug Charging Time">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Swappable  Battary</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="swappable_battary" class="form-control" id="status" placeholder="Status">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="price" class="form-control" id="price" placeholder="Enter Price">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="description" class="form-control" id="description" placeholder="Enter Description">
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
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="status" class="form-control" id="status" placeholder="Status">
                                            <option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                    </div>
                                </div>



                              
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
        

     
    </div>

    @endsection
   