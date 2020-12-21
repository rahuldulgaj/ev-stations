@extends('theme.default')

@section('title', 'Show Automated')

@push('styles')


@endpush


@section('content')
    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header bg-indigo">
                    <h2>SHOW Automated Status</h2>
                </div>

                <div class="header">

                </div>

                <div class="header">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Name : </strong>
                            <span class="right">  {{$automatedStatus->name}}</span>
                        </li>
                       
                        <li class="list-group-item">
                            <strong>Status : </strong>
                            <span class="right">{{$automatedStatus->status}}</span>
                        </li>
                      
                    </ul>
                </div>

              
            </div> 
           


        </div>
        

    </div>


@endsection

