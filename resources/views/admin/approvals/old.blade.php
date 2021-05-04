@extends('layouts.app')

@section('content')   
<div class="container">
        @include('admin.sidebar')
     <div class="col-md-9">
            <div class="panel panel-default">
               <div class="panel-heading"><center><h3>GENERATED APPROVALS</h3></center></div>

                   <div class="panel-body">             
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                
                                <tbody>
                                    @if(count($approvals) > 0)
                                     <thead>
                                    <tr>
                                        <th><center>S.NO</center></th>
                                        <th><center>REFERENCE ID</center></th>
                                        <th><center>TYPE</center></th>
                                        <th><center>DATE CREATED</center></th>
                                        <th><center>ACTIONS</center></th>
                                    </tr>
                                </thead>
                                @foreach($approvals as $approval)
                               
                                    <tr>
                                        <td><center>{{ $loop->iteration or $approval->id }}</center></td>
                                        <td><center>{{ $approval->ref }}/{{ $approval->ref2 }}/{{ $approval->ref3 }}</center></td>
                                        
                                        <td><center>{{ $approval->ref2}}</center></td>
                                        <td><center>{{ \Carbon\Carbon::parse($approval->created_at)->format('D, d M Y h:i A')}}</center></td>
                                        <td><center>
                                            <a href="{{ url('/') }}/admin/approvals/{{$approval->id}}" class="btn btn-info">VIEW</a>
                                            {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/oldapprovals', $approval->id],
                            'style' => 'display:inline'
                        ]) !!}
                           
                                        </center></td>
                                    </tr>
                                    @endforeach
                                @else
                            <p><center><h4>NO APPROVALS GENERATED!!!</h4></center></p>
                        @endif
                                </tbody>
                            </table>
                         
                        </div>
                    </div>
                </div>
            </div>

              
      </div> 
@endsection
<!--div>
     {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> DELETE', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn',
                                    'title' => 'Delete Approval',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
</div-->