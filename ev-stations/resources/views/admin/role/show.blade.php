@extends('theme.default')

@section('title', 'Show Role')

@push('styles')


@endpush


@section('content')
    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header bg-indigo">
                    <h2>SHOW ROLE</h2>
                </div>

                <div class="header">
                    <h2>
                        {{$role->rolename}}
                        <br>
                        <small>Posted By <strong>{{$role->rolename}}</strong> on {{$role->created_at->toFormattedDateString()}}</small>
                    </h2>
                </div>

                <div class="header">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Role Name : </strong>
                            <span class="right">  {{$role->rolename}}</span>
                        </li>
                       
                        <li class="list-group-item">
                            <strong>Role Status : </strong>
                            <span class="right">{{$role->status}}</span>
                        </li>
                      
                    </ul>
                </div>

              
            </div> 
           


        </div>
        

    </div>


@endsection

