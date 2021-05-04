@extends('layouts.app')

@section('content')
    <div class="container">
        
    <div class="row"> <a href="{{url('/')}}/approvals/otherapproval" class="btn btn-info">BACK</a>
    <a href="{{url('/')}}/approvals/otherapproval/{{$approvals->id}}/pdf" class="btn btn-info" target="_blank">PDF</a></div>
      <br>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><center><h3>ADDISON & CO.LTD.,</h3></center></div><br>
                    <div class="container-fluid">
                    <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th colspan="4"><h3><center>APPROVAL SLIP</center></h3></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="lead" colspan="4"><b>REF ID:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$approvals->ref}}/{{$approvals->ref2}}/{{$approvals->ref3}}</td>
                            </tr>

                            <tr>
                               <td class="lead" colspan="2"><b>ITEM:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$approvals->title}}</td>
                               <td class="lead" colspan="2"><b>COMMITMENT :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$approvals->sub}}</td>
                            </tr>

                            <tr>
                               <td class="text-justify" colspan="4">{!!html_entity_decode($approvals->des)!!}</td>
                              
                            </tr>
                            <tr>

                               <td class="text-justify" colspan="2"><b>LIST OF DOCUMENTS ATTACHED:</b></td>
                                <td class="lead" colspan="1"><b>1 . </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{ url('/') }}/storage/docs/{{$approvals->md}}" target="_blank">{{$approvals->md}}</a></td>
                                <td class="lead" colspan="1"><b>2 . </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{ url('/') }}/storage/docs/{{$approvals->sd}}" target="_blank">{{$approvals->sd}}</a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    </div>
            </div>
        </div>

            <center>  
                @if($approvals->sen !== $approvals->ref)
                
                <a href="{{url('/')}}/createapproval/otherapproval/{{$approvals->id}}/newc" class="btn btn-success">CORRECT AND SEND</a>
                @endif
            </center>
            <br>
@endsection