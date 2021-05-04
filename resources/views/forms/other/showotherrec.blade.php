@extends('layouts.app')

@section('content')
	<div class="container">
		
    <div class="row"> <a href="{{url('/')}}/approvals/otherapproval" class="btn btn-primary">GO BACK</a>
    <a href="{{url('/')}}/approvals/otherapproval/{{$approvals->id}}/pdf" class="btn btn-warning" target="_blank">VIEW PDF</a></div>
      <br>
      <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading"><center><h3>ADDISON & CO.LTD.,</h3></center></div><br>
                <div class="container-fluid">
       <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default"> 	   
               <div class="table-responsive">
			        <table class="table table-bordered table-hover .table-responsive">
                        <thead>
                            <tr>
                                <th colspan="3"><h3><center>APPROVAL SLIP</center></h3></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Auth::user()->roll === $rec)
                            <tr>
                                <td class="lead" colspan="3"><b>DATE RECEIVED:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ \Carbon\Carbon::parse($approvals->created_at)->format('d/m/Y h:i A ,D')}}
                                </td>
                            </tr>
                            @endif

                            @if(Auth::user()->roll === $rec1)
                            <tr>
                                <td class="lead" colspan="3"><b>DATE RECEIVED:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ \Carbon\Carbon::parse($approvals->update1)->format('d/m/Y h:i A ,D')}}
                                </td>
                            </tr>
                            @endif

                            @if(Auth::user()->roll === $rec2)
                            <tr>
                                <td class="lead" colspan="3"><b>DATE RECEIVED:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ \Carbon\Carbon::parse($approvals->update2)->format('d/m/Y h:i A ,D')}}
                                </td>
                            </tr>
                            @endif

                            @if(Auth::user()->roll === $rec3)
                            <tr>
                                <td class="lead" colspan="3"><b>DATE RECEIVED:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    {{ \Carbon\Carbon::parse($approvals->update3)->format('d/m/Y h:i A ,D')}}
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td class="lead" colspan="3"><b>REF ID:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$approvals->ref}}/{{$approvals->ref2}}/{{$approvals->ref3}}</td>
                            </tr>

                            <tr>
                               <td class="lead" colspan="2"><b>ITEM:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$approvals->title}}</td>
                               <td class="lead"><b>COMMERCIAL (in Rupees) :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$approvals->sub}}</td>
                            </tr>

                            <tr>
                               <td class="text-justify" colspan="3">{!!html_entity_decode($approvals->des)!!}</td>
                              
                            </tr>
                            <tr>

                               <td class="text-justify"><b>LIST OF DOCUMENTS ATTACHED:</b></td>
                                <td class="lead"><b>1 . </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{ url('/') }}/storage/docs/{{$approvals->md}}" target="_blank">{{$approvals->md}}</a></td>
                                <td class="lead"><b>2 . </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{ url('/') }}/storage/docs/{{$approvals->sd}}" target="_blank">{{$approvals->sd}}</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>	
            </div>
                  
            <div class="row">
                <div class="col-md-6">
                    <center>  
                        <a href="{{url('/')}}/approvals/otherapproval/{{$approvals->id}}/forward3" class="btn btn-success">FORWARD</a>
                    </center>
                </div>

                <div class="col-md-6">
                    <center> 
                        <a href="{{url('/')}}/approvals/otherapproval/{{$approvals->id}}/resend3" class="btn btn-warning">RESEND</a>
                    </center>
                </div><br><br>
            </div>
        </div>	
    </div>
@endsection