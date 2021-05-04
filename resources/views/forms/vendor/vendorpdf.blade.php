<!DOCTYPE html>
<html>
<head>
  <title>{{$vendor->title}}</title>
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
            padding: 5px 5px 5px 5px;
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
        padding: 10px;
        text-align: left;    
    }
    </style>

<body>
  <div id="pdf">
    <table class="table table-bordered">          
                                <tr>
                                    <td colspan="6"><center><b>ADDISON & CO LTD.,</b></center></td>
                                </tr>
                              <tr class="clearfix">
                                <td colspan="2"><center><img src="storage/addison.jpg" width="120px" height="70px"></center></td>
                                <td colspan="3"><center><h3>VENDOR DETAILS</h3></center></td>
                                <td colspan="1"><center><h3>DATE : {{ \Carbon\Carbon::parse($vendor->created_at)->format('d/m/Y h:i A ,D')}}</h3></center></td>
                              </tr>
                          
                          <tbody>
                                <tr class="clearfix">
                                    
                                    <td colspan="2" class="text-left"><b>LOCATION</b></td>
                                    <td colspan="4" class="text-left">{{$vendor->location}}</td>
                                </tr>

                                <tr class="clearfix">
                                    
                                    <td colspan="2" class="text-left"><b>VENDOR CODE</b></td>
                                    <td colspan="4" class="text-left">{{$vendor->vendorcode}}</td>
                                </tr>

                                <tr class="clearfix">
                                    
                                    <td colspan=2 class="text-left"><b>PAYMENT TERMS</b></td>
                                    <td colspan="4" class="text-left">{{$vendor->paymentterms}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>CURRENCY</b></td>
                                    <td colspan="4" class="text-left">{{$vendor->currency}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1" class="text-left"><b>PAYMENT MODE</b></td>
                                    <td colspan="2" class="text-left">{{$vendor->paymentmode}}</td>

                                    <td colspan="1" class="text-left"><b>CLASS</b></td>
                                    <td colspan="2" class="text-left">{{$vendor->class}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>NAME</b></td>
                                    <td colspan="4" class="text-left">{{$vendor->name}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>PAN</b></td>
                                    <td colspan="4" class="text-left">{{$vendor->pan}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>ADDRESS 1</b></td>
                                    <td colspan="4" class="text-left"> {!!html_entity_decode($vendor->address1)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>ADDRESS 2</b></td>
                                    <td colspan="4" class="text-left">{!!html_entity_decode($vendor->address2)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left">ADDRESS 3</b></td>
                                    <td colspan="4" class="text-left">{!!html_entity_decode($vendor->address2)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1" class="text-left"><b>CITY</b></td>
                                    <td colspan="2" class="text-left">{{$vendor->city}}</td>

                                    <td colspan="1" class="text-left"><b>PHONE</b></td>
                                    <td colspan="2" class="text-left">{{$vendor->phone}}</td>
                                </tr>

                              <tr class="clearfix">
                                    <td colspan="1" class="text-left"><b>COUNTRY</b></td>
                                    <td colspan="2" class="text-left">{{$vendor->country}}</td>

                                    <td colspan="1" class="text-left"><b>FAX</b></td>
                                    <td colspan="2" class="text-left"> {{$vendor->fax}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="1" class="text-left"><b>STATE</b></td>
                                    <td colspan="2" class="text-left">{{$vendor->state}}</td>

                                    <td colspan="1" class="text-left"><b>EMAIL ID</b></td>
                                    <td colspan="2" class="text-left">{{$vendor->email}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>PINCODE</b></td>
                                    <td colspan="4" class="text-left">{{$vendor->pincode}}</td>
                                </tr>


                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>ITEMS PROPOSED TO BE PURCHASED / SERVICES PROPOSED TO BE AVAILED</b></td>
                                    <td colspan="4" class="text-left">{!!html_entity_decode($vendor->proposed)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>NEED / JUSTIFICATION FOR THE INTRODUCTION OF NEW VENDOR</b></td>
                                    <td colspan="4" class="text-left">{!!html_entity_decode($vendor->justification)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>PAYMENT OF TERM OF EXISTING VENDOR SUPLLYING SAME / SIMILAR ITEMS / PROVIDING SIMILAR SERVICE</b></td>
                                    <td colspan="4" class="text-left">{!!html_entity_decode($vendor->paymentofterm)!!}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>REFERENCE IF ANY</b></td>
                                    <td colspan="4" class="text-left">{!!html_entity_decode($vendor->referenceif)!!}</td>
                                </tr>
                                
                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>PAN</b></td>
                                    <td colspan="4" class="text-left">{{$vendor->pan}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>ESI NO</b></td>
                                    <td colspan="4" class="text-left">{{$vendor->esi}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>VENDOR TYPE</b></td>
                                    <td colspan="4" class="text-left">{{$vendor->vendortype}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>GST STATE CODE</b></td>
                                    <td colspan="4" class="text-left">{{$vendor->gststate}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>GST IN</b></td>
                                    <td colspan="4" class="text-left">{{$vendor->gstin}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>HSN CODE FOR GOODS </b></td>
                                    <td colspan="4" class="text-left">{{$vendor->hsncode}}</td>
                                </tr>

                                <tr class="clearfix">
                                    <td colspan="2" class="text-left"><b>SAC CODE FOR SERVICES</b> </td>
                                    <td colspan="4" class="text-left">{{$vendor->hsncode}}</td>
                                </tr>

                           </tbody>
                        </table>
  </div>

</body>
</html>