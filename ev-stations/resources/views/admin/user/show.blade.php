@extends('theme.default')



@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

 <div class="row">
          <?php //echo storage_path(); ?>

                    <div class="col-lg-12">
                        <!-- <h1 class="page-header">My Users</h1> -->
                        <h4 class="page-title">User</h4>
                    </div>
                     <div class="ml-auto text-right">  
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('user')}}">User</a></li>
                            </ol>
                        </nav>
                    </div>
                    </div>
<!-- /.col-lg-12 -->

<div class="row">
          <?php //echo storage_path(); ?>

                    <div class="col-lg-9">
                       <div class="card">
                                           <div class="header">
                                                <h2>
                                                    {{$user->first_name}}

                                                    <small>Posted By <strong>{{$user->first_name}}</strong> on {{$user->created_at->toFormattedDateString()}}</small>
                                                </h2>
                                            </div>
                                                <div class="header">
                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            <strong>First Name : </strong>
                                                            <span class="right"> {{$user->first_name}}</span>
                                                        </li>
                                                    
                                                        <li class="list-group-item">
                                                            <strong>Last Name : </strong>
                                                            <span class="right">{{$user->last_name}}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <strong>Father Name : </strong>
                                                            <span class="right">{{$user->fathername}}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <strong>Mother Name : </strong>
                                                            <span class="right">{{$user->mothername}}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <strong>Contact No : </strong>
                                                            <span class="right">{{$user->phone}}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <strong>Alternate Contact No : </strong>
                                                            <span class="right">{{$user->alternatecontact}}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <strong>Address : </strong>
                                                            <span class="left">{{$user->address}}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <strong>Permanent Address : </strong>
                                                            <span class="left">{{$user->permanentaddress}}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <strong>City : </strong>
                                                            <span class="right">{{$user->city}}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <strong>Age : </strong>
                                                            <span class="right">{{$user->age}}</span>
                                                        </li>
                                                    
                                                        <li class="list-group-item">
                                                            <strong>Gender : </strong>
                                                            <span class="left">{{$user->gender}}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <strong>Employee ID : </strong>
                                                            <span class="right">{{$user->employee_id}}</span>
                                                        </li>
                                                    
                                                        <li class="list-group-item">
                                                            <strong>Role : </strong>
                                                            <span class="left">{{$user->role}}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <strong>Salary : </strong>
                                                            <span class="left">{{$user->salary}}</span>
                                                        </li>
                                                    
                                                        <li class="list-group-item">
                                                            <strong>Joining Date : </strong>
                                                            <span class="left">{{$user->join_date}}</span>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <strong>Department : </strong>
                                                            <span class="left">{{$user->department}}</span>
                                                        </li>
                                                    
                                                    </ul>
                                                </div>
                             </div> 
                     </div>
     
                     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
      <div class="card h-30">
        @if( $user->image)
        <img class="img-responsive" src="{{asset('uploads/gallery/'. $user->employee_id.'/'. $user->image) }}" alt="{{$user->first_name}}">

        @else
        <img class="card-img-top" src="http://placehold.it/200x200" alt="">
        @endif
        <div class="card-body">
          <h4 class="card-title">
           Profile Image
          </h4>
        </div>
      </div>

<!-- RESUME -->

      <div class="card h-30">
        @if( $user->image)
        <img class="img-responsive" src="{{asset('uploads/gallery/'.$user->employee_id.'/'.$user->resume)}}" alt="{{$user->first_name}}">

        @else
        <img class="card-img-top" src="http://placehold.it/200x200" alt="">
        @endif
        <div class="card-body">
          <h4 class="card-title">
               Resume          </h4>
        </div>
      </div>

<!-- ID PROOF -->
      <div class="card h-30">
        @if( $user->image)
        <img class="img-responsive" src="{{Storage::url('uploads/gallery/'.$user->employee_id.'/'.$user->id_proof)}}" alt="{{$user->first_name}}">

        @else
        <img class="card-img-top" src="http://placehold.it/200x200" alt="">
        @endif
        <div class="card-body">
          <h4 class="card-title">
ID Proof          </h4>
        </div>
      </div>


      <div class="card h-30">
        @if( $user->image)
        <img class="img-responsive" src="{{Storage::url('uploads/gallery/'.$user->employee_id.'/'.$user->offer_letter)}}" alt="{{$user->first_name}}">

        @else
        <img class="card-img-top" src="http://placehold.it/200x200" alt="">
        @endif
        <div class="card-body">
          <h4 class="card-title">
Offer Letter          </h4>
        </div>
      </div>
<!-- NOC -->
      <div class="card h-30">
        @if( $user->image)
        <img class="img-responsive" src="{{Storage::url('uploads/gallery/'.$user->employee_id.'/'.$user->noc)}}" alt="{{$user->first_name}}">

        @else
        <img class="card-img-top" src="http://placehold.it/200x200" alt="">
        @endif
        <div class="card-body">
          <h4 class="card-title">
           NOC
          </h4>
        </div>
      </div>


      <div class="card h-30">
        @if( $user->image)
        <img class="img-responsive" src="{{Storage::url('uploads/gallery/'.$user->employee_id.'/'.$user->hscc)}}" alt="{{$user->first_name}}">

        @else
        <img class="card-img-top" src="http://placehold.it/200x200" alt="">
        @endif
        <div class="card-body">
          <h4 class="card-title">
HSSC        </h4>
        </div>
      </div>


      <div class="card h-30">
        @if( $user->image)
        <img class="img-responsive" src="{{Storage::url('uploads/gallery/'.$user->employee_id.'/'.$user->sscc)}}" alt="{{$user->first_name}}">

        @else
        <img class="card-img-top" src="http://placehold.it/200x200" alt="">
        @endif
        <div class="card-body">
          <h4 class="card-title">
SSC          </h4>
        </div>
      </div>
      <div class="card">                    
           
                <a class="btn btn-primary btn-icon-split"href="{{route('user.edit',$user->id)}}">
                    <span class="icon text-white-50">
                      <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Edit</span>
                  </a>
                  <a class="btn btn-info btn-icon-split"href="{{route('user')}}">
                    <span class="icon text-white-50">
                      <i class="fas fa-arrow"></i>
                    </span>
                    <span class="text">Back</span>
                  </a>
                </div>
    </div>




                    </div>

 @endsection
