<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <link href="storage/addison.jpg" rel="shortcut icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>ADDISON | E-APPROVAL SYSTEM</title>

    <link href="https://fonts.googleapis.com/css?family=Encode+Sans+Semi+Expanded:300" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
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
background-image: url(/storage/back.png);
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

.dropdown button
{
    display: block !important;
    font-size: 18px;
    background-color:black !important;
    color: white !important;
    border: none;
    height: 50px;
    font-weight: 500;
    padding-left: 15px;
    padding-right: 15px;
}
.dropdown button:hover
{
    display: block !important;
    font-size: 18px;
    background-color:#ebebeb !important;
    color: black !important;
    border: none;
    height: 50px;
}
.navbar
{
    background-color: black !important;
    font-size: 18px;
}
.navbar-nav li a
{
    display: block !important;
    font-size: 18px;
    font-weight: 500;
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
    font-size: 20px;
    font-weight: 590;
}
body b
{
    font-weight: 590;
}
.table th
{
    font-size: 24px;
    font-weight: 590;
}
.user .table td{
    font-size: 19px;
    font-weight: 500;
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

.navbar a
{
    color: white !important;
}
.brand a:hover
{
    text-decoration: none;
}
.info1 {
    display: none;
}
    
a:hover + .info1 
{
    display: block;
    background-color: red;
}
.badge-warning
{
    background-color: orange !important;
    color: black !important;
}
.table
{
    border-collapse: separate !important;
}
.dropdown-menu a
{
    color: black !important;
}
.dropdown:hover>.dropdown-menu {
  display: block;
  background-color: white;
  color: black;
}

.dropdown>.dropdown-toggle:active {
  /*Without this, clicking will make it sticky*/
    pointer-events: none;

}
.footer {
   position: relative;
   left: 0;
   bottom: 0;
   width: 100%;
   color: black;
   text-align: center;
}
</style>

</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="brand" href="<?php echo e(url('/')); ?>">
                      <?php echo e(config('app.name', 'E-APPROVAL SYSTEM')); ?></a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <?php if(auth()->guard()->guest()): ?>
                            <!--li><a href="<?php echo e(route('login')); ?>">Login</a></li-->
                           
                        <?php else: ?>
                            
                            <?php if(Auth::user()->name !== "ADMIN"): ?>
                        <ul class="nav navbar-nav navbar-left" id="nav">
                            <li>
                            <div class="dropdown">
                                <button class="nav menus" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    NEW REQUEST
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/createapproval/capexapproval/new">CAPEX</a>
                                    <a class="dropdown-item" href="/createapproval/creditapproval/new1">CREDIT</a>
                                    <a class="dropdown-item" href="/createapproval/vendorapproval/new2">VENDOR</a>
                                    <a class="dropdown-item" href="/createapproval/dealerapproval/new4">DEALER</a>
                                    <a class="dropdown-item" href="/createapproval/otherapproval/new3">OTHERS</a>
                                </div>
                            </div>
                            </li>
                            <li class="nav"><a href="<?php echo e(url('/')); ?>/oldapprovals/" >APPROVALS </a></li>
                            <li class="nav"><a href="<?php echo e(url('/')); ?>/approvals/" >INBOX 
                            <?php if(Auth::user()->unreadNotifications()->count()>0): ?>
                                <span class="badge badge-warning">
                                <?php echo e(count(Auth::user()->unreadNotifications)); ?></span><?php endif; ?></a>
                                
                                </li>
                            <li class="nav"><a href="<?php echo e(url('/')); ?>/status/" >STATUS </a></li>
                            
                        </ul> <?php endif; ?>
                            <ul class="nav navbar-nav navbar-right menu">
                                
                                <li class="nav">
                                    <?php if(Auth::user()->name === "ADMIN"): ?>
                                    <a href="<?php echo e(url('/')); ?>/admin" role="button">
                                    <strong><?php echo e(Auth::user()->name); ?> </strong></a>
                                    <?php else: ?>
                                     <a href="<?php echo e(url('/')); ?>/home" role="button">
                                    <strong><?php echo e(Auth::user()->name); ?> </strong></a>
                                    <?php endif; ?>
                                </li>
                                <li class="nav"><a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">LOGOUT</a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

      <div class="container">
             <?php echo $__env->make('messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
             <?php echo $__env->make('sweetalert::alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
        <?php echo $__env->yieldContent('content'); ?>      
    </div>
</div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
    <script>
        CKEDITOR.replace( 'ckeditor1' );
    </script>
    <script>
        CKEDITOR.replace( 'ckeditor2' );
    </script>
    <script>
        CKEDITOR.replace( 'ckeditor3' );
    </script>
    <script>
        CKEDITOR.replace( 'ckeditor4' );
    </script>
    <script>
        CKEDITOR.replace( 'ckeditor5' );
    </script>
    <script>
        CKEDITOR.replace( 'ckeditor6' );
    </script>
    <script>
        CKEDITOR.replace( 'ckeditor7' );
    </script>
    <script>
        CKEDITOR.replace( 'ckeditor8' );
    </script>
    <script>
        CKEDITOR.replace( 'ckeditor9' );
    </script>
    <script>
        CKEDITOR.replace( 'ckeditor10' );
    </script>
   

    
</body>
</html>
