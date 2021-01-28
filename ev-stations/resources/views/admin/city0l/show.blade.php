@extends('theme.default')

@section('title', 'Show City')

@push('styles')


@endpush


@section('content')
    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header bg-indigo">
                    <h2>SHOW cities</h2>
                </div>

                <div class="header">
                    <h2>
                        {{$cities->citiesname}}
                        <br>
                        <small>Posted By <strong>{{$cities->cityname}}</strong> on {{$cities->created_at->toFormattedDateString()}}</small>
                    </h2>
                </div>

                <div class="header">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>cities Name : </strong>
                            <span class="right">  {{$cities->name}}</span>
                        </li>
                       
                        <li class="list-group-item">
                            <strong>cities Code : </strong>
                            <span class="right">{{$cities->citycode}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>State: </strong>
                            <span class="right">{{$cities->statename}}</span>
                        </li>
                        
                    </ul>
                </div>

              
            </div> 
           


        </div>
        

    </div>


@endsection

