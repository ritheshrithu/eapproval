@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4><center>ROLE</center></h4></div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/role/create') }}" class="btn btn-success btn" title="Add New Role">
                            <i class="fa fa-plus" aria-hidden="true"></i> ADD NEW ROLE
                        </a>

                      
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>NAME</th><th>ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($role as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ url('/admin/role/' . $item->id) }}" title="View Role"><button class="btn btn-info btn"><i class="fa fa-eye" aria-hidden="true"></i> VIEW</button></a>
                                            <a href="{{ url('/admin/role/' . $item->id . '/edit') }}" title="Edit Role"><button class="btn btn-primary btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDIT</button></a>
                                                               
                                                {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/role', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> DELETE', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn',
                                                        'title' => 'Delete Role',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                           
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $role->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
