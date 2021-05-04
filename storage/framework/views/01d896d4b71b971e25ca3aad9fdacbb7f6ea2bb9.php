<?php $__env->startSection('content'); ?>
<div class="container">
	
    <div class="row">
        <center>
        <H4><a href="<?php echo e(url('/')); ?>/status/"><u>STATUS</u>   </a><span class="fa fa-arrow-right"></span></H4>
        </center>
    </div>
</div>

<div class="container-fluid">
     <?php echo $__env->make('statusside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>