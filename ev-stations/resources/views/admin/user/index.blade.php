@extends('theme.default')



@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
<!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Users</h1>
  <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> 
</div> -->

<div class="row">

    <div class="col-lg-12">

        <!-- <h1 class="page-header">My Users</h1> -->
        <h4 class="page-title">User Management</h4>
    </div>
    <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.user.index')}}">User</a></li>
                                </ol>
                            </nav>
                        </div>
    <!-- /.col-lg-12 -->

</div>

<div class="row">



<div class="col-md-12">
    <div class="card shadow mb-4">
      
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Search</h6>
            </div>

        <form action="{{route('user.search')}}" method="GET" class="form-horizontal">
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

               <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User Record</h6>
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
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 58px;">First Name</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 58px;">Last Name</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 58px;">User Name</th>
                   
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Image: activate to sort column ascending" style="width: 63px;">Image</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 50px;">Role</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 31px;">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="State: activate to sort column ascending" style="width: 31px;">State</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="City: activate to sort column ascending" style="width: 31px;">City</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Company: activate to sort column ascending" style="width: 31px;">Company</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 68px;">Create Date</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 67px;">Status</th>
                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 67px;">Action</th>
                    </tr>
                  </thead>

                  <tfoot>
                    <tr><th rowspan="1" colspan="1">Sno</th>
                    <th rowspan="1" colspan="1">First Name</th>
                    <th rowspan="1" colspan="1">Last Name</th>
                    <th rowspan="1" colspan="1">User Name</th>
                    <th rowspan="1" colspan="1">Image</th>
                    <th rowspan="1" colspan="1">Role</th>
                    <th rowspan="1" colspan="1">Email</th>
                    <th rowspan="1" colspan="1">State</th>
                    <th rowspan="1" colspan="1">City</th>
                    <th rowspan="1" colspan="1">Company</th>
                    <th rowspan="1" colspan="1">Create Date</th>
                    <th rowspan="1" colspan="1">Status</th>
                    <th rowspan="1" colspan="1">Action</th></tr>
                  </tfoot>
                  <tbody>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                       
                  @foreach($users as $user)
                  <?php $userslug  = str_slug($user->username);?>
                                    <tr role="row" class="odd">
                                        <th>{{$loop->index+1}}</th>
                                        <td class="sorting_1">{{$user->firstname}}</td>
                                        <td class="sorting_1">{{$user->lastname}}</td>
                                        <td class="sorting_1">{{$user->username}}</td>
                                        <td><img src="{{ asset('uploads/gallery/'.$userslug.'/'. $user->image) }}" width="80px" height="80px" alt="Image"> </td>
                                        <td>{{$user->role->name}}</td>
                                        <td>{{$user->email}}</td>
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
                </table></div></div>
                <div class="row"><div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite"></div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination">
         <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">
                          {{ $users->links() }}
                            </a></li>
               </ul></div></div></div></div>
              </div>
            </div>
          </div>
          
@endsection
