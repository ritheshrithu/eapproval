<html>
<head>
    <title>{{$approvals->title}}</title>
   
</head>
  <div class="container" id="pdf"> 
        <div class="row">
            <div class="col-md-2" id="logo">
               <center> <img src="storage/addison.jpg" width="120px" height="70px"></center>
            </div>
            
        </div>
         <br>
    
        <hr>
        <br>
        <div class="row">
        <div class="col-md-6" id="ref">
               <B>REFERENCE ID :</B>{{$approvals->ref}}/{{$approvals->ref2}}/{{$approvals->ref3}}
        </div>

        <div class="col-md-6" id="gen">
               <B>GENERATOR :</B>{{$approvals->gen}}
        </div>
        </div>
        <br>
 
        <div class="row">
            <div class="col-md-6" id="title">
               <h1><center>{{$approvals->title}}</center></h1>
            </div>

            <div class="col-md-6" id="sub">
               <B>SUBJECT :</B>{{$approvals->sub}}
            </div>
        </div>
        <br>
        <br>

        <div class="row">
            <div class="col-md-12" id="des">
               <B>DATE CREATED:</B>{{ \Carbon\Carbon::parse($approvals->created_at)->format('d/m/Y h:i A')}}
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="col-md-8">
                 
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
                                          <center>{{ \Carbon\Carbon::parse($approvals->update3)->format('d/m/Y h:i A')}}</center><center>{{$approvals->ip3}}</center>
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
</div>
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
            border: 2px solid black;
            border-style: double;
            height:910px;
            padding: 5px 5px 5px 5px;
        }
        table 
        {
            border-collapse: collapse;
        }       

        table, th, td 
        {
            border: 1px solid black;
        }
        #gen
        {
            float: right;
        }
        #text
        {
            float: right;
            margin-top: 2px;
        }
        #logo
        {
            margin-top: 30px;
        }
        #ref
        {
            float: left;
        }
        #des
        {
            float:left;
        }
    </style>

</body>
</html>
