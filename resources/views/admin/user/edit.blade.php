@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4><center>EDIT USER {{ $user->name }}</center></h4></div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/user') }}" title="Back"><button class="btn btn-warning btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> BACK</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($user, [
                            'method' => 'PATCH',
                            'url' => ['/admin/user', $user->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.user.form', ['submitButtonText' => 'UPDATE'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
