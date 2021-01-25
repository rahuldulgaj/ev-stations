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
                  <li class="breadcrumb-item active"><a href="{{route('admin.vehicletype.index')}}">Vehicle Types</a></li>
                  <li class="breadcrumb-item  active" aria-current="page">Vehicle Types</li>
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

        <form action="{{route('admin.vehicletype.search')}}" method="GET" class="form-horizontal">
       
            <div class="card-body">
                <!-- <h4 class="card-title">Search</h4> -->
                <div class="form-group row">
                    <!-- <label class="col-sm-3 text-right control-label col-form-label"></label> -->
                    <div class="col-sm-8">
                        <input type="text" name="search" class="form-control" id="firstname" placeholder="Vehicle Types">
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-sm btn-neutral">Search</button>

                    <a href="{{route('admin.vehicletype.index')}}" class="btn btn-sm btn-neutral">Clear</a>
                    <a class="btn btn-sm btn-neutral" href="{{ route('admin.vehicletype.create') }}" ><i class="fa fa-plus"> </i>Add Vehicle Types</a>
                 
                 
                
                </div>
            </div>
        </form>
    </div>
   </div>
</div>
<!-- ############## -->
           
<div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Records</h3>
            </div>

            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                  <th scope="col" class="sort" data-sort="id">Id</th>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="image">Images</th>
                    <th scope="col" class="sort" data-sort="created_at">Created Date</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                    
                @foreach($vehicletypes as $vehicletype)
                 
                                    <tr role="row" class="odd">
                                        <th>{{$loop->index+1}}</th>
                                        <td class="sorting_1">{{$vehicletype->name}}</td>
                                
                                        <td class="sorting_1">
                                        @if(Storage::disk('public')->exists('vehicletype/'.$vehicletype->image) && $vehicletype->image)
                                   <img src="{{Storage::url('vehicletype/'.$vehicletype->image)}}" alt="{{$vehicletype->name}}" width="60" class="img-responsive img-rounded">
                                        @endif   </td>
                                        <td class="sorting_1">{{$vehicletype->created_at}}</td>
                                        @if($vehicletype->status== '1')
                                            <td>Active</td>
                                        @else
                                            <td>Deactive</td>
                                         @endif
                                        <td>
                                      
 
                                            <a href="{{route('admin.vehicletype.edit',$vehicletype->id)}}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{route('admin.vehicletype.show',$vehicletype->id)}}" class="btn btn-success btn-sm waves-effect">View</a>                                        </a>
                                          
                                            <form id="delete-form-{{ $vehicletype->id }}" action="{{route('admin.vehicletype.destroy',$vehicletype->id)}}" method="put">
                                                @csrf
                                                @method('DELETE')
                                    <button type="button" onclick="deletePost({{ $vehicletype->id }})" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                    
                    
                    
               
                    
                
                    </tbody>
                </table></div></div>
                <div class="row"><div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite"></div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination">
         <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">
                          {{ $vehicletypes->links() }}
                            </a></li>
               </ul></div></div></div></div>
              </div>
            </div>
          </div>


          {{--sweetalert box for deleting start--}}
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.8/dist/sweetalert2.all.min.js"></script>

            <script type="text/javascript">
                function deletePost(id)
                {
                    const swalWithBootstrapButtons = swal.mixin({
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger',
                        buttonsStyling: false,
                    })

                    swalWithBootstrapButtons({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            event.preventDefault();
                            document.getElementById('delete-form-'+id).submit();
                        } else if (
                            // Read more about handling dismissals
                            result.dismiss === swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons(
                                'Cancelled',
                                'Your file is safe :)',
                                'error'
                            )
                        }
                    })
                }

            </script>
            {{--sweetalert box for deleting end--}}   



@endsection



