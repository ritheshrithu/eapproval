@extends('layouts.log')

@section('content')
<div class="container"><br><br><br><br><br>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4><center>LOGIN</center></h4></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}" id="load">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('roll') ? ' has-error' : '' }}">
                            <label for="roll" class="col-md-4 control-label">ROLL NUMBER</label>

                            <div class="col-md-6">
                                <input id="roll" type="number" class="form-control" name="roll" value="{{ old('roll') }}" autofocus>

                                @if ($errors->has('roll'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('roll') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">PASSWORD</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    LOGIN
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
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
@endsection
