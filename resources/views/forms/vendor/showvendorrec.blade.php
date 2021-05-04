@extends('layouts.app')

@section('content')
<div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{url('/')}}/approvals/vendorapproval/" class="btn btn-info">GO BACK</a>
                        <a href="{{url('/')}}/approvals/vendorapproval/{{$vendor->id}}/pdf" class="btn btn-warning" target="_blank">VIEW PDF</a>
                    </div>     
        <div class="col-md-8">
            <H4><a href="{{ url('/') }}/approvals/">RECEIVED APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/approvals/vendorapproval">VENDOR APPROVAL    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/approvals/vendorapproval/{{$vendor->id}}"> VENDOR DETAILS    </a></H4>
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
                                  <th colspan="2"><center>VENDOR DETAILS</center></th>
                                  <th colspan="2"><center>DATE : {{ \Carbon\Carbon::parse($vendor->created_at)->format('d/m/Y h:i A ,D')}}</center></th>
                              </tr>
                          </thead>
                          <tbody>


                                <tr class="clearfix">
                                    <td colspan="1"><center>1</center></td>
                                    <td colspan="1" class="text-left">LOCATION</td>
                                    <td colspan="3" class="text-left">{{$vendor->location}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>2</center></td>
                                    <td colspan="1" class="text-left">VENDOR CODE</td>
                                    <td colspan="3" class="text-left">{{$vendor->vendorcode}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>3</center></td>
                                    <td colspan="1" class="text-left">PAYMENT TERMS</td>
                                    <td colspan="3" class="text-left">{{$vendor->paymentterms}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>4</center></td>
                                    <td colspan="1" class="text-left">CURRENCY</td>
                                    <td colspan="3" class="text-left">{{$vendor->currency}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>5</center></td>
                                    <td colspan="1" class="text-left">PAYMENT MODE</td>
                                    <td colspan="1" class="text-left">{{$vendor->paymentmode}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>6</center></td>
                                    <td colspan="1" class="text-left">CLASS</td>
                                    <td colspan="3" class="text-left">{{$vendor->class}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>7</center></td>
                                    <td colspan="1" class="text-left">NAME</td>
                                    <td colspan="3" class="text-left">{{$vendor->name}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>8</center></td>
                                    <td colspan="1" class="text-left">PAN</td>
                                    <td colspan="3" class="text-left">{{$vendor->pan}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>8</center></td>
                                    <td colspan="1" class="text-left">ADDRESS 1</td>
                                    <td colspan="3" class="text-left"> {!!html_entity_decode($vendor->address1)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>9</center></td>
                                    <td colspan="1" class="text-left">ADDRESS 2</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($vendor->address2)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>10</center></td>
                                    <td colspan="1" class="text-left">ADDRESS 3</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($vendor->address2)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>11</center></td>
                                    <td colspan="1" class="text-left">CITY</td>
                                    <td colspan="3" class="text-left">{{$vendor->city}}</td>
                                </tr>

                              <tr class="clearfix">
                                    <td colspan="1"><center>12</center></td>
                                    <td colspan="1" class="text-left">COUNTRY</td>
                                    <td colspan="3" class="text-left">{{$vendor->country}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>13</center></td>
                                    <td colspan="1" class="text-left">STATE</td>
                                    <td colspan="3" class="text-left">{{$vendor->state}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>14</center></td>
                                    <td colspan="1" class="text-left">PINCODE</td>
                                    <td colspan="3" class="text-left">{{$vendor->pincode}}</td>


                                <tr class="clearfix">
                                    <td colspan="1"><center>15</center></td>
                                    <td colspan="1" class="text-left">PHONE</td>
                                    <td colspan="3" class="text-left">{{$vendor->phone}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>16</center></td>
                                    <td colspan="1" class="text-left">FAX</td>
                                    <td colspan="3" class="text-left"> {{$vendor->fax}}</td>
                                </tr>


                                <tr class="clearfix">
                                    <td colspan="1"><center>17</center></td>
                                    <td colspan="1" class="text-left">ITEMS PROPOSED TO BE PURCHASED / SERVICES PROPOSED TO BE AVAILED</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($vendor->proposed)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>18</center></td>
                                    <td colspan="1" class="text-left">NEED / JUSTIFICATION FOR THE INTRODUCTION OF NEW VENDOR</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($vendor->justification)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>19</center></td>
                                    <td colspan="1" class="text-left">PAYMENT OF TERM OF EXISTING VENDOR SUPLLYING SAME / SIMILAR ITEMS / PROVIDING SIMILAR SERVICE</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($vendor->paymentofterm)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1" class="text-left">20</td>
                                    <td colspan="1" class="text-left">REFERENCE IF ANY</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($vendor->referenceif)!!}</td>
                                </tr>
                                
                                <tr class="clearfix">
                                    <td colspan="1"><center>21</center></td>
                                    <td colspan="1" class="text-left">PAN</td>
                                    <td colspan="3" class="text-left">{{$vendor->pan}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>22</center></td>
                                    <td colspan="1" class="text-left">ESI NO</td>
                                    <td colspan="3" class="text-left">{{$vendor->esi}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>23</center></td>
                                    <td colspan="1" class="text-left">VENDOR TYPE</td>
                                    <td colspan="3" class="text-left">{{$vendor->vendortype}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>24</center></td>
                                    <td colspan="1" class="text-left">GST STATE CODE</td>
                                    <td colspan="3" class="text-left">{{$vendor->gststate}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>25</center></td>
                                    <td colspan="1" class="text-left">GST IN</td>
                                    <td colspan="3" class="text-left">{{$vendor->gstin}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>26</center></td>
                                    <td colspan="1" class="text-left">HSN CODE FOR GOODS </td>
                                    <td colspan="3" class="text-left">{{$vendor->hsncode}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>27</center></td>
                                    <td colspan="1" class="text-left">SAC CODE FOR SERVICES </td>
                                    <td colspan="3" class="text-left">{{$vendor->hsncode}}</td>
                                </tr>
                                <tr class="clearfix">
                                    <td  rowspan="3"><center><b>28</b></center></td>
                                    <td  rowspan="3"><b>DOCUMENTS ATTACHED </b></td>
                                    <td colspan="3" class="text-left"><a href="{{ url('/') }}/storage/docs/{{$vendor->doc3}}" target="_blank">{{$vendor->doc1}}</a></td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="3" class="text-left"><a href="{{ url('/') }}/storage/docs/{{$vendor->doc3}}" target="_blank">{{$vendor->doc2}}</a></td>
                                </tr>
                                <tr class="clearfix">
                                    <td colspan="3" class="text-left"><a href="{{ url('/') }}/storage/docs/{{$vendor->doc3}}" target="_blank">{{$vendor->doc3}}</a></td>
                                </tr>
                           </tbody>
                        </table>
                    </div>

                <div class="row">
                    <div class="col-md-6">
                        <center>
                        <a href="{{url('/')}}/approvals/vendorapproval/{{$vendor->id}}/resend2/" class="btn btn-danger">RESEND</a>
                        </center>
                    </div>
                    <div class="col-md-6">
                        <center>  
                            <a href="{{url('/')}}/approvals/vendorapproval/{{$vendor->id}}/forward2/" class="btn btn-success">FORWARD</a>    
                        </center>
                    </div>
                </div><br><br><br>
            </div>
        @endsection