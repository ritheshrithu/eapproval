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
  <br>
    <hr>
    <br>
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
      </tbody>
    </table>
  </div>

</body>
</html>