<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <?php echo $__env->make('admin.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4><center>USER</center></h4></div>
                    <div class="panel-body">
                        <a href="<?php echo e(url('/admin/user/create')); ?>" class="btn btn-success btn" title="Add New user">
                            <i class="fa fa-plus" aria-hidden="true"></i> NEW USER
                        </a>

                        <?php echo Form::open(['method' => 'GET', 'url' => '/admin/user', 'class' => 'navbar-form navbar-right', 'role' => 'search']); ?>

                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="SEARCH..." value="<?php echo e(request('search')); ?>">
                           
                          
                        </div>
                        <?php echo Form::close(); ?>


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>NAME</th><th>EMAIL</th><th>ROLL NO</th><th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(isset($loop->iteration) ? $loop->iteration : $item->id); ?></td>
                                        <td><?php echo e($item->name); ?></td><td><?php echo e($item->email); ?></td><td><?php echo e($item->roll); ?></td>
                                        <td>
                                            <a href="<?php echo e(url('/admin/user/' . $item->id)); ?>" title="View user"><button class="btn btn-info btn"><i class="fa fa-eye" aria-hidden="true"></i> VIEW</button></a>
                                            <a href="<?php echo e(url('/admin/user/' . $item->id . '/edit')); ?>" title="Edit user"><button class="btn btn-primary btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDIT</button></a>
                                            <?php echo Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/user', $item->id],
                                                'style' => 'display:inline'
                                            ]); ?>

                                                <?php echo Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> DELETE', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn',
                                                        'title' => 'Delete user',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )); ?>

                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> <?php echo $user->appends(['search' => Request::get('search')])->render(); ?> </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>