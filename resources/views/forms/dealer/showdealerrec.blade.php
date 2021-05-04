@extends('layouts.app')

@section('content')

<div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{url('/')}}/approvals/dealerapproval/" class="btn btn-info">GO BACK</a>
                        <a href="{{url('/')}}/approvals/dealerapproval/{{$dealer->id}}/pdf" class="btn btn-warning" target="_blank">VIEW PDF</a>
                    </div>     
        <div class="col-md-8">
            <H4><a href="{{ url('/') }}/approvals/">RECEIVED APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/approvals/dealerapproval">DEALER APPROVAL    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/approvals/dealerapproval/{{$dealer->id}}"> DEALER DETAILS    </a></H4>
        </div>
    </div>
            </div><br><br>
            
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                <div class="panel-heading"><center><h3>ADDISON & CO.LTD.,</h3></center></div><br>
                <div class="container-fluid">
   
            <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="table-responsive">
                    
                
                <table class="table table-bordered table-hover  .table-responsive">
                          <thead>
                              <tr class="clearfix">
                                  <th colspan="2"><center>DEALER DETAILS</center></th>
                                  <th colspan="2"><center>DATE : {{ \Carbon\Carbon::parse($dealer->created_at)->format('d/m/Y h:i A ,D')}}</center></th>
                              </tr>
                          </thead>
                          <tbody>


                                <tr class="clearfix">
                                    <td colspan="1"><center>1</center></td>
                                    <td colspan="1" class="text-left">NAME OF DEALER</td>
                                    <td colspan="3" class="text-left">{{$dealer->name}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>2</center></td>
                                    <td colspan="1" class="text-left">FULL POSTAL ADDRESS WITH LANDLINE & MOBILE NOS.</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($dealer->address)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>3</center></td>
                                    <td colspan="1" class="text-left">EMAIL</td>
                                    <td colspan="3" class="text-left">{{$dealer->email}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>4</center></td>
                                    <td colspan="1" class="text-left">PAN NO</td>
                                    <td colspan="3" class="text-left">{{$dealer->pan}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>5</center></td>
                                    <td colspan="1" class="text-left">CONSTITUTION (PLEASE TICK ONE)</td>
                                    <td colspan="1" class="text-left">{{$dealer->constitution}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>6</center></td>
                                    <td colspan="1" class="text-left">NAME OF THE PROPRIETOR / PARTNER – WHO WILL BE DIRECTLY HANDLING OUR PRODUCTS</td>
                                    <td colspan="3" class="text-left">{{$dealer->handler}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>7</center></td>
                                    <td colspan="1" class="text-left">YEAR OF ESTABLISHMENT</td>
                                    <td colspan="3" class="text-left">{{$dealer->year}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>8</center></td>
                                    <td colspan="1" class="text-left">GST NO</td>
                                    <td colspan="3" class="text-left">{{$dealer->gst}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>9</center></td>
                                    <td colspan="1" class="text-left">STATE NAME</td>
                                    <td colspan="3" class="text-left">{{$dealer->state}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>10</center></td>
                                    <td colspan="1" class="text-left">NAME OF DEALER’S BANKER / POSTAL ADDRESS</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($dealer->dealerbank)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>11(A)</center></td>
                                    <td colspan="1" class="text-left">SPECIFY DETAILS, IN CASE OF AUTHORIZED DEALER FOR ANY OTHER PRODUCTS</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($dealer->authdealer)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>11(B)</center></td>
                                    <td colspan="1" class="text-left">IF SO, WHETHER DEALING DIRECT OR THROUGH ANY OTHER SOURCE</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($dealer->authdirect)!!}</td>
                                </tr>

                              <tr class="clearfix">
                                    <td colspan="1"><center>12</center></td>
                                    <td colspan="1" class="text-left">MAINLY SELLING TO</td>
                                    <td colspan="3" class="text-left">{{$dealer->selling}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>13</center></td>
                                    <td colspan="1" class="text-left">IF ALREADY DEALING WITH CUTTING TOOLS, HOW LONG AND SOURCE OF PURCHASE AND BRAND IN WHICH DEALING, INDICATING APPROXIMATE ANNUAL OFF TAKE IF POSSIBLE</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($dealer->cutting)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>14</center></td>
                                    <td colspan="1" class="text-left">REASONS FOR TAKING ADDISON DEALERSHIP</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($dealer->reason)!!}</td>


                                <tr class="clearfix">
                                    <td colspan="1" rowspan="3"><center>15</center></td>
                                    <td colspan="1" rowspan="3" class="text-left">ESTIMATED NETT TAKE PER YEAR FOR FIRST 3 YEARS</td>
                                    <td colspan="1" class="text-left">I</td>
                                    <td colspan="2" class="text-left">{{$dealer->nettake1}}</td>

                                </tr>
                                <tr class="clearfix">
                                    <td colspan="1" class="text-left">II</td>
                                    <td colspan="2" class="text-left">{{$dealer->nettake2}}</td>

                                </tr>
                                <tr class="clearfix">
                                    <td colspan="1" class="text-left">III</td>
                                    <td colspan="2" class="text-left">{{$dealer->nettake3}}</td>

                                </tr>


                                <tr class="clearfix">
                                    <td colspan="1"><center>16</center></td>
                                    <td colspan="1" class="text-left">PAYMENT TERMS RECOMMENDED AND JUSTIFICATION IF CREDIT RECOMMENDED</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($dealer->paymentterms)!!}</td>
                                </tr>


                                <tr class="clearfix">
                                    <td colspan="1"><center>17</center></td>
                                    <td colspan="1" class="text-left">SIGNATURE OF THE AUTHORIZED PERSON WITH RUBBER STAMP OF THE DEALER CONFIRMING THE DETAILS FURNISHED ABOVE AS CORRECT</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($dealer->proposed)!!}</td>
                                </tr>

                               </tbody>
                        </table>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-md-6">
                        <center>
                        <a href="{{url('/')}}/approvals/dealerapproval/{{$dealer->id}}/resend4/" class="btn btn-danger">RESEND</a>
                        </center>
                    </div>
                    <div class="col-md-6">
                        <center>  
                            <a href="{{url('/')}}/approvals/dealerapproval/{{$dealer->id}}/forward4/" class="btn btn-success">FORWARD</a>    
                        </center>
                    </div>
                </div><br><br><br>
            </div>
        @endsection