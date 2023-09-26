<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Authorisation Form</title>

    <!-- Icons font CSS-->
    <link href="{{URL::asset('client/register_page/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('client/register_page/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{URL::asset('client/register_page/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{URL::asset('client/register_page/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{URL::asset('client/register_page/css/main.css')}}" rel="stylesheet" media="all">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

</head>

<body>
<div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
    <div class="wrapper wrapper--w780">
        @include('flash::message')
        <div class="card card-3">
            <div class="card-heading"></div>
            @yield('content')
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="{{URL::asset('client/register_page/vendor/jquery/jquery.min.js')}}"></script>
<!-- Vendor JS-->
<script src="{{URL::asset('client/register_page/vendor/select2/select2.min.js')}}"></script>
<script src="{{URL::asset('client/register_page/vendor/datepicker/moment.min.js')}}"></script>
<script src="{{URL::asset('client/register_page/vendor/datepicker/daterangepicker.js')}}"></script>

<!-- Main JS-->
<script src="{{URL::asset('client/register_page/js/global.js')}}"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script>
    $('#flash-overlay-modal').modal();
</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
