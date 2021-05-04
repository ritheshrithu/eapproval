@extends('layouts.app')

@section('content')
<div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{url('/')}}/approvals/dealerapproval/" class="btn btn-info">GO BACK</a>
                       
                    </div>     
        <div class="col-md-8">
            
            <H4><a href="{{ url('/') }}/oldapprovals/">GENERATED APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/oldapprovals/dealerapproval">DEALER APPROVAL    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/oldapprovals/dealerapproval/{{$dealer->id}}"> DEALER DETAILS    </a></H4>
            
        </div>
    </div>
            </div><br><br>

            <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">      
               <div class="panel-heading"><center><h3> {{$dealer->title}}</h3></center></div>
                   <div class="panel-body">
                        <div class="row">
                            <label for="ref" class="col-md-5 control-label text-right">REFERENCE ID</label>
                                    <div class="col-md-3">
                                        {{$dealer->ref}}/{{$dealer->ref2}}/{{$dealer->ref3}}
                                    </div>                          
                        </div>
                        <hr>
                       
                        <div class="row">
                            <label for="gen" class="col-md-5 control-label text-right">SENDER</label>

                            <div class="col-md-3">
                                {{$dealer->sen}} - {{$user}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <label for="title" class="col-md-5 control-label text-right">NAME</label>

                            <div class="col-md-3">
                                {{$dealer->name}}
                            </div>
                        </div>

                        <hr>
                         <div class="row">
                            <label for="des" class="col-md-5 control-label text-right">DESCRIPTION</label>

                            <div class="col-md-3">
                                {!!html_entity_decode($dealer->des)!!}
                            </div>
                        </div>

                        <hr>
                        
                        <center>  
                @if($dealer->sen !== $dealer->ref)
                
                <a href="{{url('/')}}/createapproval/dealerapproval/{{$dealer->id}}/newd" class="btn btn-success">CORRECT AND SEND</a>
                @endif
            </center>
                    </div>
                </div>
            </div>
        </div>
        @endsection