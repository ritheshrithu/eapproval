<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <center>
        <H4><a href="<?php echo e(url('/')); ?>/approvals/">RECEIVED APPROVALS   </a><span class="fa fa-arrow-right"></span></H4>
        </center>
    </div>
</div>
    <div class="container-fluid">
        <div class="col-md-2">
	<div class="panel panel-inverse panel-flush">
		<div class="panel-heading">
			<center><h3>MENU</h3></center>
		</div>

		<div class="panel-body">
			<ul class="nav" role="tablist">
				<li role="presentation">
					<a href="<?php echo e(url('/approvals/capexapproval')); ?>">
						CAPEX
						<?php if($note1>0): ?>
                                <span class="badge badge-warning">
                                    <?php echo e($note1); ?>

                                </span>
                            <?php endif; ?>
                    </a>
                </li>
			

				<li role="presentation">
					<a href="<?php echo e(url('/approvals/creditapproval')); ?>">
						CUSTOMER
						<?php if($note2>0): ?>
                                <span class="badge badge-warning">
                                    <?php echo e($note2); ?>

                                </span>
                            <?php endif; ?>
                    </a>
                </li>

				<li role="presentation">
					<a href="<?php echo e(url('/approvals/vendorapproval')); ?>">
						VENDOR
						<?php if($note3>0): ?>
                                <span class="badge badge-warning">
                                    <?php echo e($note3); ?>

                                </span>
                            <?php endif; ?>
                    </a>
                </li>

				<li role="presentation">
					<a href="<?php echo e(url('/approvals/dealerapproval')); ?>">
						DEALER
						<?php if($note4>0): ?>
                                <span class="badge badge-warning">
                                    <?php echo e($note4); ?>

                                </span>
                            <?php endif; ?>
                    </a>
                </li>

				<li role="presentation">
					<a href="<?php echo e(url('/approvals/otherapproval')); ?>">
						OTHERS
						<?php if($note5>0): ?>
                                <span class="badge badge-warning">
                                    <?php echo e($note5); ?>

                                </span>
                            <?php endif; ?>
                    </a>
                </li>
			</ul>
		</div>
	</div>
</div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>