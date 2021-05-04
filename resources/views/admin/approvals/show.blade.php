@extends('layouts.app')

@section('content')
	<div class="container">
		
    <div class="row"> <a href="{{url('/')}}/admin/forwards" class="btn btn-info">BACK</a>
    <a href="{{url('/')}}/final/{{$approvals->id}}" class="btn btn-info" target="_blank">PDF</a></div>
      <br>
       @include('admin.sidebar')
       <div class="col-md-9">
            <div class="panel panel-default"> 	   
               <div class="panel-heading"><center><h4> {{$approvals->title}}</h4></center></div>
					<div class="panel-body">
                        <div class="form-group">
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
                            <label for="title" class="col-md-4 control-label">DESCRIPTION</label>
                                <div class="col-md-6">{{$approvals->des}}
                                
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
                            <label for="title" class="col-md-4 control-label">RECEIVER</label>
                                <div class="col-md-6">{{$approvals->rec}} </div>
                        </div>                     
                    </div>

				</div>
                @if($approvals->rec === Auth::user()->roll && $approvals->ref !== Auth::user()->roll)
                <div class="row">
                    <div class="col-md-6">
                        <center>
                        <a href="{{url('/')}}/resend/{{$approvals->id}}" class="btn btn-danger">RESEND</a>
                        </center>
                    </div>
                    <div class="col-md-6">
                        <center>   
                            <a href="{{url('/')}}/forward/{{$approvals->id}}" class="btn btn-success">FORWARD</a>    
                        </center>
                    </div>
                </div>
                @endif
            </div>
        </div>
@endsection