@extends('layouts.app')

@section('content')
	<div class="container">
<div class="row"> <a href="{{url('/')}}/admin/approvals" class="btn btn-info">BACK</a>
    <a href="{{url('/')}}/pdf/{{$approvals->id}}" class="btn btn-info" target="_blank">PDF</a></div><br>
		 @include('admin.sidebar')
   
       <div class="col-md-9">
            <div class="panel panel-default"> 	   
               <div class="panel-heading"><center><h4> {{$approvals->title}}</h4></center></div>
					<div class="panel-body">     
                        <div class="form-group"><br>
                            <label for="title" class="col-md-4 control-label">SENDER</label>
                                <div class="col-md-6">{{$approvals->sen}}
                                    
                                </div>
                        </div>
                        
                        <br>


                        <div class="form-group">
                            <label for="gen" class="col-md-4 control-label">GENERATOR</label>
                                <div class="col-md-6">{{$approvals->gen}}
                                    
                                </div>
                        </div>
                        <br>
						<div class="form-group">
                        	<label for="title" class="col-md-4 control-label">REFERENCE ID</label>
								<div class="col-md-6">{{$approvals->ref}}/{{$approvals->ref2}}/{{$approvals->ref3}}
                                	
                            	</div>
                    	</div>
                    	<br>
	               		<div class="form-group">
                        	<label for="title" class="col-md-4 control-label">TITLE</label>
								<div class="col-md-6">{{$approvals->title}}
                                	
                            	</div>
                    	</div>
                    	<br>
                    	<div class="form-group">
                        	<label for="title" class="col-md-4 control-label">SUBJECT</label>
								<div class="col-md-6">{{$approvals->sub}}
                                	
                            	</div>
                    	</div>
                    	<br>
                    	<div class="form-group">
                        	<label for="title" class="col-md-4 control-label">MAIN DOCUMENTS</label>
								<div class="col-md-6">
                                <a href="{{ url('/') }}/storage/docs/{{$approvals->md}}" target="_blank">{{$approvals->md}}</a>
                              
                    	</div>
                    	</div>
                    	<br>
                    	<div class="form-group">
                        	<label for="title" class="col-md-4 control-label">SUPPORTING DOCUMENTS</label>
								<div class="col-md-6">
                                <a href="{{ url('/') }}/storage/docs/{{$approvals->sd}}" target="_blank">{{$approvals->sd}}</a>
                                </div>
                    	</div>
                        <br>
                         <div class="form-group">
                            <label for="title" class="col-md-4 control-label">RECEIVER 1</label>
                                <div class="col-md-6">{{$approvals->rec}} </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">RECEIVER 2</label>
                                <div class="col-md-6">{{$approvals->rec1}} </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">RECEIVER 3</label>
                                <div class="col-md-6">{{$approvals->rec2}} </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">RECEIVER 4</label>
                                <div class="col-md-6">{{$approvals->rec3}} </div>
                        </div>
                        <br>
                        <br>
                       
                    </div>

				</div>
                 
            </div>
        </div>
@endsection