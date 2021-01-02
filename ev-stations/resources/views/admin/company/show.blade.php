@extends('theme.default')

@section('title', 'Show chargertypes')

@push('styles')


@endpush


@section('content')
    <div class="block-header"></div>
    <div class="row clearfix">
        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header bg-indigo">
                    <h2>SHOW Company</h2>
                </div>

                <div class="header">
                    <h2>
                        <br>
                        <small>Posted By <strong>{{$companies->name}}</strong> on {{$companies->created_at->toFormattedDateString()}}</small>
                    </h2>
                </div>

                <div class="header">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Company Name : </strong>
                            <span class="right">  {{$companies->name}}</span>
                        </li>
                       
                        <li class="list-group-item">
                            <strong>Company Code : </strong>
                            <span class="right">{{$companies->companycode}}</span>
                        </li>
                     
                    </ul>
                </div>

              
            </div> 
           


        </div>
        

    </div>


@endsection

