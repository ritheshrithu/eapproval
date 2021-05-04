<!DOCTYPE html>
<html>
<head>
  <title>{{$other->title}}</title>
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
	<center> <img src="storage/addison.jpg" width="120px" height="70px"></center>
    <hr>
    <table width="100%" border="2px">
    	<thead>
    		<tr>
    			<th colspan="4" height="30"><center>APPROVAL SLIP</center></th>
    		</tr>
    	</thead>
    	<tbody>
    		<tr >
    			<td  colspan="4">DATE INITIATED : {{ \Carbon\Carbon::parse($other->created_at)->format('d/m/Y h:i A')}}</td>
    		</tr>
    		<tr>
    			<td  colspan="4">REFERENCE ID : {{$other->ref}}/{{$other->ref2}}/{{$other->ref3}}</td>
    		</tr>
    		<tr>
    			<td  colspan="2">ITEM : {{$other->title}}</td>
    			<td  colspan="2">COMMITMENT : {{$other->sub}}</td>
			</tr>
			<tr >
    			<td colspan="4">{!!html_entity_decode($other->des)!!}</td>
			</tr>

            <tr>
    			<th colspan="1"><center>APPROVAL AUTHORITY 1</center></th>
    			<th colspan="1"><center>APPROVAL AUTHORITY 2</center></th>
    			<th colspan="1"><center>APPROVAL AUTHORITY 3</center></th>
    			<th colspan="1"><center>APPROVAL AUTHORITY 4</center></th>
			</tr>
			<tr>
				<td height="70">
                    @if($rec === 0)
                    	   <center>NOT APPLICABLE</center>
                    @else
                            <center>{{ $name }} &nbsp;<i class="fa fa-check" style="font-size:20px;color:green"></i></center>
                            <center>{{ $other->rec }} &nbsp;</center>
                            <center>{{ \Carbon\Carbon::parse($other->update1)->format('d/m/Y h:i A')}}</center><center>{{$other->ip1}}</center>
                    @endif
                </td>
                <td height="70">
                    @if($rec1 === 0)
                    	   <center>NOT APPLICABLE</center>
                    @else
                            <center>{{ $name1 }} &nbsp;<i class="fa fa-check" style="font-size:20px;color:green"></i></center>
                            <center>{{ $other->rec1 }} &nbsp;</center>
                            <center>{{ \Carbon\Carbon::parse($other->update2)->format('d/m/Y h:i A')}}</center><center>{{$other->ip2}}</center>
                    @endif
                </td>
                <td height="70">
                    @if($rec2 === 0)
                    	   <center>NOT APPLICABLE</center>
                    @else
                            <center>{{ $name2 }} &nbsp;<i class="fa fa-check" style="font-size:20px;color:green"></i></center>
                            <center>{{ $other->rec2 }} &nbsp;</center>
                            <center>{{ \Carbon\Carbon::parse($other->update3)->format('d/m/Y h:i A')}}</center><center>{{$other->ip3}}</center>
                    @endif
                </td>
                <td height="70">
                    @if($rec3 === 0)
                    	   <center>NOT APPLICABLE</center>
                    @else
                            <center>{{ $name3 }} &nbsp;<i class="fa fa-check" style="font-size:20px;color:green"></i></center>
                            <center>{{ $other->rec3 }} &nbsp;</center>
                            <center>{{ \Carbon\Carbon::parse($other->update4)->format('d/m/Y h:i A')}}</center><center>{{$other->ip4}}</center>
                    @endif
                </td>
			</tr>
    	</tbody>
    </table>
	</div>

</body>
</html>