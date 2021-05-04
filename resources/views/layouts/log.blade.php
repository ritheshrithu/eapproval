<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <link href="storage/addison.jpg" rel="shortcut icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ADDISON | E-APPROVAL SYSTEM</title>
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Semi+Expanded:300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 

}
body
{
font-family: 'Encode Sans Semi Expanded', sans-serif;
background-color: #ebebeb;
}

.container a{
    text-decoration: none;
}
.container-fluid a{
    text-decoration: none;
}
.container-fluid a:hover{
    color:gray;
}
.dropdown a
{
    color: black;
    display: block;
}
.dropdown a:hover
{
    background-color: gray;
    display: block;
}

.navbar-nav li a
{
    display: block !important;
    font-size: 18px;
}
.navbar-nav li a:hover
{
  background-color:#ebebeb !important;
  color: black !important;
  display: block !important;
}
.table tbody #correction
{
    background-color: #ff9980 !important; 
    color:white;
}

.table tbody #success
{
    background-color: green !important; 
    color:white;
}
.table td
{
    font-size: 16px;
    font-weight: 700;
}
.table th
{
    font-size: 18px;
}
.brand
{
    float: left;
    color: white;
    font-size:25px;
    line-height: 50px;
    margin-right: 20px;
    margin-left: 15px;
    text-decoration: none;
}
.menu
{
   margin-right: 40px; 
}
.brand a:hover
{
    text-decoration: none;
}
</style>
</head>
<body>
    <div id="app">
        <br><br>
        @yield('content')
        @include('sweetalert::alert')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
   
</body>
</html>
