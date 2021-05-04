<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'NAME', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('roll') ? 'has-error' : ''}}">
    {!! Form::label('roll', 'ROLL', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('roll', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('roll', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'EMAIL', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::email('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'PASSWORD', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::password('password', ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<div class="form-group {{ $errors->has('manager') ? 'has-error' : ''}}">
    {!! Form::label('manager', 'MANAGER', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('manager', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('manager', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('supervisor') ? 'has-error' : ''}}">
    {!! Form::label('supervisor', 'SUPERVISOR', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('supervisor', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('supervisor', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('planthead') ? 'has-error' : ''}}">
    {!! Form::label('planthead', 'PLANTHEAD', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('planthead', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('planthead', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('vpo') ? 'has-error' : ''}}">
    {!! Form::label('vpo', 'WTD', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('vpo', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('vpo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('vpca') ? 'has-error' : ''}}">
    {!! Form::label('vpca', 'EVP & CFO', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('vpca', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('vpca', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('director') ? 'has-error' : ''}}">
    {!! Form::label('director', 'DIRECTOR', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('director', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('director', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('roles') ? 'has-error' : ''}}">
    {!! Form::label('roles', 'ROLES', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('roles[]',Spatie\Permission\Models\Role::get()->pluck('name','name'),isset($user)?$user->getRoleNames():null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required','multiple'] : ['class' => 'form-control','multiple']) !!}
        {!! $errors->first('roles', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'CREATE', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
