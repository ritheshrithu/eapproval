@extends('layouts.app')

@section('content')
<div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{url('/')}}/approvals/creditapproval/" class="btn btn-info">GO BACK</a>
                        <a href="{{url('/')}}/approvals/creditapproval/{{$credit->id}}/pdf" class="btn btn-warning" target="_blank">VIEW PDF</a>
                    </div>     
        <div class="col-md-8">
            <H4><a href="{{ url('/') }}/approvals/">RECEIVED APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/approvals/creditapproval">CREDIT APPROVAL    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/approvals/creditapproval/{{$credit->id}}"> {{$credit->title}}    </a></H4>
        </div>
    </div>
            </div><br><br>
             <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                <div class="panel-heading"><center><h3>ADDISON & CO.LTD.,</h3></center></div><br>
                <div class="container-fluid">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <table class="table table-bordered">
                          <thead>
                              <tr class="clearfix">
                                  <th colspan="4" height="30"><center>CREDIT APPROVAL</center></th>
                              </tr>
                          </thead>
                          <tbody>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left">DIVISION : MANUFACTURING</td>
                                    <td colspan="2" class="text-left">DATE : {{ \Carbon\Carbon::parse($credit->created_at)->format('d/m/Y h:i A ,D')}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>1</center></td>
                                    <td colspan="1" class="text-left">NAME OF THE DEALER</td>
                                    <td colspan="3" class="text-left">{{$credit->title}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>2</center></td>
                                    <td colspan="1" class="text-left">FULL POSTAL ADDRESS</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($credit->address)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>3</center></td>
                                    <td colspan="1" class="text-left">TELEPHONE NUMBER</td>
                                    <td colspan="3" class="text-left">{{$credit->telephone}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>4</center></td>
                                    <td colspan="1" class="text-left">CONSTITUTION</td>
                                    <td colspan="3" class="text-left">{{$credit->constitution}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>5</center></td>
                                    <td colspan="1" class="text-left">YEAR OF ESTABLISHMENT</td>
                                    <td colspan="3" class="text-left">{{$credit->year}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>6</center></td>
                                    <td colspan="1" class="text-left">CONTACT PERSON DETAILS</td>
                                    <td colspan="3" class="text-left">{{$credit->email}}<br>{{$credit->email}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>7</center></td>
                                    <td colspan="1" class="text-left">PAN</td>
                                    <td colspan="3" class="text-left">{{$credit->pan}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>8</center></td>
                                    <td colspan="1" class="text-left">CIN </td>
                                    <td colspan="3" class="text-left"> {{$credit->cin}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>9</center></td>
                                    <td colspan="1" class="text-left">GST IN</td>
                                    <td colspan="3" class="text-left">{{$credit->gst}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>10</center></td>
                                    <td colspan="1" class="text-left">STATE NAME</td>
                                    <td colspan="3" class="text-left">{{$credit->state}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>11</center></td>
                                    <td colspan="1" class="text-left">CURRENCY</td>
                                    <td colspan="3" class="text-left">{{$credit->currency}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td rowspan="5"><center>12</center></td>
                                    <td colspan="3" class="text-center">CUSTOMER’S BANK DETAILS</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1" class="text-left">CUSTOMER’S BANK NAME</td>
                                    <td colspan="3" class="text-left">{{$credit->bankname}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1" class="text-left">BRANCH NAME</td>
                                    <td colspan="3" class="text-left">{{$credit->bankbranch}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1" class="text-left">CUSTOMER’S BANK A/C NO</td>
                                    <td colspan="3" class="text-left">{{$credit->bankaccno}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1" class="text-left">IFSC CODE</td>
                                    <td colspan="3" class="text-left">{{$credit->bankifsc}}</td>
                                </tr>



                                <tr class="clearfix">
                                    <td colspan="1"><center>13</center></td>
                                    <td colspan="1" class="text-left">PLANT SET UP DETAILS</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($credit->setup)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>14</center></td>
                                    <td colspan="1" class="text-left">COMPONENT MANUFACTURING</td>
                                    <td colspan="3" class="text-left"> {{$credit->component}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>15</center></td>
                                    <td colspan="1" class="text-left">SUPPLIED TO</td>
                                    <td colspan="3" class="text-left">{{$credit->supplied}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>16</center></td>
                                    <td colspan="1" class="text-left">DEALING WITH CUTTING TOOLS</td>
                                    <td colspan="3" class="text-left">{{$credit->cuttools}}</td>
                                </tr>
                                <tr class="clearfix">
                                    <td rowspan="4"><center>17</center></td>
                                    <td colspan="3" class="text-center">DETAILS</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1" class="text-left">DURATION IN BUSINESS</td>
                                    <td colspan="3" class="text-left">{{$credit->duration}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1" class="text-left">SOURCE OF PURCHASE</td>
                                    <td colspan="3" class="text-left">{{$credit->source}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1" class="text-left">BRANDS DEALING WITH</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($credit->brands)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td rowspan="4"><center>18</center></td>
                                    <td colspan="3" class="text-center">SALES REVENUES OF LAST THREE YEARS (MENTION YEAR AND TURNOVER IN LAKHS)</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1" class="text-left">I</td>
                                    <td colspan="3" class="text-left">{{$credit->sales1}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1" class="text-left">II</td>
                                    <td colspan="3" class="text-left">{{$credit->sales2}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1" class="text-left">III</td>
                                    <td colspan="3" class="text-left">{{$credit->sales3}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>19</center></td>
                                    <td colspan="1" class="text-left">NUMBER OF EMPLOYEES</td>
                                    <td colspan="3" class="text-left">{{$credit->employees}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>20</center></td>
                                    <td colspan="1" class="text-left">NATURE OF TRANSACTION, IF ANY, WITH ANY OF THE AMALGAMATIONS GROUP WITH TERMS OF PAYMENT</td>
                                    <td colspan="3" class="text-left"> {!!html_entity_decode($credit->transaction)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>21</center></td>
                                    <td colspan="1" class="text-left">ESTIMATED ANNUAL OFFTAKE</td>
                                    <td colspan="3" class="text-left">{{$credit->annual}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>22</center></td>
                                    <td colspan="1" class="text-left">PAYMENT TERMS RECOMMENDED FOR CONSIDERATION</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($credit->payment)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>23</center></td>
                                    <td colspan="1" class="text-left">JUSTIFICATION, IF CREDIT IS RECOMMENDED</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($credit->justify)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>24</center></td>
                                    <td colspan="1" class="text-left">REMARKS, IF ANY</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($credit->remarks)!!} </td>
                                </tr>
                                 <tr class="clearfix">
                                    <td  rowspan="3"><center><b>25</b></center></td>
                                    <td  rowspan="3"><b>DOCUMENTS ATTACHED </b></td>
                                    <td colspan="3" class="text-left"><a href="{{ url('/') }}/storage/docs/{{$credit->doc3}}" target="_blank">{{$credit->doc1}}</a></td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="3" class="text-left"><a href="{{ url('/') }}/storage/docs/{{$credit->doc3}}" target="_blank">{{$credit->doc2}}</a></td>
                                </tr>
                                <tr class="clearfix">
                                    <td colspan="3" class="text-left"><a href="{{ url('/') }}/storage/docs/{{$credit->doc3}}" target="_blank">{{$credit->doc3}}</a></td>
                                </tr>
                                

                               



                          </tbody>
                      </table>
            </div>
            <div class="row">
                    <div class="col-md-6">
                        <center>
                        <a href="{{url('/')}}/approvals/creditapproval/{{$credit->id}}/resend1" class="btn btn-danger">RESEND</a>
                        </center>
                    </div>
                    <div class="col-md-6">
                        <center>  
                            <a href="{{url('/')}}/approvals/creditapproval/{{$credit->id}}/forward1/" class="btn btn-success">FORWARD</a>    
                        </center>
                    </div>
                </div><br>
        </div><br>
        @endsection