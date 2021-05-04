<?php $__env->startSection('content'); ?>
<div class="container"><br><br><br><br><br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><center>LOGIN</center></h4></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>" id="load">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('roll') ? ' has-error' : ''); ?>">
                            <label for="roll" class="col-md-4 control-label">ROLL NUMBER</label>

                            <div class="col-md-6">
                                <input id="roll" type="number" class="form-control" name="roll" value="<?php echo e(old('roll')); ?>" autofocus>

                                <?php if($errors->has('roll')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('roll')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">PASSWORD</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    LOGIN
                                </button>

                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                    FORGOT YOUR PASSWORD?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    (function()
    {
        document.querySelector('#load').addEventListener('submit',function(e)
        {
            e.preventDefault()

                axios.post(this.action,
                {
                'roll' : document.querySelector('#roll').value,
                'password' : document.querySelector('#password').value
                })
                .then(function(response)
                {
                    console.log('success');
                })
                .catch(function(error)
                {
                    console.log('error.response');
                });
        });
    })();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.log', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>