@extends('layouts.app')

@section('content')
<div class="container">
	
    <div class="row">
        <center>
        <H4><a href="{{ url('/') }}/status/"><u>STATUS</u>   </a><span class="fa fa-arrow-right"></span></H4>
        </center>
    </div>
</div>

<div class="container-fluid">
     @include('statusside')
</div>

@endsection
