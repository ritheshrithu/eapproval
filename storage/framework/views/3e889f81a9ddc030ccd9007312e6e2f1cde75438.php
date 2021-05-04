<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <?php echo Form::label('name', 'NAME', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('roll') ? 'has-error' : ''); ?>">
    <?php echo Form::label('roll', 'ROLL', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::number('roll', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

        <?php echo $errors->first('roll', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
    <?php echo Form::label('email', 'EMAIL', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::email('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

        <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
    <?php echo Form::label('password', 'PASSWORD', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::password('password', ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

        <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

    </div>

</div>

<div class="form-group <?php echo e($errors->has('manager') ? 'has-error' : ''); ?>">
    <?php echo Form::label('manager', 'MANAGER', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::number('manager', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

        <?php echo $errors->first('manager', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('supervisor') ? 'has-error' : ''); ?>">
    <?php echo Form::label('supervisor', 'SUPERVISOR', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::number('supervisor', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

        <?php echo $errors->first('supervisor', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('planthead') ? 'has-error' : ''); ?>">
    <?php echo Form::label('planthead', 'PLANTHEAD', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::number('planthead', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

        <?php echo $errors->first('planthead', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('vpo') ? 'has-error' : ''); ?>">
    <?php echo Form::label('vpo', 'WTD', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::number('vpo', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

        <?php echo $errors->first('vpo', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('vpca') ? 'has-error' : ''); ?>">
    <?php echo Form::label('vpca', 'EVP & CFO', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::number('vpca', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

        <?php echo $errors->first('vpca', '<p class="help-block">:message</p>'); ?>

    </div>
</div>
<div class="form-group <?php echo e($errors->has('director') ? 'has-error' : ''); ?>">
    <?php echo Form::label('director', 'DIRECTOR', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::number('director', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

        <?php echo $errors->first('director', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group <?php echo e($errors->has('roles') ? 'has-error' : ''); ?>">
    <?php echo Form::label('roles', 'ROLES', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::select('roles[]',Spatie\Permission\Models\Role::get()->pluck('name','name'),isset($user)?$user->getRoleNames():null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required','multiple'] : ['class' => 'form-control','multiple']); ?>

        <?php echo $errors->first('roles', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <?php echo Form::submit(isset($submitButtonText) ? $submitButtonText : 'CREATE', ['class' => 'btn btn-primary']); ?>

    </div>
</div>
