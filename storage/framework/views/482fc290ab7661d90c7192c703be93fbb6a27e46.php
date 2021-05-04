<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><center><h3>WELCOME <?php echo e(Auth::user()->name); ?></h3></center></div>
                <div class=" user">
                   <table class="table table-borderless">
                        <tbody>
                        <tr><td class="text-right">ROLL NUMBER</td><td><?php echo e(Auth::user()->roll); ?></td></tr>
                        <tr><td class="text-right">NAME</td><td><?php echo e(Auth::user()->name); ?></td></tr>
                        <tr><td class="text-right">MANAGER</td><td><?php echo e($off1); ?> - (<?php echo e(Auth::user()->manager); ?>)</td></tr>
                        
                        <tr><td class="text-right">SUPERVISOR</td><td><?php echo e($off3); ?> -(<?php echo e(Auth::user()->supervisor); ?>)</td></tr>
                        <tr><td class="text-right">PLANTHEAD</td><td><?php echo e($off4); ?> - (<?php echo e(Auth::user()->planthead); ?>)</td></tr>
                        <tr><td class="text-right">WTD</td><td><?php echo e($off5); ?> - (<?php echo e(Auth::user()->vpo); ?>)</td></tr>
                        <tr><td class="text-right">EVP & CFO</td><td><?php echo e($off6); ?> - (<?php echo e(Auth::user()->vpca); ?>)</td></tr>
                        <tr><td class="text-right">DIRECTOR</td><td><?php echo e($off7); ?> - (<?php echo e(Auth::user()->director); ?>)</td></tr>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>

 
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>