@extends('theme.default')

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
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">System Manager</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.city.index')}}">User</a></li>
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