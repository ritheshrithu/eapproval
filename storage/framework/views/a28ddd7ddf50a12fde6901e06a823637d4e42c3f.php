<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <link href="storage/addison.jpg" rel="shortcut icon">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>E-APPROVAL SYSTEM | ADDISON & CO.PVT LTD</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                /*font-family: 'Raleway', sans-serif;*/
                font-family: 'Lato', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            body a
            {
                text-decoration: none !important;
                color:white !important;
            }
            .full-height {
                height: 100vh;
            }
            button a
            {
                display: block;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    E-APPROVAL SYSTEM
                </div>
                <?php if(Route::has('login')): ?>
                <div class="container">
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->name === "ADMIN"): ?>
                        <a href="<?php echo e(url('/admin')); ?>" class="btn btn-primary"><?php echo e(Auth::user()->name); ?></a>
                        <?php else: ?>
                        <a href="<?php echo e(url('/home')); ?>" class="btn btn-primary"><?php echo e(Auth::user()->name); ?></a>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">LOGIN</a>
                        
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </body>
</html>
