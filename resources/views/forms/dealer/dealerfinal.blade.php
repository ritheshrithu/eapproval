<!DOCTYPE html>
<html>
<head>
  <title>{{$dealer->title}}</title>
</head>
  
  <style type="text/css" media="screen">
        html,body
        {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            background-color: white;
            color: black;
            margin: 4px 4px 4px 4px;
        }
        #pdf
        {
            border: 1px solid black;
            border-style: double;
        }
        table 
        {
            border-collapse: collapse;
        }

        table, th, td 
        {
            border: 1px solid black;
        }
         td 
        {
            padding: 7px;
            text-align: left;   
            font-size: 13px; 
        }
        .text
        {
            font-size: 13px;
        }
        .head
        {
            font-size: 14px;
        }
    </style>

<body>
  <div id="pdf">
    <table width="100%">          
        <tr class="clearfix">
            <td colspan="2"><center><img src="storage/addison.jpg" width="110px" height="60px"></center></td>
                <td colspan="3" class="head"><center><h2>ADDISON & CO LTD.,</h2></center></td>
                    <td colspan="1"><center><h2>01 P004 F1</h2></center></td>
        </tr>
    </table>
        <table width="100%">  
        <tr>
            <td colspan="6" class="text"><center><b>DEALERS ENROLMENT CUM CREDIT APPROVAL</b></center></td>
        </tr>

        </table>
            <table width="100%"> 
            <tbody>
                               <tr class="clearfix">
                                    <td colspan="1"><center>1</center></td>
                                    <td colspan="1" class="text-left">NAME OF DEALER</td>
                                    <td colspan="4" class="text-left">{{$dealer->name}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>2</center></td>
                                    <td colspan="1" class="text-left">FULL POSTAL ADDRESS WITH LANDLINE & MOBILE NOS.</td>
                                    <td colspan="4" class="text-left">{!!html_entity_decode($dealer->address)!!}</td>
                                </tr>

                                <tr class="clearfix" height="10px">
                                    <td colspan="1"><center>3</center></td>
                                    <td colspan="1" class="text-left">EMAIL</td>
                                    <td colspan="4" class="text-left">{{$dealer->email}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>4</center></td>
                                    <td colspan="1" class="text-left">PAN NO</td>
                                    <td colspan="4" class="text-left">{{$dealer->pan}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>5</center></td>
                                    <td colspan="1" class="text-left">CONSTITUTION (PLEASE TICK ONE)</td>
                                    <td colspan="4" class="text-left">{{$dealer->constitution}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>6</center></td>
                                    <td colspan="1" class="text-left">NAME OF THE PROPRIETOR / PARTNER – WHO WILL BE DIRECTLY HANDLING OUR PRODUCTS</td>
                                    <td colspan="4" class="text-left">{{$dealer->handler}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>7</center></td>
                                    <td colspan="1" class="text-left">YEAR OF ESTABLISHMENT</td>
                                    <td colspan="4" class="text-left">{{$dealer->year}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>8</center></td>
                                    <td colspan="1" class="text-left">GST NO</td>
                                    <td colspan="4" class="text-left">{{$dealer->gst}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>9</center></td>
                                    <td colspan="1" class="text-left">STATE NAME</td>
                                    <td colspan="4" class="text-left">{{$dealer->state}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>10</center></td>
                                    <td colspan="1" class="text-left">NAME OF DEALER’S BANKER / POSTAL ADDRESS</td>
                                    <td colspan="4" class="text-left">{!!html_entity_decode($dealer->dealerbank)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>11(A)</center></td>
                                    <td colspan="1" class="text-left">SPECIFY DETAILS, IN CASE OF AUTHORIZED DEALER FOR ANY OTHER PRODUCTS</td>
                                    <td colspan="4" class="text-left">{!!html_entity_decode($dealer->authdealer)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>11(B)</center></td>
                                    <td colspan="1" class="text-left">IF SO, WHETHER DEALING DIRECT OR THROUGH ANY OTHER SOURCE</td>
                                    <td colspan="4" class="text-left">{!!html_entity_decode($dealer->authdirect)!!}</td>
                                </tr>

                              <tr class="clearfix">
                                    <td colspan="1"><center>12</center></td>
                                    <td colspan="1" class="text-left">MAINLY SELLING TO</td>
                                    <td colspan="4" class="text-left">{{$dealer->selling}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>13</center></td>
                                    <td colspan="1" class="text-left">IF ALREADY DEALING WITH CUTTING TOOLS, HOW LONG AND SOURCE OF PURCHASE AND BRAND IN WHICH DEALING, INDICATING APPROXIMATE ANNUAL OFF TAKE IF POSSIBLE</td>
                                    <td colspan="4" class="text-left">{!!html_entity_decode($dealer->cutting)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1"><center>14</center></td>
                                    <td colspan="1" class="text-left">REASONS FOR TAKING ADDISON DEALERSHIP</td>
                                    <td colspan="4" class="text-left">{!!html_entity_decode($dealer->reason)!!}</td>


                                <tr class="clearfix">
                                    <td colspan="1" rowspan="3"><center>15</center></td>
                                    <td colspan="1" rowspan="3" class="text-left">ESTIMATED NETT TAKE PER YEAR FOR FIRST 3 YEARS</td>
                                    <td colspan="1" class="text-left">I</td>
                                    <td colspan="3" class="text-left">{{$dealer->nettake1}}</td>

                                </tr>
                                <tr class="clearfix">
                                    <td colspan="1" class="text-left">II</td>
                                    <td colspan="3" class="text-left">{{$dealer->nettake2}}</td>

                                </tr>
                                <tr class="clearfix">
                                    <td colspan="1" class="text-left">III</td>
                                    <td colspan="3" class="text-left">{{$dealer->nettake3}}</td>

                                </tr>


                                <tr class="clearfix">
                                    <td colspan="1"><center>16</center></td>
                                    <td colspan="1" class="text-left">PAYMENT TERMS RECOMMENDED AND JUSTIFICATION IF CREDIT RECOMMENDED</td>
                                    <td colspan="4" class="text-left">{!!html_entity_decode($dealer->paymentterms)!!}</td>
                                </tr>
                              </tbody>
                            </table>

                            <table width="100%">
                              <tbody>
                                    <tr>
                                        <th colspan="2" class="text"><center><b>APPROVAL AUTHORITY 1</b></center></th>
                                        <th colspan="2" class="text"><center><b>APPROVAL AUTHORITY 2</b></center></th>
                                        <th colspan="2" class="text"><center><b>APPROVAL AUTHORITY 3</b></center></th>
                                        <th colspan="2" class="text"><center><b>APPROVAL AUTHORITY 4</b></center></th>
                                    </tr>
                                    <tr>
                                    <td colspan="2">
                                      @if($dealer->update1 !== null)
                                      <center>{{ $name }} &nbsp;<i class="fa fa-check" style="font-size:20px;color:green"></i></center>
                                        <center>{{ $dealer->rec }} &nbsp;</center>
                                        <center>{{ \Carbon\Carbon::parse($dealer->update1)->format('d/m/Y h:i A')}}</center><center>{{$dealer->ip1}}</center>
                                      @else
                                        @if($dealer->rec !== 0)
                                        <center>{{ $name }}</center>
                                        <center>{{ $dealer->rec }}</center>@endif
                                        <center><i class="fa fa-refresh" style="font-size:30px;color:orange"></i></center>
                                      @endif
                                    </td>

                                    <td colspan="2">
                                    @if($rec1 === 0)
                                      <center>NOT APPLICABLE</center>
                                    @else
                                      @if($dealer->update2 !== null)
                                        <center>{{ $name1 }} &nbsp;<i class="fa fa-check" style="font-size:20px;color:green"></i></center>
                                        <center>{{ $dealer->rec1 }} &nbsp;</center>
                                        <center>{{ \Carbon\Carbon::parse($dealer->update2)->format('d/m/Y h:i A')}}</center><center>{{$dealer->ip2}}</center>
                                      @else
                                        @if($dealer->rec1 !== 0 && $dealer->update2 === null)
                                         
                                          <center> {{ $name1}} &nbsp;<i class="fa fa-refresh" style="font-size:30px;color:orange"></i></center>
                                          <center>{{ $dealer->rec1 }}</center>
                                          @endif
                                        @endif
                                     @endif
                                    </td>

                                    <td colspan="2">
                                      @if($rec2 === 0)
                                        <center>NOT APPLICABLE</center>
                                      @else
                                        @if($dealer->update3 !== null)
                                          <center>{{ $name2 }} &nbsp;<i class="fa fa-check" style="font-size:20px;color:green"></i></center>
                                        <center>{{ $dealer->rec2 }} &nbsp;</center>
                                          <center>{{ \Carbon\Carbon::parse($dealer->update3)->format('d/m/Y h:i A')}}</center><center>{{$dealer->ip3}}</center>
                                        @else
                                          @if($dealer->rec2 !== 0)
                                            <center><i class="fa fa-refresh" style="font-size:30px;color:orange"></i></center>
                                          @endif
                                        @endif
                                      @endif
                                    </td>
                                      
                                    <td colspan="2">
                                      @if($rec3 === 0)
                                        <center>NOT APPLICABLE</center>
                                      @else
                                        @if($dealer->update4 !== null)
                                          <center>{{ $name3 }} &nbsp;<i class="fa fa-check" style="font-size:20px;color:green"></i></center>
                                        <center>{{ $dealer->rec3 }} &nbsp;</center>
                                          <center>{{ \Carbon\Carbon::parse($dealer->update4)->format('d/m/Y h:i A')}}</center><center>{{$dealer->ip4}}</center>
                                        @else
                                          @if($dealer->rec3 !== 0)
                                            <center><i class="fa fa-refresh" style="font-size:30px;color:orange"></i></center>
                                          @endif
                                        @endif
                                      @endif
                                    </td>
                                  </tr>
                                </tbody> 
                            </table>
                       
  </div>

</body>
</html>