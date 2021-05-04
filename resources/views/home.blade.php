@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><center><h3>WELCOME {{Auth::user()->name}}</h3></center></div>
                <div class=" user">
                   <table class="table table-borderless">
                        <tbody>
                        <tr><td class="text-right">ROLL NUMBER</td><td>{{Auth::user()->roll}}</td></tr>
                        <tr><td class="text-right">NAME</td><td>{{Auth::user()->name}}</td></tr>
                        <tr><td class="text-right">MANAGER</td><td>{{$off1}} - ({{Auth::user()->manager}})</td></tr>
                        
                        <tr><td class="text-right">SUPERVISOR</td><td>{{$off3}} -({{Auth::user()->supervisor}})</td></tr>
                        <tr><td class="text-right">PLANTHEAD</td><td>{{$off4}} - ({{Auth::user()->planthead}})</td></tr>
                        <tr><td class="text-right">WTD</td><td>{{$off5}} - ({{Auth::user()->vpo}})</td></tr>
                        <tr><td class="text-right">EVP & CFO</td><td>{{$off6}} - ({{Auth::user()->vpca}})</td></tr>
                        <tr><td class="text-right">DIRECTOR</td><td>{{$off7}} - ({{Auth::user()->director}})</td></tr>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>

 
</div>
@endsection
