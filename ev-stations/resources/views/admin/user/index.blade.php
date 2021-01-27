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
                  <li class="breadcrumb-item active"><a href="{{route('admin.user.index')}}">User</a></li>
                  <li class="breadcrumb-item  active" aria-current="page">User</li>
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

        <form action="{{route('admin.user.search')}}" method="GET" class="form-horizontal">
            <div class="card-body">
                <!-- <h4 class="card-title">Search</h4> -->
                <div class="form-group row">
                    <!-- <label class="col-sm-3 text-right control-label col-form-label"></label> -->
                    <div class="col-sm-8">
                        <input type="text" name="search" class="form-control" id="firstname" placeholder="User name">
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-success">Search</button>
                    <a href="{{route('admin.user.index')}}" class="btn btn-md btn-danger">Clear</a>
                    <a class="btn btn-md btn-info " href="{{ route('admin.user.create') }}" ><i class="fa fa-plus"> </i>Add User</a>
                </div>
            </div>
        </form>
    </div>
   </div>
</div>

<!-- RRRRRRRRRRRRRRRR -->


<div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Users</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                  <th scope="col" class="sort" data-sort="id">Id</th>
                    <th scope="col" class="sort" data-sort="name">First Name</th>
                    <th scope="col" class="sort" data-sort="name">Last Name</th>
                    <th scope="col" class="sort" data-sort="name">User Name</th>
                    <th scope="col" class="sort" data-sort="name">Image</th>
                    <th scope="col" class="sort" data-sort="budget">Role</th>
                    <th scope="col" class="sort" data-sort="email">Email</th>
                    <th scope="col" class="sort" data-sort="mobile">Mobile</th>
                    <th scope="col" class="sort" data-sort="state">State</th>
                    <th scope="col" class="sort" data-sort="city">City</th>
                    <th scope="col" class="sort" data-sort="company">Company</th>
                    <th scope="col" class="sort" data-sort="created_at">Created Date</th>
                    <th scope="col" class="sort" data-sort="status">Status</th>
                    <th scope="col" class="sort" data-sort="completion">Completion</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                @foreach($users as $user)
                <?php $userslug  = str_slug($user->username);?>
                                    <tr role="row" class="odd">
                                        <th>{{$loop->index+1}}</th>
                                        <td class="sorting_1">{{$user->firstname}}</td>
                                        <td class="sorting_1">{{$user->lastname}}</td>
                                        <td class="sorting_1">{{$user->username}}</td>
                                        <td>
                                        <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="{{$user->username}}">
                          <img alt="" src="{{Storage::url('uploads/gallery/users/'.$user->image)}}">
                        </a>
                      </div></td>
                                        <td>{{$user->role->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->mobile}}</td>
                                        <td>{{$user->state->name}}</td>
                                        <td>{{$user->city->name}}</td>
                                        <td>{{$user->company->name}}</td>
                                        <td>{{$user->created_at}}</td>

                                        @if($user->status== '1')
                                            <td>Active</td>
                                        @else
                                            <td>Deactive</td>
                                         @endif
                                        <td>
                                            
                                            <a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{route('admin.user.show',$user->id)}}" class="btn btn-success btn-sm waves-effect">View</a>                                        </a>
                                          
                                            <form id="delete-form-{{ $user->id }}" action="{{route('user.delete',$user->id)}}" method="put">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="deletePost({{ $user->id }})" class="btn btn-sm btn-danger">Delete</button>
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
                          {{ $users->links() }}
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
