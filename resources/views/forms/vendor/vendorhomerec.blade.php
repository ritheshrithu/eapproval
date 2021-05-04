@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">    
        <div class="col-md-12">
            <center>
                <H4><a href="{{ url('/') }}/approvals/">RECEIVED APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/approvals/vendorapproval">VENDOR APPROVAL    </a><span class="fa fa-arrow-right"></span></H4>
            </center>
        </div>
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
                        @if($note1>0)
                                <span class="badge badge-warning">
                                    {{$note1}}
                                </span>
                            @endif
                    </a>
                </li>
            

                <li role="presentation">
                    <a href="{{ url('/approvals/creditapproval') }}">
                        CUSTOMER
                        @if($note2>0)
                                <span class="badge badge-warning">
                                    {{$note2}}
                                </span>
                            @endif
                    </a>
                </li>

                <li role="presentation">
                    <a href="{{ url('/approvals/vendorapproval') }}">
                        VENDOR
                        @if($note3>0)
                                <span class="badge badge-warning">
                                    {{$note3}}
                                </span>
                            @endif
                    </a>
                </li>

                <li role="presentation">
                    <a href="{{ url('/approvals/dealerapproval') }}">
                        DEALER
                        @if($note4>0)
                                <span class="badge badge-warning">
                                    {{$note4}}
                                </span>
                            @endif
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
       <div class="col-md-10">

            <div class="panel panel-default">
               <div class="panel-heading"><center><h3>APPROVALS & CORRECTIONS</h3></center></div>
                   <div class="panel-body">   
                            

                        <div class="table-responsive">
                             <table class="table table-borderless">
                               <tbody>
                                @if(count($vendor) > 0)
                                
                                <thead>
                                    <tr>
                                        <th><center>@sortablelink('ref2','REFERENCE ID')</center></th>
                                        <th><center>@sortablelink('ref','INITIATOR')</center></th>
                                        <th><center>@sortablelink('location','LOCATION')</center></th>
                                        <th><center>@sortablelink('TYPE')</center></th>
                                        <th><center>@sortablelink('update1','DATE RECEIVED')</center></th>
                                        
                                        <th></center>ACTIONS</center></th>
                                    </tr>
                                </thead>
                                @foreach($vendor as $approval)

                            @if((Auth::user()->roll === $approval->rec) || 
                                (Auth::user()->roll === $approval->rec1)|| 
                                (Auth::user()->roll === $approval->rec2)|| 
                                (Auth::user()->roll === $approval->rec3)) 

                            @if($approval->reference !== null)

                             @if(Auth::user()->roll === $approval->rec && $approval->update1 !== null || 
                                Auth::user()->roll === $approval->rec1 && $approval->update2 !== null || 
                                Auth::user()->roll === $approval->rec2 && $approval->update3 !== null || 
                                Auth::user()->roll === $approval->rec3 && $approval->update4 !== null)

                                    <tr>
                                        <td><center>{{ $approval->ref }}/{{ $approval->ref2 }}/{{ $approval->ref3 }}</center></td>
                                        
                                        <td><center>{{ $approval->sen }} - {{ $approval->gen }}</center></td>
                                        <td><center>{{ $approval->location }}</center></td>
                                        <td><center>APPROVAL REQUEST</center></td>
                                        @if(Auth::user()->roll === $approval->rec)
                                <td><center>
                                    {{ \Carbon\Carbon::parse($approval->created_at)->format('d/m/Y h:i A ,D')}}
                                </center></td>
                            @endif

                            @if(Auth::user()->roll === $approval->rec1)
                                <td><center>
                                    {{ \Carbon\Carbon::parse($approval->update1)->format('d/m/Y h:i A ,D')}}
                                </center></td>
                            @endif

                            @if(Auth::user()->roll === $approval->rec2)
                                <td><center>
                                    {{ \Carbon\Carbon::parse($approval->update2)->format('d/m/Y h:i A ,D')}}
                                </center></td>
                            @endif

                            @if(Auth::user()->roll === $approval->rec3)
                                <td><center>
                                    {{ \Carbon\Carbon::parse($approval->update3)->format('d/m/Y h:i A ,D')}}
                                </center></td>
                            @endif
                                        <td><center><i class="fa fa-check" style="font-size:30px;color:green"></i></center></td>
                                        <td><center>
                                            <a href="{{ url('/') }}/approvals/vendorapproval/{{$approval->id}}" class="btn btn-info">VIEW</a></center>
                                        </td>
                                    </tr>

                            @else
                                <tr id="success">
                                        <td><center>{{ $approval->ref }}/{{ $approval->ref2 }}/{{ $approval->ref3 }}</center></td>
                                        
                                        <td><center>{{ $approval->sen }} - {{ $approval->gen }}</center></td>
                                        <td><center>{{ $approval->location }}</center></td>
                                        <td><center>APPROVAL REQUEST</center></td>
                                        @if(Auth::user()->roll === $approval->rec)
                                <td><center>
                                    {{ \Carbon\Carbon::parse($approval->created_at)->format('d/m/Y h:i A ,D')}}
                                </center></td>
                            @endif

                            @if(Auth::user()->roll === $approval->rec1)
                                <td><center>
                                    {{ \Carbon\Carbon::parse($approval->update1)->format('d/m/Y h:i A ,D')}}
                                </center></td>
                            @endif

                            @if(Auth::user()->roll === $approval->rec2)
                                <td><center>
                                    {{ \Carbon\Carbon::parse($approval->update2)->format('d/m/Y h:i A ,D')}}
                                </center></td>
                            @endif

                            @if(Auth::user()->roll === $approval->rec3)
                                <td><center>
                                    {{ \Carbon\Carbon::parse($approval->update3)->format('d/m/Y h:i A ,D')}}
                                </center></td>
                            @endif
                                        <td><center><i class="fa fa-refresh" style="font-size:30px;color:orange"></i></center></td>
                                        <td><center>
                                            <a href="{{ url('/') }}/approvals/vendorapproval/{{$approval->id}}" class="btn btn-info">VIEW</a></center>
                                        </td>
                                    </tr>
                            @endif
                                
                            @else

                            <tr id="correction">
                                        <td><center>{{ $approval->ref }}/{{ $approval->ref2 }}/{{ $approval->ref3 }}</center></td>
                                        
                                        <td><center>{{ $approval->sen }} - {{ $approval->gen }}</center></td>
                                        <td><center>{{ $approval->location }}</center></td>
                                        <td><center>CORRECTIONS</center></td>
                                        @if(Auth::user()->roll === $approval->rec)
                                <td><center>
                                    {{ \Carbon\Carbon::parse($approval->created_at)->format('d/m/Y h:i A ,D')}}
                                </center></td>
                            @endif

                            @if(Auth::user()->roll === $approval->rec1)
                                <td><center>
                                    {{ \Carbon\Carbon::parse($approval->update1)->format('d/m/Y h:i A ,D')}}
                                </center></td>
                            @endif

                            @if(Auth::user()->roll === $approval->rec2)
                                <td><center>
                                    {{ \Carbon\Carbon::parse($approval->update2)->format('d/m/Y h:i A ,D')}}
                                </center></td>
                            @endif

                            @if(Auth::user()->roll === $approval->rec3)
                                <td><center>
                                    {{ \Carbon\Carbon::parse($approval->update3)->format('d/m/Y h:i A ,D')}}
                                </center></td>
                            @endif
                                        <td><center><i class="fa fa-times" style="font-size:30px;color:black"></i></center></td>
                                        <td><center>
                                            <a href="{{ url('/') }}/approvals/vendorapproval/{{$approval->id}}" class="btn btn-info">VIEW</a></center>
                                        </td>
                                    </tr>
                        
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