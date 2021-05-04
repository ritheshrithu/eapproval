@extends('layouts.app')

@section('content')
<div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{url('/')}}/approvals/vendorapproval/" class="btn btn-info">GO BACK</a>
                       
                    </div>     
        <div class="col-md-8">
            
            <H4><a href="{{ url('/') }}/oldapprovals/">GENERATED APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/oldapprovals/vendorapproval">VENDOR APPROVAL    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/oldapprovals/vendorapproval/{{$vendor->id}}"> VENDOR DETAILS    </a></H4>
            
        </div>
    </div>
            </div><br><br>

            <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">      
               <div class="panel-heading"><center><h3> {{$vendor->title}}</h3></center></div>
                   <div class="panel-body">
                        <div class="row">
                            <label for="ref" class="col-md-5 control-label text-right">REFERENCE ID</label>
                                    <div class="col-md-3">
                                        {{$vendor->ref}}/{{$vendor->ref2}}/{{$vendor->ref3}}
                                    </div>                          
                        </div>
                        <hr>
                       
                        <div class="row">
                            <label for="gen" class="col-md-5 control-label text-right">SENDER</label>

                            <div class="col-md-3">
                                {{$vendor->sen}} - {{$user}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <label for="title" class="col-md-5 control-label text-right">NAME</label>

                            <div class="col-md-3">
                                {{$vendor->name}}
                            </div>
                        </div>

                        <hr>
                         <div class="row">
                            <label for="des" class="col-md-5 control-label text-right">DESCRIPTION</label>

                            <div class="col-md-3">
                                {!!html_entity_decode($vendor->des)!!}
                            </div>
                        </div>

                        <hr>
                        
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <center>  
                @if($vendor->sen !== $vendor->ref)
                
                <a href="{{url('/')}}/createapproval/vendorapproval/{{$vendor->id}}/newv" class="btn btn-success">CORRECT AND SEND</a>
                @endif
            </center>
        @endsection