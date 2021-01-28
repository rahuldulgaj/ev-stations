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
                  <li class="breadcrumb-item active"><a href="{{route('admin.modeltype.index')}}">Model Types</a></li>
                  <li class="breadcrumb-item  active" aria-current="page">Model Types</li>
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

        <form action="{{route('admin.modeltype.search')}}" method="GET" class="form-horizontal">
            <div class="card-body">
                <!-- <h4 class="card-title">Search</h4> -->
                <div class="form-group row">
                    <!-- <label class="col-sm-3 text-right control-label col-form-label"></label> -->
                    <div class="col-sm-8">
                        <input type="text" name="search" class="form-control" id="firstname" placeholder="Model Types">
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                <span class="input-group-btn mr-6 mt-1">
                            <button class="btn btn-info" type="submit"  title="Search projects">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>

                        <a href="{{ route('admin.modeltype.index') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                              </button></span> </a>

                        <a href="{{ route('admin.modeltype.create') }}" class=" mt-1">
                        <span class="btn-label">
                        <button type="button" class="btn btn-labeled btn-primary" title="Add New">
                  <i class="fas fa-plus"></i>
                  </span></button></a>  
                   
                   
                    <!-- <button type="submit" class="btn btn-success">Search</button>
                    <a href="{{route('admin.modeltype.index')}}" class="btn btn-md btn-danger">Clear</a>
                    <a class="btn btn-md btn-info " href="{{ route('admin.modeltype.create') }}" ><i class="fa fa-plus"> </i>Add Model</a> -->
                </div>
            </div>
        </form>
    </div>
   </div>
</div>

         <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Model Types</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                  <th scope="col" class="sort" data-sort="id">Id</th>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="created_at">Created Date</th>
                    <th scope="col" class="sort" data-sort="status">Images</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                @foreach($modeltypes as $modeltype)
                                    <tr modeltype="row" class="odd">
                                        <th>{{$loop->index+1}}</th>
                                        <td class="sorting_1">{{$modeltype->name}}</td>
                                        <td class="sorting_1">{{$modeltype->created_at}}</td>
                                        <td>
                                        <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="{{$modeltype->name}}">
                          <img alt="" src="{{ url('storage/model/'.$modeltype->image) }}">
                        </a>
                      </div></td>

                                        @if($modeltype->status== '1')
                                            <td>Active</td>
                                        @else
                                            <td>Deactive</td>
                                         @endif
                                        <td>

                                        <!-- <span class="input-group-btn">
                                <button class="btn btn-warning" onclick="deletePost({{ $modeltype->id }})" type="button" title="Delete">
                                    <span class="fas fa-edit"></span>
                                </button>
                            </span> -->
                     <a href="{{route('admin.modeltype.edit',$modeltype->id)}}" class="btn btn-sm btn-info">Edit</a>

                  <form id="delete-form-{{ $modeltype->id }}" action="{{route('admin.modeltype.destroy',$modeltype->id)}}"
                   method="POST">
                  @method('DELETE')
                  @csrf
                            <span class="input-group-btn">
                          <button class="btn btn-sm btn-danger" onclick="deletePost({{ $modeltype->id }})" type="button" title="Delete">Delete</button>
                            </span>

                        <!-- <button type="button" onclick="deletePost({{ $modeltype->id }})" class="btn btn-sm btn-danger">Delete</button> -->
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                
                </tbody>
              </table>
            </div>
       
       
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul  class="pagination justify-content-end mb-0">
                  <!-- <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li> -->
                  <!-- <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li> -->
                  
         <li class="page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">
                          {{  $modeltypes->links() }}
                            </a></li>
               
                  <!-- <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li> -->
                </ul>
              </nav>
            </div>
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


