@extends('layouts.app')

@section('content')
    <div class="container"><br>
        <div class="row">    
        <div class="col-md-2">
            <div class="row"> <a href="{{ url('/') }}/status/dealerapproval" class="btn btn-info">GO BACK</a></div><br>
        </div>
        <div class="col-md-8">
            <center>
                <H4>
                  <a href="{{ url('/') }}/status/">STATUS    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/status/vendorapproval">VENDOR APPROVAL    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/status/vendorapproval/{{ $approvals->id }}"><u>VENDOR DETAILS</u>    </a>
          </H4>
            </center>
        </div>
    </div>
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading"><center><h3>STATUS OF THE APPROVAL</h3></center></div>
                <div class="panel-body">           
                   <div class="row">
                      <div class="panel-body">             
                        <div class="table-responsive">
                            <table class="table table-bordered">
                              <tbody>
                                  <thead>
                                    <tr>
                                        <th><center>APPROVAL AUTHORITY 1</center></th>
                                        <th><center>APPROVAL AUTHORITY 2</center></th>
                                        <th><center>APPROVAL AUTHORITY 3</center></th>
                                        <th><center>APPROVAL AUTHORITY 4</center></th>
                                    </tr>
                                  </thead>
                                    <tr>
                                    <td>
                                      @if($approvals->update1 !== null)
                                      <center>{{ $name }} &nbsp;<i class="fa fa-check" style="font-size:20px;color:green"></i></center>
                                        <center>{{ $approvals->rec }} &nbsp;</center>
                                        <center>{{ \Carbon\Carbon::parse($approvals->update1)->format('d/m/Y h:i A')}}</center><center>{{$approvals->ip1}}</center>
                                      @else
                                        @if($approvals->rec !== 0)
                                        <center>{{ $name }}</center>
                                        <center>{{ $approvals->rec }}</center>@endif
                                        <center><i class="fa fa-refresh" style="font-size:30px;color:orange"></i></center>
                                      @endif
                                    </td>

                                    <td>
                                    @if($rec1 === 0)
                                      <center>NOT APPLICABLE</center>
                                    @else
                                      @if($approvals->update2 !== null)
                                        <center>{{ $name1 }} &nbsp;<i class="fa fa-check" style="font-size:20px;color:green"></i></center>
                                        <center>{{ $approvals->rec1 }} &nbsp;</center>
                                        <center>{{ \Carbon\Carbon::parse($approvals->update2)->format('d/m/Y h:i A')}}</center><center>{{$approvals->ip2}}</center>
                                      @else
                                        @if($approvals->rec1 !== 0 && $approvals->update2 === null)
                                         
                                          <center> {{ $name1}} &nbsp;<i class="fa fa-refresh" style="font-size:30px;color:orange"></i></center>
                                          <center>{{ $approvals->rec1 }}</center>
                                          @endif
                                        @endif
                                     @endif
                                    </td>

                                    <td>
                                      @if($rec2 === 0)
                                        <center>NOT APPLICABLE</center>
                                      @else
                                        @if($approvals->update3 !== null)
                                          <center>{{ $name2 }} &nbsp;<i class="fa fa-check" style="font-size:20px;color:green"></i></center>
                                        <center>{{ $approvals->rec2 }} &nbsp;</center>
                                          <center>{{ \Carbon\Carbon::parse($approvals->update3)->format('d/m/Y h:i A')}}</center><center>{{$approvals->ip3}}</center>
                                        @else
                                          @if($approvals->rec2 !== 0)
                                            <center><i class="fa fa-refresh" style="font-size:30px;color:orange"></i></center>
                                          @endif
                                        @endif
                                      @endif
                                    </td>
                                      
                                    <td>
                                      @if($rec3 === 0)
                                        <center>NOT APPLICABLE</center>
                                      @else
                                        @if($approvals->update4 !== null)
                                          <center>{{ $name3 }} &nbsp;<i class="fa fa-check" style="font-size:20px;color:green"></i></center>
                                        <center>{{ $approvals->rec3 }} &nbsp;</center>
                                          <center>{{ \Carbon\Carbon::parse($approvals->update4)->format('d/m/Y h:i A')}}</center><center>{{$approvals->ip4}}</center>
                                        @else
                                          @if($approvals->rec3 !== 0)
                                            <center><i class="fa fa-refresh" style="font-size:30px;color:orange"></i></center>
                                          @endif
                                        @endif
                                      @endif
                                    </td>
                                  </tr>
                                </tbody> 
                            </table>
                        </div>
                    </div>
                 </div>
              </div>
            </div>
        </div> 
        
        @if(($rec1 === 0 && $approvals->update1 !== null) || ($rec2 === 0 && $approvals->update2 !== null) || ($rec3 === 0 && $approvals->update3 !== null)  || ($approvals->update4 !== null))
         <div class="row"><center>
        <a href="{{url('/')}}/oldapprovals/dealerapproval/{{$approvals->id}}/final" class="btn btn-success" target="_blank">GENERATE PDF</a></center></div><br>
        @endif
    </div>
@endsection
