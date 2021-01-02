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
                    <h4 class="page-title">System Manager</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.company.index')}}">Company</a></li>
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
                        <form action="{{route('admin.company.update',$company->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                         
                            <div class="card-body">
                                <!-- <h4 class="card-title">ADD Company</h4> -->
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Company Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="chargertype" value="{{$company->name}}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Company Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="companycode" class="form-control" id="companycode" value="{{$company->companycode}}" >
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Charger Company</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="ct_company" class="form-control" id="ct_company" value="{{$company->ct_company}}" >
                                    </div>
                                </div> -->
                              

                                <div class="form-group row">
                                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select type="text" name="status" class="form-control" id="status" placeholder="Status">
                                            <option value="1" {{ $company->status=='1' ? 'selected' : '' }}>Active</option>
                                            <option value="2" {{ $company->status=='2' ? 'selected' : '' }}>Deactive</option>
                                        </select>
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