@extends('layouts.app')

@section('content')

    <div class="container">
    <br>
        <div class="row">    
        <div class="col-md-2">
            <div class="row"> <a href="{{ url('/') }}/status/" class="btn btn-info">GO BACK</a></div><br>
        </div>
        <div class="col-md-8">
            <center>
                <H4><a href="{{ url('/') }}/status/">STATUS    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/status/capexapproval"><u>CAPEX APPROVAL  </u>  </a><span class="fa fa-arrow-right"></span></H4>
            </center>
        </div>
    </div>
</div>
    <div class="container-fluid">
        @include('statusside')
    
       <div class="col-md-10">
            <div class="panel panel-default">
               <div class="panel-heading"><center><h3>CURRENT LEVEL OF THE APPROVAL</h3></center></div>
                <div class="panel-body">             
                        <div class="table-responsive">
                            <table class="table table-borderless">
                               <tbody>
                                @if(count($approvals) > 0)
                                
                                <thead>
                                    <tr>
                                        <th><center>S.NO</center></th>
                                        <th><center>REFERENCE ID</center></th>
                                        <th><center>@sortablelink('ref2','TYPE')</center></th>
                                        <th><center>@sortablelink('TITLE')</center></th>
                                        <th><center>@sortablelink('updated_at','DATE CREATED')</center></th>
                                        <th><center>ACTIONS</center></th>
                                    </tr>
                                </thead>
                                @foreach($approvals as $approval)
                                @if(Auth::user()->roll === $approval->ref)
                                    <tr>
                                        <td><center>{{ $loop->iteration or $approval->id }}</center></td>
                                        <td><center>{{ $approval->ref }}/{{ $approval->ref2 }}/{{ $approval->ref3 }}</center></td>
                                        <td><center>{{ $approval->ref2 }}</center></td>
                                        <td><center>{{ $approval->title }}</center></td>
                                        <td><center>{{ \Carbon\Carbon::parse($approval->created_at)->format('d/m/Y h:i A')}}</center></td>
                                        <td><center>
                                            <a href="{{ url('/') }}/status/capexapproval/{{$approval->id}}" class="btn btn-info">VIEW</a></center>
                                        </td>
                                    </tr>
                            @endif
                            @endforeach
                            @else
                            <p><center><h4>NOTHING FOUND!!!</h4></center></p>
                            @endif
                                </tbody>
                            </table>
                         {{$approvals->links()}}
                        </div>
                    </div>
            </div>
        </div>
    </div>

@endsection
