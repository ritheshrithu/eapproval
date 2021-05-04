@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <center>
        <H4><a href="{{ url('/') }}/approvals/">RECEIVED APPROVALS   </a><span class="fa fa-arrow-right"></span></H4>
        </center>
    </div>
</div>
    <div class="container-fluid">
        <div class="col-md-2">
	<div class="panel panel-inverse panel-flush">
		<div class="panel-heading">
			<center><h3>MENU</h3></center>
		</div>

		<div class="panel-body">
			<ul class="nav" role="tablist">
				<li role="presentation">
					<a href="{{ url('/approvals/capexapproval') }}">
						CAPEX
						@if($note1>0)
                                <span class="badge badge-warning">
                                    {{$note1}}
                                </span>
                            @endif
                    </a>
                </li>
			

				<li role="presentation">
					<a href="{{ url('/approvals/creditapproval') }}">
						CUSTOMER
						@if($note2>0)
                                <span class="badge badge-warning">
                                    {{$note2}}
                                </span>
                            @endif
                    </a>
                </li>

				<li role="presentation">
					<a href="{{ url('/approvals/vendorapproval') }}">
						VENDOR
						@if($note3>0)
                                <span class="badge badge-warning">
                                    {{$note3}}
                                </span>
                            @endif
                    </a>
                </li>

				<li role="presentation">
					<a href="{{ url('/approvals/dealerapproval') }}">
						DEALER
						@if($note4>0)
                                <span class="badge badge-warning">
                                    {{$note4}}
                                </span>
                            @endif
                    </a>
                </li>

				<li role="presentation">
					<a href="{{ url('/approvals/otherapproval') }}">
						OTHERS
						@if($note5>0)
                                <span class="badge badge-warning">
                                    {{$note5}}
                                </span>
                            @endif
                    </a>
                </li>
			</ul>
		</div>
	</div>
</div>
    </div>
@endsection