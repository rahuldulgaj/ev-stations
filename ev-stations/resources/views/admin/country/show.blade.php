@extends('theme.default')

@section('title', 'Show Country')

@push('styles')


@endpush


@section('content')
    <div class="block-header"></div>

    <div class="row clearfix">

        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header bg-indigo">
                    <h2>SHOW Country</h2>
                </div>

                <div class="header">
                    <h2>
                        {{$country->name}}
                        <br>
                        <small>Posted By <strong>{{$country->name}}</strong> on {{$country->created_at->toFormattedDateString()}}</small>
                    </h2>
                </div>

                <div class="header">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>country Name : </strong>
                            <span class="right">  {{$country->name}}</span>
                        </li>
                       
                        <li class="list-group-item">
                            <strong>country Code : </strong>
                            <span class="right">{{$country->countrycode}}</span>
                        </li>
                        
                    </ul>
                </div>

              
            </div> 
           


        </div>
        

    </div>


@endsection

