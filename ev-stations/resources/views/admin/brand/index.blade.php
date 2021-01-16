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
                  <li class="breadcrumb-item active"><a href="{{route('admin.brand.index')}}">Brand</a></li>
                  <li class="breadcrumb-item  active" aria-current="page">Brand</li>
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

        <form action="{{route('admin.brand.search')}}" method="GET" class="form-horizontal">
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
                    <button type="submit" class="btn btn-sm btn-neutral">Search</button>
                    <a href="{{route('admin.brand.index')}}" class="btn btn-sm btn-neutral">Clear</a>
                    <a class="btn btn-sm btn-neutral"  href="{{ route('admin.brand.create') }}" ><i class="fa fa-plus"> </i>Add Brand</a>
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
              <h3 class="mb-0">Brands</h3>
            </div>
            <!-- Light table -->


            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                  <th scope="col" class="sort" data-sort="id">Sno</th>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="code">Code</th>
                    <th scope="col" class="sort" data-sort="image">Image</th>
                    <th scope="col" class="sort" data-sort="created_at">Created Date</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                
                  <tbody class="list">
                  @foreach($brands as $brand)
                 
                                    <tr role="row" class="odd">
                                        <th>{{$loop->index+1}}</th>
                                        <td class="sorting_1">{{$brand->name}}</td>
                                        <td class="sorting_1">{{$brand->brandcode}}</td>
                                        <td>
                                        <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="{{$brand->name}}">
                          <img alt="" src="{{Storage::url('brand/'.$brand->image)}}">
                        </a>
                      </div></td>
                                        <td class="sorting_1">{{$brand->created_at}}</td>
                                        @if($brand->status== '1')
                                            <td>Active</td>
                                        @else
                                            <td>Deactive</td>
                                         @endif
                                        <td>
                      <a href="{{route('admin.brand.edit',$brand->id)}}" class="btn btn-sm btn-info">Edit</a>
                      <a href="{{route('admin.brand.show',$brand->id)}}" class="btn btn-success btn-sm waves-effect">View</a>
                      <form id="delete-form-{{ $brand->id }}" action="{{route('admin.brand.destroy',$brand->id)}}" method="put">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="deletePost({{ $brand->id }})" class="btn btn-sm btn-danger">Delete</button>
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
                          {{ $brands->links() }}
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
@endsection



