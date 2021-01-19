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
                  <li class="breadcrumb-item active"><a href="{{route('admin.city.index')}}">City</a></li>
                  <li class="breadcrumb-item  active" aria-current="page">City</li>
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
                <div class="col-md-10">
                    <div class="card">
                        <form action="{{route('admin.city.update',$city->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                      
                            <div class="card-body">
                                <h4 class="card-title">ADD CITY</h4>
             

                                <div class="flex flex-col justify-around h-full">
    @livewire('country-state', ['country'=>$city->country_id , 'state'=>$city->state_id])
</div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">City Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="name" value="{{$city->name}}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">city Code</label>
                                    <div class="col-sm-9">
                               <input type="text" name="citycode" class="form-control" id="citycode" value="{{$city->citycode}}" >
                                    </div>
                                </div>

                                <!-- <div class="form-group row">
                 <label class="col-sm-3 text-right control-label col-form-label">Select State</label>
                           <div class="col-sm-9">
                             <select name="state_id" class="form-control show-tick">
                                 <option value="" disabled selected>Choose State</option>
                                 @foreach($statelist as $state)
                    <option value="{{$state->id}}"    {{ $state->id ==$city->state_id ? 'selected' : '' }} >{{$state->name}}</option>
                                 @endforeach
                             </select>
                         </div>
                         </div> -->
                         
                                <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="status" class="form-control" id="status" placeholder="Status">
                                            <option value="1" {{ $city->status=='1' ? 'selected' : '' }}>Active</option>
                                            <option value="2" {{ $city->status=='2' ? 'selected' : '' }}>Deactive</option>
                                        </select>
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
        @livewireScripts

       
    </div>

@endsection