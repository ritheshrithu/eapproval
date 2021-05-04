<!DOCTYPE html>
<html>
<head>
  <title>{{$capex->title}}</title>
</head>
  
  <style type="text/css" media="screen">
        html,body
        {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            background-color: white;
            color: black;
        }
        #pdf
        {
            border: 1px solid black;
            border-style: double;
            height:910px;
            padding: 2px 2px 2px 2px;
        }
        caption
        {
            text-align: right;
        }
        table 
        {
            border-collapse: collapse;
        } 
        table tr
        {
            height: 20px;
        }       
        table, th, td 
        {
            border: 1px solid black;
        }
        th, td 
        {
        padding: 7px;
        text-align: left;  
        font-size: 13px;  
    }
    </style>

<body>
  <div id="pdf">
  <center> <img src="storage/addison.jpg" width="120px" height="70px"></center>
  <br>
    <hr>
            <caption>DATE : {{ \Carbon\Carbon::parse($capex->created_at)->format('d/m/Y h:i A')}}</caption>

    <table width="100%" border="1px">
                          <tbody>
                              <tr class="clearfix">
                               <th colspan="6" height="30"><center>CAPITAL EQUIPMENT PROCUREMENT PROPOSAL</center></th>
                              </tr>
                                <tr class="clearfix">
                                    <th colspan="1"><center>S.NO</center></td>
                                    <th colspan="1" class="text-center">DESCRIPTION</td>
                                    <th colspan="4" class="text-center">REMARKS</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>1</b></center></td>
                                    <td colspan="1" class="text-left"><b>NAME OF THE ITEM & MODEL NO.</b></td>
                                    <td colspan="4" class="text-left">{{$capex->title}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>2</b></center></td>
                                    <td colspan="1" class="text-left"><b>QUANTITY</b></td>
                                    <td colspan="4" class="text-left">{{$capex->quantity}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>3</b></center></td>
                                    <td colspan="1" class="text-left"><b>REASON FOR PURCHASING</b></td>
                                    <td colspan="4" class="text-left">{{$capex->reason}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>4</b></center></td>
                                    <td colspan="1" class="text-left"><b>NAME OF THE MANUFACTURER</b></td>
                                    <td colspan="4" class="text-left">{{$capex->manu}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>5</b></center></td>
                                    <td colspan="1" class="text-left"><b>IMPORTED OR INDIGENOUS</b></td>
                                    <td colspan="4" class="text-left">{{$capex->import}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>6</b></center></td>
                                    <td colspan="1" class="text-left"><b>NAME OF THE AGENT / DEALER</b></td>
                                    <td colspan="4" class="text-left">{{$capex->agent}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="3"><center><b>7</b></center></td>
                                    <td  colspan="1" rowspan="3"><b>TECHNICAL DESCRIPTION (ENCLOSE MANUFACTURER’S LEAFLET, QUOTATION, 
                                    ETC., )</b></td>
                                    <td colspan="4" class="text-left"><a href="{{ url('/') }}/storage/docs/{{$capex->doc3}}" target="_blank">{{$capex->doc1}}</a></td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="4" class="text-left"><a href="{{ url('/') }}/storage/docs/{{$capex->doc3}}" target="_blank">{{$capex->doc2}}</a></td>
                                </tr>
                                <tr class="clearfix">
                                    <td colspan="4" class="text-left"><a href="{{ url('/') }}/storage/docs/{{$capex->doc3}}" target="_blank">{{$capex->doc3}}</a></td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>8</b></center></td>
                                    <td colspan="1" class="text-left"><b>CAPACITY OF THE ITEM</b></td>
                                    <td colspan="4" class="text-left">{{$capex->capacity}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>9</b></center></td>
                                    <td colspan="1" class="text-left"><b>COST OF THE EQUIPMENT</b></td>
                                    <td colspan="4" class="text-left">{{$capex->base}}</td>
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
                                    <td colspan="4" class="text-left">{{$capex->order}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>12</b></center></td>
                                    <td colspan="1" class="text-left"><b>TERMS & PAYMENT DELIVERY</b></td>
                                    <td colspan="4" class="text-left">{{$capex->terms}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>13</b></center></td>
                                    <td colspan="1" class="text-left"><b>WARRANTY & TRANSIT INSURANCE</b></td>
                                    <td colspan="4" class="text-left">{{$capex->warranty}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>14</b></center></td>
                                    <td colspan="1" class="text-left"><b>TIME REQUIRED FOR COMMISSIONING THE ITEM</b></td>
                                    <td colspan="4" class="text-left">{{$capex->time}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>15</b></center></td>
                                    <td colspan="1" class="text-left"><b>PURPOSE FOR PROCUREMENT</b></td>
                                    <td colspan="4" class="text-left">{{$capex->purpose}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="5"><center><b>16</b></center></td>
                                    <td  rowspan="1"><b>I</b></td>
                                    <td colspan="4" class="text-left"><b><u>REPLACEMENT</u></b></td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>A</b></td>
                                    <td colspan="1" class="text-left"><b>REPLACEMENT</b></td>
                                    <td colspan="3" class="text-left">{{$capex->repname}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>B</b></td>
                                    <td colspan="1" class="text-left"><b>HOW OLD IS THE EQUIPMENT</b></td>
                                    <td colspan="3" class="text-left">{{$capex->repreason}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>C</b></td>
                                    <td colspan="1" class="text-left"><b>WHY THIS IS BEING REPLACED</b></td>
                                    <td colspan="3" class="text-left">{{$capex->repold}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>D</b></td>
                                    <td colspan="1" class="text-left"><b>MODE OF DISPOSAL</b></td>
                                    <td colspan="3" class="text-left">{{$capex->repmode}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="8"><center><b>17</b></center></td>
                                    <td  rowspan="1"><b>II</b></td>
                                    <td colspan="4" class="text-left"><b><u>CAPACITY INCREASE</u></b></td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>A</b></td>
                                    <td colspan="1" class="text-left"><b>CATEGORY</b></td>
                                    <td colspan="3" class="text-left">    {{$capex->capcat}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>B</b></td>
                                    <td colspan="1" class="text-left"><b>ADDITIONAL PRODUCTION EXPECTED AVERAGE PER MONTH</b></td>
                                    <td colspan="3" class="text-left">    {{$capex->capadd}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>C</b></td>
                                    <td colspan="1" class="text-left"><b>QUALITY IMPROVEMENT</b> </td>
                                    <td colspan="3" class="text-left">{{$capex->capquality}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>D</b></td>
                                    <td colspan="1" class="text-left"><b>REDUCTION / REQUIREMENT OF MEN</b></td>
                                    <td colspan="3" class="text-left">    {{$capex->capred}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>E</b></td>
                                    <td colspan="1" class="text-left"><b>COMMENCEMENT OF PRODUCTION</b></td>
                                    <td colspan="3" class="text-left">   {{$capex->capcomm}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>F</b></td>
                                    <td colspan="1" class="text-left"><b>MINOR / MAJOR BALANCING EQUIPMENT REQUIRED</b></td>
                                    <td colspan="3" class="text-left"> {{$capex->capminmaj}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  ><b>G</b></td>
                                    <td colspan="1" class="text-left"><b>SPECIAL CONSUMABLE REQUIREMENTS RECOMMENDED ( SUCH AS GRINDING  WHEELS, CUTTING OIL, HYDRAULIC OIL, COLLETS, TOOL HOLDERS ETC.,)</b></td>
                                    <td colspan="3" class="text-left">    {{$capex->capspe}}</td>
                                </tr>


                                <tr class="clearfix">
                                    <td  rowspan="11"><center><b>18</b></center></td>
                                    <td  rowspan="1"><b>III</b></td>
                                    <td colspan="4" class="text-left"><b><u>ACCESSORIES REQUIRED & APPROXIMATE COST</u></b></td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>A</b></td>
                                    <td colspan="1" class="text-left"><b>AC PLANTS</b></td>
                                    <td colspan="3" class="text-left">      {{$capex->acplants}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>B</b></td>
                                    <td colspan="1" class="text-left"><b>FUME EXTRACTORS</b></td>
                                    <td colspan="3" class="text-left">        {{$capex->acfume}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>C</b></td>
                                    <td colspan="1" class="text-left"><b>MEASURING INSTRUMENTS </b></td>
                                    <td colspan="3" class="text-left">     {{$capex->acmeasure}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>D</b></td>
                                    <td colspan="1" class="text-left"><b>VOLTAGE STABILIZERS</b></td>
                                    <td colspan="3" class="text-left">     {{$capex->acvoltage}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>E</b></td>
                                    <td colspan="1" class="text-left"><b>OIL FILTRATION</b></td>
                                    <td colspan="3" class="text-left">         {{$capex->acoil}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>F</b></td>
                                    <td colspan="1" class="text-left"><b>MATERIAL MOVEMENT </b></td>
                                    <td colspan="3" class="text-left">    {{$capex->acmaterial}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>G</b></td>
                                    <td colspan="1" class="text-left"><b>CABIN</b></td>
                                    <td colspan="3" class="text-left">       {{$capex->accabin}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>H</b></td>
                                    <td colspan="1" class="text-left"><b>FURNITURE</b></td>
                                    <td colspan="3" class="text-left">   {{$capex->acfurniture}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>I</b></td>
                                    <td colspan="1" class="text-left"><b>CIVIL WORK/AIR LINE CONNECTION</b></td>
                                    <td colspan="3" class="text-left">       {{$capex->accivil}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td  rowspan="1"><b>J</b></td>
                                    <td colspan="1" class="text-left"><b>ELECTRICAL WORK</b></td>
                                    <td colspan="3" class="text-left">  {{$capex->acelectrical}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>19</b></center></td>
                                    <td colspan="1" class="text-left"><b>WHETHER WE HAVE THE REQUIRED POWER & SPACE</b></td>
                                    <td colspan="4" class="text-left">{{$capex->space}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>20</b></center></td>
                                    <td colspan="1" class="text-left"><b>APPROXIMATE INSTALLATION EXPENSES</b></td>
                                    <td colspan="4" class="text-left">{{$capex->installapprox}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>21</b></center></td>
                                    <td colspan="1" class="text-left"><b>TRAVEL EXPENSES – OUR EXECUTIVE</b></td>
                                    <td colspan="4" class="text-left">{{$capex->travel}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>22</b></center></td>
                                    <td colspan="1" class="text-left"><b>APPROXIMATE COST OF MAINTENANCE PER ANNUM</b></td>
                                    <td colspan="4" class="text-left">{{$capex->maintenance}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>23</b></center></td>
                                    <td colspan="1" class="text-justify"><b>SPECIAL INSTRUCTION TO SALES ( HOW THE NEW EQUIPMENT ADDED IS GOING TO AFFECT THE PRESENT PATTERN OF PRODUCTION SUCH AS BATCH QUANTITY, TYPE OF TOOLS, ETC.,)</b></td>
                                    <td colspan="4" class="text-left">{{$capex->speinstruction}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center><b>24</b></center></td>
                                    <td colspan="1" class="text-left"><b>TRAINING NEEDS AND APPROXIMATE COST</b></td>
                                    <td colspan="4" class="text-left">{{$capex->training}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="table-responsive">
                            <table border="2px">
                              <tbody>
                                  
                                    <tr>
                                        <th><center>APPROVAL AUTHORITY 1</center></th>
                                        <th><center>APPROVAL AUTHORITY 2</center></th>
                                        <th><center>APPROVAL AUTHORITY 3</center></th>
                                        <th><center>APPROVAL AUTHORITY 4</center></th>
                                    </tr>
                                 
                                
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

</body>
</html>