@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="{{ url('/') }}/createapproval/otherapproval/new3" class="btn btn-success">CREATE NEW</a>
        </div>     
        <div class="col-md-8">
            <H4><a href="{{ url('/') }}/oldapprovals/">GENERATED APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/oldapprovals/otherapproval">OTHER APPROVAL    </a><span class="fa fa-arrow-right"></span></H4>
        </div>
    </div>
</div><br>
@include('senside')
<div class="container-fluid">
     <div class="col-md-10">
            <div class="panel panel-default">
               <div class="panel-heading"><center><h3>GENERATED APPROVALS</h3></center></div>

                   
                   <div class="panel-body">             
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                
                                <tbody>
                                    @if(count($approvals) > 0)
                                     <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>@sortablelink('ref','REFERENCE ID')</th>
                                        <th>@sortablelink('TITLE')</th>
                                        <th>@sortablelink('ref2','TYPE')</th>
                                        <th>@sortablelink('updated_at','DATE CREATED')</th>
                                        <th>ACTIONS</th>
                                    </tr>
                                </thead>
                                @foreach($approvals as $approval)
                               
                                    <tr>
                                        <td>{{$loop->iteration or $approval->id}}</td>
                                        <td>{{ $approval->ref }}/{{ $approval->ref2 }}/{{ $approval->ref3 }}</td>
                                        <td>{{ $approval->title }}</td>
                                        <td>{{ $approval->ref2}}</td>
                                        <td>{{ \Carbon\Carbon::parse($approval->created_at)->format('d/m/Y h:i A')}}</td>
                                        <td>
                                            <a href="{{ url('/') }}/oldapprovals/otherapproval/{{$approval->id}}" class="btn btn-info">VIEW</a>
                                            {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/oldcredit', $approval->id],
                            'style' => 'display:inline'
                        ]) !!}
                           
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                @else
                            <p><center><h4>NO APPROVALS GENERATED!!!</h4></center></p>
                        @endif
                                </tbody>
                            </table>
                         {{$approvals->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <br>
            

              
      </div> 
@endsection