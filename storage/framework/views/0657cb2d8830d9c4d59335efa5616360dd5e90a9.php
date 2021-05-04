<?php if(count($errors) > 0): ?>
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="alert alert-danger">
	<h4><?php echo e($error); ?></h4>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(session('success')): ?>
<div class="alert alert-success">
	<center><h4><?php echo e(session('success')); ?></h4></center>	 
</div>
<?php endif; ?>

<?php if(session('error')): ?>
<div class="alert alert-danger">
	<center><h4><?php echo e(session('error')); ?></h4></center>	 	 
</div>
<?php endif; ?>