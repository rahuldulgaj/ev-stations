@extends('theme.newdefault')

@section('title', 'Show Brand')

@push('styles')


@endpush


@section('content')

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
                  <li class="breadcrumb-item active"><a href="{{route('admin.vehicletype.index')}}">Vehicle Type</a></li>
                  <li class="breadcrumb-item  active" aria-current="page">Vehicle Type</li>
                </ol>
              </nav>
            </div>
            <!-- <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div> -->
          </div>
      
        </div>


   
    <div class="block-header"></div>
    <div class="row clearfix">
        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header bg-primary">
                    <h2>SHOW Vehicle Type</h2>
                </div>

                <div class="header">
                    <h2>
                        <br>

                    </h2>
                </div>

                <div class="header">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Vehicle Type : </strong>
                       
                        </li>
                     
                    </ul>
                </div>

              
            </div> 
           


        </div>
        

    </div>


@endsection

