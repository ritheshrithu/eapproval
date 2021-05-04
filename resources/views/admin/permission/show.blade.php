@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><center><h4>PERMISSION {{ $permission->name }}</h4></center></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/permission') }}" title="Back"><button class="btn btn-warning btn"><i class="fa fa-arrow-left" aria-hidden="true"></i> BACK</button></a>
                        <a href="{{ url('/admin/permission/' . $permission->id . '/edit') }}" title="Edit Permission"><button class="btn btn-primary btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDIT</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/permission', $permission->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> DELETE', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn',
                                    'title' => 'Delete Permission',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $permission->id }}</td>
                                    </tr>
                                    <tr><th> NAME </th><td> {{ $permission->name }} </td></tr>
                                    

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
