@extends('theme.default')

@section('title', 'Show chargertypes')

@push('styles')


@endpush


@section('content')
    <div class="block-header"></div>
    <div class="row clearfix">
{{dd($chargertypes)}}
        <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header bg-indigo">
                    <h2>SHOW chargertypes</h2>
                </div>

                <div class="header">
                    <h2>
                        {{dd($chargertypes->name)}}
                        <br>
                        <small>Posted By <strong>{{$chargertypes->name}}</strong> on {{$chargertypes->created_at->toFormattedDateString()}}</small>
                    </h2>
                </div>

                <div class="header">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>Chargertypes Name : </strong>
                            <span class="right">  {{$chargertypes->name}}</span>
                        </li>
                       
                        <li class="list-group-item">
                            <strong>Chargertypes Code : </strong>
                            <span class="right">{{$chargertypes->ct_code}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Company Name: </strong>
                            <span class="right">{{$chargertypes->ct_company}}</span>
                        </li>
                        <li class="list-group-item">
                            <strong>Image: </strong>
                            <span class="right"><img src="{{ url('storage/uploads/gallery/chargertype/'.$chargertype->image) }}" alt="" title="" /></span>
                        </li>
                    </ul>
                </div>

              
            </div> 
           


        </div>
        

    </div>


@endsection

