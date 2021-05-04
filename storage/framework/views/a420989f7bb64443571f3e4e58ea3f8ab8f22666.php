<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="<?php echo e(url('/')); ?>/createapproval/dealerapproval/new4" class="btn btn-success">CREATE NEW</a>
        </div>     
        <div class="col-md-8">
            <H4><a href="<?php echo e(url('/')); ?>/oldapprovals/">GENERATED APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="<?php echo e(url('/')); ?>/oldapprovals/dealerapproval">DEALER ENROLEMENT    </a><span class="fa fa-arrow-right"></span></H4>
        </div>
    </div>
</div><br>
<?php echo $__env->make('senside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="container-fluid">
     <div class="col-md-10">
            <div class="panel panel-default">
               <div class="panel-heading"><center><h3>GENERATED APPROVALS</h3></center></div>

                   
                   <div class="panel-body">             
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                
                                <tbody>
                                    <?php if(count($dealer) > 0): ?>
                                     <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('ref','REFERENCE ID'));?></th>
                                        <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name','NAME'));?></th>
                                        <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('ref2','TYPE'));?></th>
                                        <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('updated_at','DATE CREATED'));?></th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <?php $__currentLoopData = $dealer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               
                                    <tr>
                                        <td><?php echo e(isset($loop->iteration) ? $loop->iteration : $approval->id); ?></td>
                                        <td><?php echo e($approval->ref); ?>/<?php echo e($approval->ref2); ?>/<?php echo e($approval->ref3); ?></td>
                                        <td><?php echo e($approval->name); ?></td>
                                        <td><?php echo e($approval->ref2); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($approval->created_at)->format('d/m/Y h:i A')); ?></td>
                                        <td>
                                            <a href="<?php echo e(url('/')); ?>/oldapprovals/dealerapproval/<?php echo e($approval->id); ?>" class="btn btn-info">VIEW</a>
                                            <?php echo Form::open([
                            'method'=>'DELETE',
                            'url' => ['/olddealer', $approval->id],
                            'style' => 'display:inline'
                        ]); ?>

                           
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                <?php else: ?>
                            <p><center><h4>NO APPROVALS GENERATED!!!</h4></center></p>
                        <?php endif; ?>
                                </tbody>
                            </table>
                         <?php echo e($dealer->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
            <br>
            

              
      </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>