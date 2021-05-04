<!DOCTYPE html>
<html>
<head>
  <title>{{$credit->title}}</title>
</head>
  
  <style type="text/css" media="screen">
      @import url("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css");
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
            padding: 2px 2px 2px 2px;
        }
        table 
        {
            border-collapse: collapse;
        } 
        table tr
        {
            height: 15px;
        }       
        table, th, td 
        {
            border: 1px solid black;
        }
        th, td 
        {
        padding: 10px;
        text-align: left;    
        }
        .text-lefts
        {
            text-align: left;  
        }
    </style>

        <body>
  
                    <div id="pdf">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td> <center><img src="storage/addison.jpg" width="120px" height="70px"></center></td>
                                    <td> <center><h3>CREDIT APPROVAL</h3></center></td>
                                </tr>
                            </tbody>
                        </table>

                        <table width="100%" border="2px">
                            <tbody>
                                <tr>
                                    <td colspan="5" class="text-lefts">DATE : {{ \Carbon\Carbon::parse($credit->created_at)->format('d/m/Y h:i A ,D')}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>1</center></td>
                                    <td colspan="1" class="text-left">NAME OF THE DEALER</td>
                                    <td colspan="3" class="text-left">{{$credit->title}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>2</center></td>
                                    <td colspan="1" class="text-left">FULL POSTAL ADDRESS</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($credit->address)!!}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>3</center></td>
                                    <td colspan="1" class="text-left">TELEPHONE NUMBER</td>
                                    <td colspan="3" class="text-left">{{$credit->telephone}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>4</center></td>
                                    <td colspan="1" class="text-left">CONSTITUTION</td>
                                    <td colspan="3" class="text-left">{{$credit->constitution}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>5</center></td>
                                    <td colspan="1" class="text-left">YEAR OF ESTABLISHMENT</td>
                                    <td colspan="3" class="text-left">{{$credit->year}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>6</center></td>
                                    <td colspan="1" class="text-left">CONTACT PERSON DETAILS</td>
                                    <td colspan="3" class="text-left">{{$credit->email}}<br>{{$credit->email}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>7</center></td>
                                    <td colspan="1" class="text-left">PAN</td>
                                    <td colspan="3" class="text-left">{{$credit->pan}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>8</center></td>
                                    <td colspan="1" class="text-left">CIN </td>
                                    <td colspan="3" class="text-left"> {{$credit->cin}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>9</center></td>
                                    <td colspan="1" class="text-left">GST IN</td>
                                    <td colspan="3" class="text-left">{{$credit->gst}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>10</center></td>
                                    <td colspan="1" class="text-left">STATE NAME</td>
                                    <td colspan="3" class="text-left">{{$credit->state}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>11</center></td>
                                    <td colspan="1" class="text-left">CURRENCY</td>
                                    <td colspan="3" class="text-left">{{$credit->currency}}</td>
                                </tr>

                                <tr  >
                                    <td rowspan="5"><center>12</center></td>
                                    <td colspan="4" class="text-center">CUSTOMER’S BANK DETAILS</td>
                                </tr>

                                <tr  >
                                    <td colspan="1" class="text-left">CUSTOMER’S BANK NAME</td>
                                    <td colspan="3" class="text-left">{{$credit->bankname}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1" class="text-left">BRANCH NAME</td>
                                    <td colspan="3" class="text-left">{{$credit->bankbranch}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1" class="text-left">CUSTOMER’S BANK A/C NO</td>
                                    <td colspan="3" class="text-left">{{$credit->bankaccno}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1" class="text-left">IFSC CODE</td>
                                    <td colspan="3" class="text-left">{{$credit->bankifsc}}</td>
                                </tr>
                                
                                <tr  >
                                    <td colspan="1"><center>13</center></td>
                                    <td colspan="1" class="text-left">PLANT SET UP DETAILS</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($credit->setup)!!}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>14</center></td>
                                    <td colspan="1" class="text-left">COMPONENT MANUFACTURING</td>
                                    <td colspan="3" class="text-left"> {{$credit->component}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>15</center></td>
                                    <td colspan="1" class="text-left">SUPPLIED TO</td>
                                    <td colspan="3" class="text-left">{{$credit->supplied}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>16</center></td>
                                    <td colspan="1" class="text-left">DEALING WITH CUTTING TOOLS</td>
                                    <td colspan="3" class="text-left">{{$credit->cuttools}}</td>
                                </tr>
                                <tr  >
                                    <td rowspan="4"><center>17</center></td>
                                    <td colspan="4" class="text-center">DETAILS</td>
                                </tr>

                                <tr  >
                                    <td colspan="1" class="text-left">DURATION IN BUSINESS</td>
                                    <td colspan="3" class="text-left">{{$credit->duration}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1" class="text-left">SOURCE OF PURCHASE</td>
                                    <td colspan="3" class="text-left">{{$credit->source}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1" class="text-left">BRANDS DEALING WITH</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($credit->brands)!!}</td>
                                </tr>

                                <tr  >
                                    <td rowspan="4"><center>18</center></td>
                                    <td colspan="4" class="text-center">SALES REVENUES OF LAST THREE YEARS (MENTION YEAR AND TURNOVER IN LAKHS)</td>
                                </tr>

                                <tr  >
                                    <td colspan="1" class="text-left">I</td>
                                    <td colspan="3" class="text-left">{{$credit->sales1}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1" class="text-left">II</td>
                                    <td colspan="3" class="text-left">{{$credit->sales2}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1" class="text-left">III</td>
                                    <td colspan="3" class="text-left">{{$credit->sales3}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>19</center></td>
                                    <td colspan="1" class="text-left">NUMBER OF EMPLOYEES</td>
                                    <td colspan="3" class="text-left">{{$credit->employees}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>20</center></td>
                                    <td colspan="1" class="text-left">NATURE OF TRANSACTION, IF ANY, WITH ANY OF THE AMALGAMATIONS GROUP WITH TERMS OF PAYMENT</td>
                                    <td colspan="3" class="text-left"> {!!html_entity_decode($credit->transaction)!!}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>21</center></td>
                                    <td colspan="1" class="text-left">ESTIMATED ANNUAL OFFTAKE</td>
                                    <td colspan="3" class="text-left">{{$credit->annual}}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>22</center></td>
                                    <td colspan="1" class="text-left">PAYMENT TERMS RECOMMENDED FOR CONSIDERATION</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($credit->payment)!!}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>23</center></td>
                                    <td colspan="1" class="text-left">JUSTIFICATION, IF CREDIT IS RECOMMENDED</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($credit->justify)!!}</td>
                                </tr>

                                <tr  >
                                    <td colspan="1"><center>24</center></td>
                                    <td colspan="1" class="text-left">REMARKS, IF ANY</td>
                                    <td colspan="3" class="text-left">{!!html_entity_decode($credit->remarks)!!} </td>
                                </tr>
                                
                            </tbody>
                      </table>
                    </div>
                </body>
</html>