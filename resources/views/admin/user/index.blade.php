@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4><center>USER</center></h4></div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/user/create') }}" class="btn btn-success btn" title="Add New user">
                            <i class="fa fa-plus" aria-hidden="true"></i> NEW USER
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/user', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="SEARCH..." value="{{ request('search') }}">
                           
                          
                        </div>
                        {!! Form::close() !!}

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
                                @foreach($user as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->email }}</td><td>{{ $item->roll }}</td>
                                        <td>
                                            <a href="{{ url('/admin/user/' . $item->id) }}" title="View user"><button class="btn btn-info btn"><i class="fa fa-eye" aria-hidden="true"></i> VIEW</button></a>
                                            <a href="{{ url('/admin/user/' . $item->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> EDIT</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/user', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> DELETE', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn',
                                                        'title' => 'Delete user',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $user->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
