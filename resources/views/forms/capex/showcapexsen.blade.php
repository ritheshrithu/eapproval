@extends('layouts.app')

@section('content')
<div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{url('/')}}/oldapprovals/capexapproval/" class="btn btn-info">GO BACK</a>
                        <a href="{{url('/')}}/oldapprovals/capexapproval/{{$capex->id}}/pdf" class="btn btn-warning" target="_blank">VIEW PDF</a>
                    </div>     
        <div class="col-md-8">    
            <H4><a href="{{ url('/') }}/oldapprovals/">GENERATED APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/oldapprovals/capexapproval">CREDIT APPROVAL    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/oldapprovals/capexapproval/{{$capex->id}}"> {{$capex->title}}    </a></H4>
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
                    <table class="table table-bordered">
                          <thead>
                              <tr class="clearfix">
                                  <th colspan="5" height="30"><center>CAPITAL EQUIPMENT PROCUREMENT PROPOSAL</center></th>
                              </tr>
                          </thead>
                          <tbody>

                                <tr class="clearfix">
                                    <th colspan="1"><center>S.NO</center></td>
                                    <th colspan="1" class="text-center">DESCRIPTION</td>
                                    <th colspan="3" class="text-center">REMARKS</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>1</b></center></td>
                                    <td colspan="1" class="text-left"><b>NAME OF THE ITEM & MODEL NO.</b></td>
                                    <td colspan="3" class="text-left">{{$capex->title}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>2</b></center></td>
                                    <td colspan="1" class="text-left"><b>QUANTITY</b></td>
                                    <td colspan="3" class="text-left">{{$capex->quantity}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>3</b></center></td>
                                    <td colspan="1" class="text-left"><b>REASON FOR PURCHASING</b></td>
                                    <td colspan="3" class="text-left">{{$capex->reason}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>4</b></center></td>
                                    <td colspan="1" class="text-left"><b>NAME OF THE MANUFACTURER</b></td>
                                    <td colspan="3" class="text-left">{{$capex->manu}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>5</b></center></td>
                                    <td colspan="1" class="text-left"><b>IMPORTED OR INDIGENOUS</b></td>
                                    <td colspan="3" class="text-left">{{$capex->import}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>6</b></center></td>
                                    <td colspan="1" class="text-left"><b>NAME OF THE AGENT / DEALER</b></td>
                                    <td colspan="3" class="text-left">{{$capex->agent}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="3"><center><b>7</b></center></td>
                                    <td  rowspan="3"><b>TECHNICAL DESCRIPTION <a title="ENCLOSE MANUFACTURER’S LEAFLET, QUOTATION,ETC.," class="fa fa-info-circle lead" data-toggle="tooltip"></a></b></td>
                                    <td colspan="3" class="text-left"><a href="{{ url('/') }}/storage/docs/{{$capex->doc3}}" target="_blank">{{$capex->doc1}}</a></td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="3" class="text-left"><a href="{{ url('/') }}/storage/docs/{{$capex->doc3}}" target="_blank">{{$capex->doc2}}</a></td>
                                </tr>
                                <tr class="clearfix">
                                    <td colspan="3" class="text-left"><a href="{{ url('/') }}/storage/docs/{{$capex->doc3}}" target="_blank">{{$capex->doc3}}</a></td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>8</b></center></td>
                                    <td colspan="1" class="text-left"><b>CAPACITY OF THE ITEM</b></td>
                                    <td colspan="3" class="text-left">{{$capex->capacity}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>9</b></center></td>
                                    <td colspan="1" class="text-left"><b>COST OF THE EQUIPMENT</b></td>
                                    <td colspan="3" class="text-left">{{$capex->base}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1" rowspan="6"><center>10</center></td>
                                    <td colspan="1" rowspan="5" class="text-left"><b>TOTAL VALUE</b></td>
                                    <td colspan="2" class="text-left"><b>EQUIPMENT COST</b></td>
                                    <td colspan="2" class="text-left">{{$capex->eqcost}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>IMPORT DUTY</b></td>
                                    <td colspan="2" class="text-left">{{$capex->duty}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>VATTABLE PORTION</b></td>
                                    <td colspan="2" class="text-left">{{$capex->vattable}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>ELECTRICAL WORKS</b></td>
                                    <td colspan="2" class="text-left">{{$capex->electrical}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>GRAND TOTAL</b></td>
                                    <td colspan="2" class="text-left">{{$capex->total}}</td>
                                </tr>
                                
                                @if($capex->transport !== null)
                                <tr class="clearfix">
                                    <td colspan="6" class="text-left"><center><b> + CLEARING & TRANSPORT CHARGES</b></center></td>
                                </tr>
                                @endif
                                
                                <tr class="clearfix">
                                    <td colspan="1"><center><b>11</b></center></td>
                                    <td colspan="1" class="text-left"><b>ORDERING INSTRUCTION</b></td>
                                    <td colspan="3" class="text-left">{{$capex->order}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>12</b></center></td>
                                    <td colspan="1" class="text-left"><b>TERMS & PAYMENT DELIVERY</b></td>
                                    <td colspan="3" class="text-left">{{$capex->terms}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>13</b></center></td>
                                    <td colspan="1" class="text-left"><b>WARRANTY & TRANSIT INSURANCE</b></td>
                                    <td colspan="3" class="text-left">{{$capex->warranty}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>14</b></center></td>
                                    <td colspan="1" class="text-left"><b>TIME REQUIRED FOR COMMISSIONING THE ITEM</b></td>
                                    <td colspan="3" class="text-left">{{$capex->time}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>15</b></center></td>
                                    <td colspan="1" class="text-left"><b>PURPOSE FOR PROCUREMENT</b></td>
                                    <td colspan="3" class="text-left">{{$capex->purpose}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="5"><center><b>16</b></center></td>
                                    <td  rowspan="1"><b>I</b></td>
                                    <td colspan="3" class="text-left"><b><u>REPLACEMENT</u></b></td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>A</b></td>
                                    <td colspan="1" class="text-left"><b>REPLACEMENT</b></td>
                                    <td colspan="2" class="text-left">{{$capex->repname}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>B</b></td>
                                    <td colspan="1" class="text-left"><b>HOW OLD IS THE EQUIPMENT</b></td>
                                    <td colspan="2" class="text-left">{{$capex->repreason}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>C</b></td>
                                    <td colspan="1" class="text-left"><b>WHY THIS IS BEING REPLACED</b></td>
                                    <td colspan="2" class="text-left">{{$capex->repold}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>D</b></td>
                                    <td colspan="1" class="text-left"><b>MODE OF DISPOSAL</b></td>
                                    <td colspan="2" class="text-left">{{$capex->repmode}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="8"><center><b>17</b></center></td>
                                    <td  rowspan="1"><b>II</b></td>
                                    <td colspan="3" class="text-left"><b><u>CAPACITY INCREASE</u></b></td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>A</b></td>
                                    <td colspan="1" class="text-left"><b>CATEGORY</b></td>
                                    <td colspan="2" class="text-left">    {{$capex->capcat}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>B</b></td>
                                    <td colspan="1" class="text-left"><b>ADDITIONAL PRODUCTION EXPECTED AVERAGE PER MONTH</b></td>
                                    <td colspan="2" class="text-left">    {{$capex->capadd}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>C</b></td>
                                    <td colspan="1" class="text-left"><b>QUALITY IMPROVEMENT</b> </td>
                                    <td colspan="2" class="text-left">{{$capex->capquality}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>D</b></td>
                                    <td colspan="1" class="text-left"><b>REDUCTION / REQUIREMENT OF MEN</b></td>
                                    <td colspan="2" class="text-left">    {{$capex->capred}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>E</b></td>
                                    <td colspan="1" class="text-left"><b>COMMENCEMENT OF PRODUCTION</b></td>
                                    <td colspan="2" class="text-left">   {{$capex->capcomm}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>F</b></td>
                                    <td colspan="1" class="text-left"><b>MINOR / MAJOR BALANCING EQUIPMENT REQUIRED</b></td>
                                    <td colspan="2" class="text-left"> {{$capex->capminmaj}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>G</b></td>
                                    <td colspan="1" class="text-justify"><b>SPECIAL CONSUMABLE REQUIREMENTS RECOMMENDED
                                        <a class="fa fa-info-circle lead" title=" ( SUCH AS GRINDING  WHEELS, CUTTING OIL, HYDRAULIC OIL, COLLETS, TOOL HOLDERS ETC.,)" data-toggle="tooltip"></a></b></td>
                                    <td colspan="2" class="text-left">    {{$capex->capspe}}</td>
                                </tr>


                                <tr class="clearfix">
                                    <td  rowspan="11"><center><b>18</b></center></td>
                                    <td  rowspan="1"><b>III</b></td>
                                    <td colspan="3" class="text-left"><b><u>ACCESSORIES REQUIRED & APPROXIMATE COST</u></b></td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>A</b></td>
                                    <td colspan="1" class="text-left"><b>AC PLANTS</b></td>
                                    <td colspan="2" class="text-left">      {{$capex->acplants}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>B</b></td>
                                    <td colspan="1" class="text-left"><b>FUME EXTRACTORS</b></td>
                                    <td colspan="2" class="text-left">        {{$capex->acfume}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>C</b></td>
                                    <td colspan="1" class="text-left"><b>MEASURING INSTRUMENTS </b></td>
                                    <td colspan="2" class="text-left">     {{$capex->acmeasure}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>D</b></td>
                                    <td colspan="1" class="text-left"><b>VOLTAGE STABILIZERS</b></td>
                                    <td colspan="2" class="text-left">     {{$capex->acvoltage}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>E</b></td>
                                    <td colspan="1" class="text-left"><b>OIL FILTRATION</b></td>
                                    <td colspan="2" class="text-left">         {{$capex->acoil}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>F</b></td>
                                    <td colspan="1" class="text-left"><b>MATERIAL MOVEMENT </b></td>
                                    <td colspan="2" class="text-left">    {{$capex->acmaterial}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>G</b></td>
                                    <td colspan="1" class="text-left"><b>CABIN</b></td>
                                    <td colspan="2" class="text-left">       {{$capex->accabin}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>H</b></td>
                                    <td colspan="1" class="text-left"><b>FURNITURE</b></td>
                                    <td colspan="2" class="text-left">   {{$capex->acfurniture}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>I</b></td>
                                    <td colspan="1" class="text-left"><b>CIVIL WORK/AIR LINE CONNECTION</b></td>
                                    <td colspan="2" class="text-left">       {{$capex->accivil}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>J</b></td>
                                    <td colspan="1" class="text-left"><b>ELECTRICAL WORK</b></td>
                                    <td colspan="2" class="text-left">  {{$capex->acelectrical}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>19</b></center></td>
                                    <td colspan="1" class="text-left"><b>WHETHER WE HAVE THE REQUIRED POWER & SPACE</b></td>
                                    <td colspan="3" class="text-left">{{$capex->space}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>20</b></center></td>
                                    <td colspan="1" class="text-left"><b>APPROXIMATE INSTALLATION EXPENSES</b></td>
                                    <td colspan="3" class="text-left">{{$capex->installapprox}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>21</b></center></td>
                                    <td colspan="1" class="text-left"><b>TRAVEL EXPENSES – OUR EXECUTIVE</b></td>
                                    <td colspan="3" class="text-left">{{$capex->travel}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>22</b></center></td>
                                    <td colspan="1" class="text-left"><b>APPROXIMATE COST OF MAINTENANCE PER ANNUM</b></td>
                                    <td colspan="3" class="text-left">{{$capex->maintenance}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>23</b></center></td>
                                    <td colspan="1" class="text-justify"><b>SPECIAL INSTRUCTION TO SALES </b><a class="fa fa-info-circle lead" title="HOW THE NEW EQUIPMENT ADDED IS GOING TO AFFECT THE PRESENT PATTERN OF PRODUCTION SUCH AS BATCH QUANTITY, TYPE OF TOOLS, ETC" data-toggle="tooltip"></td>
                                    <td colspan="3" class="text-left">{{$capex->speinstruction}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>24</b></center></td>
                                    <td colspan="1" class="text-left"><b>TRAINING NEEDS AND APPROXIMATE COST</b></td>
                                    <td colspan="3" class="text-left">{{$capex->training}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="clearfix">
                                    <td colspan="1"><center><b>APPROVAL AUTHORITY 1</b></center></td>
                                    <td colspan="1"><center><b>APPROVAL AUTHORITY 2</b></center></td>
                                    <td colspan="1"><center><b>APPROVAL AUTHORITY 3</b></center></td>
                                    <td colspan="1"><center><b>APPROVAL AUTHORITY 4</b></center></td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>{{$capex->rec}}</center></td>
                                    <td colspan="1"><center>{{$capex->rec1}}</center></td>
                                    <td colspan="1"><center>{{$capex->rec2}}</center></td>
                                    <td colspan="1"><center>{{$capex->rec3}}</center></td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
        </div>
        <center>  
                @if($capex->sen !== $capex->ref)
                
                <a href="{{url('/')}}/createapproval/capexapproval/{{$capex->id}}/newc" class="btn btn-success">CORRECT AND SEND</a>
                @endif
            </center>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
            $( document ).ready(function() {
                $('[data-toggle="tooltip"]').tooltip({'placement': 'top'});
            });
        </script>
        <style type="text/css" media="screen">
            .tooltip
            {
                 font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 20px !important;
  font-style: normal;
  font-weight: normal;
  line-height: 1.42857143;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  letter-spacing: normal;
  word-break: normal;
  word-spacing: normal;
  word-wrap: normal;
  white-space: normal;
            }
        </style>
    @endsection