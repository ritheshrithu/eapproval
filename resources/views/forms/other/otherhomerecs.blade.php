@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12"><center>
            <H4><a href="{{ url('/') }}/approvals/">RECEIVED APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/approvals/otherapproval">OTHER APPROVAL    </a><span class="fa fa-arrow-right"></span></H4></center>
        </div>
</div><br>
    <div class="container-fluid">
    <div class="col-md-2">
        <div class="panel panel-inverse panel-flush">
            <div class="panel-heading">
                <center><h3>MENU</h3></center>
            </div>

        <div class="panel-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/approvals/capexapproval') }}">
                        CAPEX
                    </a>
                </li>
            

                <li role="presentation">
                    <a href="{{ url('/approvals/creditapproval') }}">
                        CUSTOMER
                    </a>
                </li>

                <li role="presentation">
                    <a href="{{ url('/approvals/vendorapproval') }}">
                        VENDOR
                    </a>
                </li>

                <li role="presentation">
                    <a href="{{ url('/approvals/dealerapproval') }}">
                        DEALER
                    </a>
                </li>

                <li role="presentation">
                    <a href="{{ url('/approvals/otherapproval') }}">
                        OTHERS
                            @if($note5>0)
                                <span class="badge badge-warning">
                                    {{$note5}}
                                </span>
                            @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>
       <div class="col-md-10">
            <div class="panel panel-default">
               <div class="panel-heading"><center><h3>APPROVALS & CORRECTIONS</h3></center></div>
                   <div class="panel-body">   
                        <div class="table-responsive">
                            <table class="table table-borderless">
                               <tbody>
                                @if(count($approvals) > 0)
                                    <thead>
                                    <tr>
                                        <th><center>@sortablelink('ref2','REFERENCE ID')</center></th>
                                        <th><center>@sortablelink('sen','SENDER')</center></th>
                                        <th><center>@sortablelink('title','TITLE')</center></th>
                                        <th><center>@sortablelink('TYPE')</center></th>
                                        <th><center>@sortablelink('updated_at','DATE CREATED')</center></th>
                                        <th></center>ACTIONS</center></th>
                                    </tr>
                                    </thead>
                                    @foreach($approvals as $approval)
                                    @if($approval->reference === null)
                                    <tr id="correction">
                                        <td><center>{{ $approval->ref }}/{{ $approval->ref2 }}/{{ $approval->ref3 }}</center></td>
                                        <td><center>{{ $approval->sen }} - {{ $approval->gen }}</center></td>
                                        <td><center>{{ $approval->title }}</center></td>
                                        <td><center>CORRECTIONS</center></td>
                                        <td><center>{{ \Carbon\Carbon::parse($approval->created_at)->format('D, d M Y h:i A')}}</center></td>
                                        <td><center>
                                            <a href="{{ url('/') }}/approvals/otherapproval/{{$approval->id}}" class="btn btn-info">VIEW</a></center>
                                        </td>
                                    </tr>
                                    @else
                                    @if((Auth::user()->roll === $approval->rec && Auth::user()->roll !== $approval->ref) || 
                                        (Auth::user()->roll === $approval->rec1 && Auth::user()->roll !== $approval->ref)|| 
                                        (Auth::user()->roll === $approval->rec2 && Auth::user()->roll !== $approval->ref)|| 
                                        (Auth::user()->roll === $approval->rec3 && Auth::user()->roll !== $approval->ref)) 

                                    @if(Auth::user()->roll === $approval->rec && $approval->update1 !== null || 
                                        Auth::user()->roll === $approval->rec1 && $approval->update2 !== 
                                        null || 
                                        Auth::user()->roll === $approval->rec2 && $approval->update3 !== 
                                        null || 
                                        Auth::user()->roll === $approval->rec3 && $approval->update4 !== 
                                        null)

                                    <tr>
                                        
                                        <td><center>{{ $approval->ref }}/{{ $approval->ref2 }}/{{ $approval->ref3 }}</center></td>
                                        
                                        <td><center>{{ $approval->sen }} - {{ $approval->gen }}</center></td>
                                        <td><center>{{ $approval->title }}</center></td>
                                        <td><center>APPROVAL REQUEST</center></td>
                                        <td><center>{{ \Carbon\Carbon::parse($approval->created_at)->format('D, d M Y h:i A')}}</center></td>
                                        <td><center><i class="fa fa-check" style="font-size:30px;color:green"></i></center></td>
                                        <td><center>
                                            <a href="{{ url('/') }}/approvals/otherapproval/{{$approval->id}}" class="btn btn-info">VIEW</a></center>
                                        </td>
                                    </tr>
                                    @endif
                                    @if(Auth::user()->roll === $approval->rec && $approval->update1 === null || 
                                        Auth::user()->roll === $approval->rec1 && $approval->update2 === 
                                        null || 
                                        Auth::user()->roll === $approval->rec2 && $approval->update3 === 
                                        null || 
                                        Auth::user()->roll === $approval->rec3 && $approval->update4 === 
                                        null)
                                    <tr id="success">
                                        <td><center>{{ $approval->ref }}/{{ $approval->ref2 }}/{{ $approval->ref3 }}</center></td>
                                        
                                        <td><center>{{ $approval->sen }} - {{ $approval->gen }}</center></td>
                                        <td><center>{{ $approval->title }}</center></td>
                                        <td><center>APPROVAL REQUEST</center></td>
                                        <td><center>{{ \Carbon\Carbon::parse($approval->created_at)->format('D, d M Y h:i A')}}</center></td>
                                        <td><center><i class="fa fa-refresh" style="font-size:30px;color:orange"></i></center></td>
                                        <td><center>
                                            <a href="{{ url('/') }}/approvals/otherapproval/{{$approval->id}}" class="btn btn-info">VIEW</a></center>
                                        </td>
                                    </tr>
                                    @endif
                                    @endif
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

          <script type="text/javascript">
  $( function() {
    $( "#datepicker" ).datepicker();
  } );

    </script>
@endsection