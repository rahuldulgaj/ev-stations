@extends('theme.default')

@section('title', 'Show State')

@push('styles')


@endpush


@section('content')
    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header bg-indigo">
                    <h2>SHOW State</h2>
                </div>

                <div class="header">
                    <h2>
                        {{$state->statename}}
                        <br>
                        <small>Posted By <strong>{{$state->statename}}</strong> on {{$state->created_at->toFormattedDateString()}}</small>
                    </h2>
                </div>

                <div class="header">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>State Name : </strong>
                            <span class="right">  {{$state->statename}}</span>
                        </li>
                       
                        <li class="list-group-item">
                            <strong>State Code : </strong>
                            <span class="right">{{$state->statecode}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Country Name: </strong>
                            <span class="right">{{$state->countryname}}</span>
                        </li>
                    </ul>
                </div>

              
            </div> 
           


        </div>
        

    </div>


@endsection

