<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="">



    <title>EMS</title>



    <!-- Bootstrap Core CSS -->
<!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
<!-- <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> -->

    <!-- <link href="{!! asset('theme/vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet"> -->
    <link href="{{asset('theme/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{{ asset('theme/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.6/metisMenu.css" integrity="sha256-8fc2XEXk+1UwZL2HHLU5lZMpSnhCrcGR37Kl+IKi7HI=" crossorigin="anonymous" />
    <!-- <link href="{!! asset('theme/vendor/metisMenu/metisMenu.min.css') !!}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.6/metisMenu.min.css" integrity="sha256-CZrFblL1R/WWJIlN2UFq+80Tuimb1Dn2SfWXvuK3qcY=" crossorigin="anonymous" />


    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/css/sb-admin-2.css" integrity="sha256-Nw3+bcyGO+cJbXm3SQCxXQQahDmxDP66aesy3IZ4aJQ=" crossorigin="anonymous" /> -->



    <!-- Morris Charts CSS -->
    <link rel="stylesheet" href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
    <!-- <link href="{!! asset('theme/vendor/morrisjs/morris.css') !!}" rel="stylesheet"> -->


    <link href="{!! asset('theme/css/sb-admin-2.min.css')!!}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/fontawesome.min.js" integrity="sha256-NP9NujdEzS5m4ZxvNqkcbxyHB0dTRy9hG13RwTVBGwo=" crossorigin="anonymous"></script> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/fontawesome.min.css" integrity="sha256-CuUPKpitgFmSNQuPDL5cEfPOOJT/+bwUlhfumDJ9CI4=" crossorigin="anonymous" />
    <!-- <link href="{!! asset('theme/vendor/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css"> -->
    <!-- <link href="{!! asset('theme/vendor/fontawesome-free/css/fontawesome.min.css') !!}" rel="stylesheet" type="text/css"> -->
  
</head>

<body id="page-top">
<div id="wrapper">

@include('theme.sidebar')

 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">
        @include('theme.header')





     


            @yield('content')


        <!-- /#page-wrapper -->




    <!-- /#wrapper -->

    @include('theme.footer')


    <!-- jQuery -->

    <!-- <script src="{!! asset('theme/vendor/jquery/jquery.min.js') !!}"></script> -->


    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <!-- Bootstrap Core JavaScript -->

    <!-- <script src="{!! asset('theme/vendor/bootstrap/js/bootstrap.min.js') !!}"></script> -->

    <script src="{{ asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

 <!-- Core plugin JavaScript-->
 <script src="{{ asset('theme/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('theme/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{ asset('theme/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('theme/js/demo/chart-area-demo.js')}}"></script>
<script src="{{ asset('theme/js/demo/chart-pie-demo.js')}}"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.6/metisMenu.min.js" integrity="sha256-dsY+tXuUzKKev+KTbuLwRITlSxSeAjfXMZhNV31/dHQ=" crossorigin="anonymous"></script>
    <!-- <script src="{!! asset('theme/vendor/metisMenu/metisMenu.min.js') !!}"></script> -->



    <!-- Morris Charts JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <!-- <script src="{!! asset('theme/vendor/raphael/raphael.min.js') !!}"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> 
       <!-- <script src="{!! asset('theme/vendor/morrisjs/morris.min.js') !!}"></script> -->

    <!-- <script src="{!! asset('theme/data/morris-data.js') !!}"></script> -->



    <!-- Custom Theme JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/js/sb-admin-2.js" integrity="sha256-vRGeHy79UTjzDQv7T2urmiswawJ6iD3Jz6VYUeFkoYM=" crossorigin="anonymous"></script> -->
    <!-- <script src="{!! asset('theme/css/js/sb-admin-2.js') !!}"></script> -->

    
</body>



</html>