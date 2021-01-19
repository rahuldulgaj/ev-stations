<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Elecrtic Vehicle">

    <meta name="author" content="">
 <!-- CSRF Token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'BeeEV') }}</title> 
     <!-- Favicon -->
  <link rel="icon" href="{{asset('assets/img/brand/logo.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700')}}">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.2.0')}}" type="text/css">

    </head>

    <body>

@include('theme.newsidebar')

     
     
<div class="main-content" id="panel">

   @include('theme.topheader')



   <!-- <div class="header bg-primary pb-6">
      <div class="container-fluid">
    
  </div></div> -->



 <!-- Page content -->
 <div class="header">
 <div class="container-fluid">
    <!-- /#page-wrapper -->
    @yield('content')

        
    @include('theme.newfooter')


 
    </body>



</html>