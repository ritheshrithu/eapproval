<?php $__env->startSection('content'); ?>
    <div class="container">
    <br>
        <div class="row">    
        <div class="col-md-2">
            <div class="row"> <a href="<?php echo e(url('/')); ?>/status/" class="btn btn-info">GO BACK</a></div><br>
        </div>
        <div class="col-md-8">
            <center>
                <H4><a href="<?php echo e(url('/')); ?>/status/">STATUS</a><span class="fa fa-arrow-right"></span>
            <a href="<?php echo e(url('/')); ?>/status/dealerapproval"><u>DEALER APPROVAL  </u>  </a><span class="fa fa-arrow-right"></span></H4>
            </center>
        </div>
    </div>
</div>
    <div class="container-fluid">
        <?php echo $__env->make('statusside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
       <div class="col-md-10">
            <div class="panel panel-default">
               <div class="panel-heading"><center><h3>CURRENT LEVEL OF THE APPROVALS</h3></center></div>
                <div class="panel-body">             
                        <div class="table-responsive">
                            <table class="table table-borderless">
                               <tbody>
                                <?php if(count($approvals) > 0): ?>
                                
                                <thead>
                                    <tr>
                                        <th><center>S.NO</center></th>
                                        <th><center>REFERENCE ID</center></th>
                                        <th><center><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('ref2','TYPE'));?></center></th>
                                        <th><center><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name','NAME'));?></center></th>
                                        <th><center><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('updated_at','DATE CREATED'));?></center></th>
                                        <th><center>ACTIONS</center></th>
                                    </tr>
                                </thead>
                                <?php $__currentLoopData = $approvals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(Auth::user()->roll === $approval->ref): ?>
                                    <tr>
                                        <td><center><?php echo e(isset($loop->iteration) ? $loop->iteration : $approval->id); ?></center></td>
                                        <td><center><?php echo e($approval->ref); ?>/<?php echo e($approval->ref2); ?>/<?php echo e($approval->ref3); ?></center></td>
                                        <td><center><?php echo e($approval->ref2); ?></center></td>
                                        <td><center><?php echo e($approval->name); ?></center></td>
                                        <td><center><?php echo e(\Carbon\Carbon::parse($approval->created_at)->format('d/m/Y h:i A')); ?></center></td>
                                        <td><center>
                                            <a href="<?php echo e(url('/')); ?>/status/dealerapproval/<?php echo e($approval->id); ?>" class="btn btn-info">VIEW</a></center>
                                        </td>
                                    </tr>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <p><center><h4>NOTHING FOUND!!!</h4></center></p>
                            <?php endif; ?>
                                </tbody>
                            </table>
                         <?php echo e($approvals->links()); ?>

                        </div>
                    </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>