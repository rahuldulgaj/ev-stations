@extends('theme.newdefault')


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
                  <li class="breadcrumb-item active"><a href="{{route('admin.amenities.index')}}">Amenities</a></li>
                  <li class="breadcrumb-item  active" aria-current="page">Amenities</li>
                </ol>
              </nav>
            </div>
            <!-- <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div> -->
          </div>
        </div>  </div>


      


<div class="row">



<div class="col-md-12">
    <div class="card shadow mb-4">
      
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Search</h6>
            </div>

        <form action="{{route('admin.amenities.search')}}" method="GET" class="form-horizontal">
            <div class="card-body">
                <!-- <h4 class="card-title">Search</h4> -->
                <div class="form-group row">
                    <!-- <label class="col-sm-3 text-right control-label col-form-label"></label> -->
                    <div class="col-sm-8">
                        <input type="text" name="search" class="form-control" id="firstname" placeholder="Brand Name">
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-success">Search</button>
                    <a href="{{route('admin.amenities.index')}}" class="btn btn-md btn-danger">Clear</a>
                    <a class="btn btn-md btn-info " href="{{ route('admin.amenities.create') }}" ><i class="fa fa-plus"> </i>Add Amenities</a>
                </div>
            </div>
        </form>
    </div>
   </div>
</div>

               <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Record</h6>
            </div>


            <div class="card-body">
              <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
                <div class="col-sm-12 col-md-6">
                <div class="dataTables_length" id="dataTable_length">
                <label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                </select> entries</label></div></div>
                <div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Sno: activate to sort column descending" style="width: 58px;">Sno</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 58px;">Name</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 58px;">Code</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 68px;">Created Date</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 67px;">Status</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 67px;">Action</th>
                    </tr>
                  </thead>

                  <tfoot>
                    <tr><th rowspan="1" colspan="1">Sno</th>
                    <th rowspan="1" colspan="1">Name</th>
                    <th rowspan="1" colspan="1">Image</th>
                   <th rowspan="1" colspan="1">Created  Date</th>
                   <th rowspan="1" colspan="1">Status</th>
                   <th rowspan="1" colspan="1">Action</th></tr>
                  </tfoot>
                  <tbody>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                  @foreach($amenities as $amenitie)
                 
                                    <tr role="row" class="odd">
                                        <th>{{$loop->index+1}}</th>
                                        <td class="sorting_1">{{$amenitie->name}}</td>
                                
                                        <td class="sorting_1">
                                        @if(Storage::disk('public')->exists('amenities/'.$amenitie->image) && $amenitie->image)
                                   <img src="{{Storage::url('amenities/'.$amenitie->image)}}" alt="{{$amenitie->name}}" width="60" class="img-responsive img-rounded">
                                        @endif   </td>
                                        <td class="sorting_1">{{$amenitie->created_at}}</td>
                                        @if($amenitie->status== '1')
                                            <td>Active</td>
                                        @else
                                            <td>Deactive</td>
                                         @endif
                                        <td>
                                      
 
                                            <a href="{{route('admin.amenities.edit',$amenitie->id)}}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{route('admin.amenities.show',$amenitie->id)}}" class="btn btn-success btn-sm waves-effect">View</a>                                        </a>
                                          
                                            <form id="delete-form-{{ $amenitie->id }}" action="{{route('admin.amenities.destroy',$amenitie->id)}}" method="put">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="deletePost({{ $amenitie->id }})" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                    
                    
                    
               
                    
                
                    </tbody>
                </table></div></div>
                <div class="row"><div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite"></div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination">
         <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">
                          {{ $amenities->links() }}
                            </a></li>
               </ul></div></div></div></div>
              </div>
            </div>
          </div>
@endsection



