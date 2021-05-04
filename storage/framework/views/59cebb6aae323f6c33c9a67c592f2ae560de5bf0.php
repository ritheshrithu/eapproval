<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php echo $__env->make('admin.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4><center>WELCOME <?php echo e($user->name); ?></center></h4></div>
                    <div class="panel-body">

                        <a href="<?php echo e(url('/admin/user')); ?>" title="Back"><button class="btn btn-warning btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> BACK</button></a>
                        <a href="<?php echo e(url('/admin/user/' . $user->id . '/edit')); ?>" title="Edit user"><button class="btn btn-primary btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDIT</button></a>
                        <?php echo Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/user', $user->id],
                            'style' => 'display:inline'
                        ]); ?>

                            <?php echo Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> DELETE', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn',
                                    'title' => 'Delete user',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            )); ?>

                        <?php echo Form::close(); ?>

                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td><?php echo e($user->id); ?></td>
                                    </tr>
                                    <tr><th> NAME </th><td> <?php echo e($user->name); ?> </td></tr>
                                    <tr><th> ROLL NUMBER </th><td> <?php echo e($user->roll); ?> </td></tr>
                                    <tr><th> EMAIL </th><td> <?php echo e($user->email); ?> </td></tr>
                                    <tr><th> ROLES </th><td> <?php echo e($user->roles->pluck('name')); ?>  </td></tr>
                                    <tr><th> MANAGER </th><td> <?php echo e($user->manager); ?> </td></tr>
                                    <tr><th> SUPERVISOR </th><td> <?php echo e($user->supervisor); ?> </td></tr>
                                    <tr><th> PLANTHEAD </th><td> <?php echo e($user->planthead); ?> </td></tr>
                                    <tr><th> WTD </th><td> <?php echo e($user->vpo); ?> </td></tr>
                                    <tr><th> EVP & CFO </th><td> <?php echo e($user->vpca); ?> </td></tr>
                                    <tr><th> DIRECTOR </th><td> <?php echo e($user->director); ?> </td></tr>
                                    <!--tr><th> PASSWORD </th><td> <?php echo e($user->password); ?> </td></tr-->

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>