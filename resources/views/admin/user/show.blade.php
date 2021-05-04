@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4><center>WELCOME {{ $user->name }}</center></h4></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/user') }}" title="Back"><button class="btn btn-warning btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> BACK</button></a>
                        <a href="{{ url('/admin/user/' . $user->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDIT</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/user', $user->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> DELETE', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn',
                                    'title' => 'Delete user',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $user->id }}</td>
                                    </tr>
                                    <tr><th> NAME </th><td> {{ $user->name }} </td></tr>
                                    <tr><th> ROLL NUMBER </th><td> {{ $user->roll }} </td></tr>
                                    <tr><th> EMAIL </th><td> {{ $user->email }} </td></tr>
                                    <tr><th> ROLES </th><td> {{ $user->roles->pluck('name')}}  </td></tr>
                                    <tr><th> MANAGER </th><td> {{ $user->manager }} </td></tr>
                                    <tr><th> SUPERVISOR </th><td> {{ $user->supervisor }} </td></tr>
                                    <tr><th> PLANTHEAD </th><td> {{ $user->planthead }} </td></tr>
                                    <tr><th> WTD </th><td> {{ $user->vpo }} </td></tr>
                                    <tr><th> EVP & CFO </th><td> {{ $user->vpca }} </td></tr>
                                    <tr><th> DIRECTOR </th><td> {{ $user->director }} </td></tr>
                                    <!--tr><th> PASSWORD </th><td> {{ $user->password }} </td></tr-->

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
