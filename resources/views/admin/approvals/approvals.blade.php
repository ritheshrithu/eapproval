@extends('layouts.app')

@section('content')
    <div class="container">
        @include('admin.sidebar')
       <div class="col-md-9">
            <div class="panel panel-default">
               <div class="panel-heading"><center><h3>FORWARDS & CORRECTIONS</h3></center></div>
                   <div class="panel-body">             
                        <div class="table-responsive">
                            <table class="table table-borderless">
                               <tbody>
                                @if(count($approvals) > 0)
                                
                                <thead>
                                    <tr>
                                        <th><center>S.NO</center></th>
                                        <th><center>REFERENCE ID</center></th>
                                        <th><center>SENDER</center></th>
                                        <th><center>RECEIVER</center></th>
                                        
                                        <th><center>DATE CREATED</center></th>
                                        <th><center>ACTIONS</center></th>
                                    </tr>
                                </thead>
                                    @foreach($approvals as $approval)
                                    




                                    @if($approval->ref === $approval->rec )
                                    <tr id="correction">
                                        <td><center>{{ $loop->iteration or $approval->id }}</center></td>
                                        <td><center>{{ $approval->ref }}/{{ $approval->ref2 }}/{{ $approval->ref3 }}</center></td>
                                        <td><center>{{ $approval->sen }}</center></td>
                                        <td><center>{{ $approval->rec }}</center></td>
                                       
                                        <td><center>{{ \Carbon\Carbon::parse($approval->created_at)->format('D, d M Y h:i A')}}</center></td>
                                        <td><center>
                                            <a href="{{ url('/') }}/admin/forwards/{{$approval->id}}" class="btn btn-info">VIEW</a></center>
                                        </td>
                                    </tr>
                                    @else
                                    <tr id="success">
                                        <td><center>{{ $loop->iteration or $approval->id }}</center></td>
                                        <td><center>{{ $approval->ref }}/{{ $approval->ref2 }}/{{ $approval->ref3 }}</center></td>
                                        <td><center>{{ $approval->sen }}</center></td>
                                         <td><center>{{ $approval->rec }}</center></td>
                                        
                                        <td><center>{{ \Carbon\Carbon::parse($approval->created_at)->format('D, d M Y h:i A')}}</center></td>
                                        <td><center>
                                            <a href="{{ url('/') }}/admin/forwards/{{$approval->id}}" class="btn btn-info">VIEW</a></center>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                @else
                            <p><center><h4>NOTHING FOUND!!!</h4></center></p>
                        @endif
                                </tbody>
                            </table>
                         
                        </div>
                    </div>
                   
                </div>
            </div>
    </div>
@endsection