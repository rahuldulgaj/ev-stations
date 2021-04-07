@extends('theme.newdefault')

@section('content')

@livewireStyles


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
        <li class="breadcrumb-item active"><a href="{{route('admin.chargingstations.index')}}">Charging Stations</a></li>
                  <li class="breadcrumb-item  active" aria-current="page">Charging Stations</li>
                </ol>
              </nav>
            </div>
            <!-- <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div> -->
          </div>
      
        </div>   </div>
      
        </div>

        <div class="container-fluid">

        
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <form action="{{route('admin.chargingstations.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="card-body">
         
                            <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Station Type</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="usagetype_id" class="form-control" id="status" placeholder="usagetype_id">
                                            <option value="1">Public</option>
                                            <option value="2">Private</option>
                                            <option value="3">Swappable</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Charging Stations">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="code" class="form-control" id="evs_code" placeholder="Enter Code">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Owner Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="ownername" class="form-control" id="ownername" placeholder="Enter Owner Name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" class="form-control" id="ownername" placeholder="Enter Email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Web Sites </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="websites" class="form-control" id="ownername" placeholder="Enter websites">
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
                                <!-- <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Usage Type</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="usagetype" class="form-control" id="usagetype" placeholder="Enter Usage Type">
                                    </div>
                                </div> -->

                               
                                <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Availbility</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="time_slot_id" class="form-control" id="status" placeholder="Status">
                                            <option value="1">Open 24/7</option>
                                            <option value="2">Sunday Closed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                 <label class="col-sm-3 text-right control-label col-form-label">Select Automated Status</label>
                           <div class="col-sm-9">
                             <select name="automated_status_id" class="form-control show-tick">
                                 <option value="" disabled selected>Choose Automated</option>
                                 @foreach($automatedstatus as $automated)
                                     <option value="{{$automated->id}}">{{$automated->name}}</option>
                                 @endforeach
                             </select>
                         </div>
                         </div>
<!-- PORTS DETAILS -->

                         <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">No of Ports</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="numbers_of_ports" class="form-control" id="status" placeholder="network">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                </div>

                         <!-- <div class="form-group row">
    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Port</label>
    <div class="col-sm-9">
    <select multiple class="form-control" id="exampleFormControlSelect2" name="connector_type_id[]">
    @foreach($chargertypes as $chargertype)
                                     <option value="{{$chargertype->id}}">{{$chargertype->name}}</option>
                                 @endforeach
    </select>
  </div> </div> -->




                              <div class="card">
        <div class="card-header">
        Add  Ports 
        </div>

        <div class="card-body">
            <table class="table" id="products_table">
                <thead>
                    <tr>
                        <th>Connector</th>
                        <th>Network</th>
                        <th>Kwatt</th>
                        <th>Amps</th>
                        <th>Free</th>
                        <th>Price</th>
                        <th>Rate per </th>
                       
                    </tr>
                </thead>
                <tbody>
                    <tr id="product0">
                        <td>
                            <select name="connector_type_id[]" class="form-control">
                                <option value="">-- choose Connector --</option>
                                @foreach ($connectortypes as $connectortype)
                                    <option value="{{ $connectortype->id }}">
                                        {{ $connectortype->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        <select type="text" name="brand_id[]" class="form-control" id="network" placeholder="network">
                        @foreach ($brandtypeslist as $brandtypes)
                                    <option value="{{ $brandtypes->id }}">
                                        {{ $brandtypes->name  }}
                                    </option>
                                @endforeach
                                        </select>
                        </td>
                      
                 <td> <input type="number" name="kwatt[]" class="form-control" /> </td>
                 <td><input type="number" name="amps[]" class="form-control"  /> </td>
                 <td><label class="custom-toggle">
  <input  data-id="0" id="rate-enable"   type="checkbox"  class="rate-enable" />
  <span class="custom-toggle-slider rounded-circle"></span>
</label></td>

                 <td> <input type="number" name="price[]" class="ingredient-amount form-control" /> </td>
                
                 <td>
                 <select type="text" name="rate_id[]" class="form-control" id="rate" placeholder="Rate">
                                <option value="">-- choose rate --</option>
                                <option value="1">Per hrs</option>
                                <option value="2">Per Session</option>
                                <option value="3">per Kwatt</option>
                  </select>
                  </td>

                        
                    </tr>
                    <tr id="product1"></tr>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-12">
                    <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                    <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                </div>
            </div>
        </div>
    </div>
    <div>
                               <!-- <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="price[]" class="form-control" id="price" placeholder="Enter Price">
                                    </div>
                                </div> -->


                                <!-- <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Kwatt</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="kwatt" class="form-control" id="name" placeholder="Enter KWatt">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Amps</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="amps" class="form-control" id="name" placeholder="Enter Amps">
                                    </div>
                                </div> -->
                                <!-- <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Rate</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="rate_id" class="form-control" id="status" placeholder="Rate">
                                            <option value="1">Per hrs</option>
                                            <option value="2">Per Session</option>
                                            <option value="3">per Kwatt</option>
                                        </select>
                                    </div>
                                </div> -->
                               
                                <!-- <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Network</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="network_id" class="form-control" id="status" placeholder="network">
                                            <option value="1">Texla</option>
                                            <option value="2">DC Hydra</option>
                                            <option value="3">Azra</option>
                                        </select>
                                    </div>
                                </div> -->

                                <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Speed Type</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="speed_type_id" class="form-control" id="status" placeholder="speed_type_id">
                                            <option value="1">Super fast</option>
                                            <option value="2">Super</option>
                                            <option value="3">Slow</option>
                                        </select>
                                    </div>
                                </div>
                                

                                <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="description" class="form-control" id="description" placeholder="Enter Description">
                                    </div>
                                </div>
                           <!-- COUNTRY STATE CITY DROP DOWN-->

                                @livewire('country-state-city',['country', 'state','city'])


                              


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
    @livewireScripts

    @endsection

    @section('scripts')


            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
          <script type="text/javascript">

$(document).ready(function(){
    let row_number = 1;
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#rate-enable' + row_number).html($('#rate-enable' + new_row_number).html()).find('td:first-child');
      $('#products_table').append('<tr id="product' + (row_number + 1) + '"> </tr>');
    
      
       row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
  $('document').ready(function () {
          $('#rate-enable').on('click', function () {
              let id = $(this).attr('data-id')
              {alert(id);}
              let enabled = $(this).is(":checked")
              {alert(enabled);}
              $('.ingredient-amount[data-id="' + id + '"]').attr('disabled', !enabled)
              $('.ingredient-amount[data-id="' + id + '"]').val(null)
          })
      });
    </script>

    @push('scripts')
    @endsection

    