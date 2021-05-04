<div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
    <?php echo Form::label('name', 'NAME', ['class' => 'col-md-4 control-label']); ?>

    <div class="col-md-6">
        <?php echo Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']); ?>

        <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <?php echo Form::submit(isset($submitButtonText) ? $submitButtonText : 'CREATE', ['class' => 'btn btn-primary']); ?>

    </div>
</div>
