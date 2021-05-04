@extends('layouts.app')
@section('content')
<div class="container">
     <div class="row">
        <div class="col-md-3">
            <a href="{{ url('/') }}/approvals/dealerapproval/" class="btn btn-info">BACK</a>
        </div>     
        <div class="col-md-8">
            <H4><a href="{{ url('/') }}/oldapprovals/">APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/oldapprovals/dealerapproval">DEALER ENROLMENT    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/createapproval/dealerapproval/newd">NEW DEALER ENROLMENT    </a></H4>
        </div>
    </div>
    </div><br>
       <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><center><h3>DEALER ENROLMENT FORM</h3></center></div>
                <div class="container">
   
                   <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="resend4" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('ref') ? ' has-error' : '' }}">
                            
                                <label for="ref" class="col-md-4 control-label">REFERENCE ID</label>
                                    <div class="col-md-2">
                                        <input id="ref" class="form-control" name="ref" value="{{$dealer->ref}}" readonly >
                                    </div>

                                    <div class="col-md-2">
                                        <input id="ref2" class="form-control" name="ref2" value="DEALER" readonly >
                                    </div> 

                                    <div class="col-md-2">
                                        <input id="ref3" class="form-control" name="ref3" value="{{$dealer->ref3}}" readonly >
                                    </div>                          
                        </div>
                        <hr>
                        
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">DESCRIPTION</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor" type="text" class="form-control" name="des" value="" required autofocus ></textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">NAME OF DEALER</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $dealer->name}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">FULL POSTAL ADDRESS WITH LANDLINE & MOBILE NUMBER</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor" type="text" class="form-control" name="address" value="" required autofocus readonly>{{ $dealer->address}}</textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">EMAIL ID</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $dealer->email}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('pan') ? ' has-error' : '' }}">
                            <label for="pan" class="col-md-4 control-label">PAN</label>

                            <div class="col-md-6">
                                <input id="pan" type="pan" class="form-control" name="pan" value="{{ $dealer->pan}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('constitution') ? ' has-error' : '' }}">
                            <label for="class" class="col-md-4 control-label">CONSTITUTION (PLEASE SELECT ONE)</label>

                            <div class="col-md-6">
                               <input id="constitution" type="text" class="form-control" name="constitution" value="{{ $dealer->constitution}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('handler') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">NAME OF THE PROPRIETOR / PARTNER – WHO WILL BE DIRECTLY HANDLING OUR PRODUCTS</label>

                            <div class="col-md-6">
                                <input id="handler" type="text" class="form-control" name="handler" value="{{ $dealer->handler}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year" class="col-md-4 control-label">YEAR OF ESTABLISHMENT</label>

                            <div class="col-md-6">
                                <input id="year" type="number" class="form-control" name="year" value="{{ $dealer->year}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('gst') ? ' has-error' : '' }}">
                            <label for="gst" class="col-md-4 control-label">GST NO</label>

                            <div class="col-md-6">
                                <input id="gst" type="text" class="form-control" name="gst" value="{{ $dealer->gst}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">STATE NAME</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state" value="{{ $dealer->state}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('dealerbank') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">NAME OF DEALER’S BANKER / POSTAL ADDRESS</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor1" type="text" class="form-control" name="dealerbank" value="" required autofocus readonly>{{ $dealer->dealerbank}}</textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('authdealer') ? ' has-error' : '' }}">
                            <label for="authdealer" class="col-md-4 control-label">SPECIFY DETAILS, IN CASE OF AUTHORIZED DEALER FOR ANY OTHER PRODUCTS</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor2" type="text" class="form-control" name="authdealer" value="" required autofocus readonly>{{ $dealer->authdealer}}</textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('authdirect') ? ' has-error' : '' }}">
                            <label for="authdirect" class="col-md-4 control-label">IF SO, WHETHER DEALING DIRECT OR THROUGH ANY OTHER SOURCE</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor3" type="text" class="form-control" name="authdirect" value="" required autofocus readonly>{{ $dealer->authdirect}}</textarea>
                            </div>
                        </div>
                        <hr>

                         <div class="form-group{{ $errors->has('selling') ? ' has-error' : '' }}">
                            <label for="class" class="col-md-4 control-label">MAINLY SELLING TO</label>

                            <div class="col-md-6">
                                <input id="selling" type="text" class="form-control" name="selling" value="{{ $dealer->selling}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('cutting') ? ' has-error' : '' }}">
                            <label for="cutting" class="col-md-4 control-label">IF ALREADY DEALING WITH CUTTING TOOLS, HOW LONG AND SOURCE OF PURCHASE AND BRAND IN WHICH DEALING, INDICATING APPROXIMATE ANNUAL OFF TAKE IF POSSIBLE</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor4" type="text" class="form-control" name="cutting" value="" required autofocus readonly>{{ $dealer->cutting}}</textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
                            <label for="reason" class="col-md-4 control-label">REASONS FOR TAKING ADDISON DEALERSHIP</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor5" type="text" class="form-control" name="reason" value="" required autofocus readonly>{{ $dealer->reason}}</textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <center><h3 for="repname" class="col-md-12">ESTIMATED NETT TAKE PER YEAR FOR FIRST 3 YEARS</h3></center> 
                        </div><br>
                        <div class="row">
                            <label for="nettake1" class="col-md-4 control-label">I</label>
                                    <div class="col-md-6">
                                        <input id="nettake1" type="text" class="form-control" name="nettake1" value="{{ $dealer->nettake1}}" required autofocus readonly>
                                    </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <label for="snettake" class="col-md-4 control-label">II</label>
                                    <div class="col-md-6">
                                        <input id="nettake2" type="text" class="form-control" name="nettake2" value="{{ $dealer->nettake2}}" required autofocus readonly>
                                    </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <label for="nettake3" class="col-md-4 control-label">III</label>
                                    <div class="col-md-6">
                                        <input id="sales3" type="text" class="form-control" name="nettake3" value="{{ $dealer->nettake3}}" required autofocus readonly>
                                    </div>
                        </div>
                        <br>
                        <hr>

                        <div class="form-group{{ $errors->has('paymentterms') ? ' has-error' : '' }}">
                            <label for="paymentterms" class="col-md-4 control-label">PAYMENT TERMS RECOMMENDED AND JUSTIFICATION IF CREDIT RECOMMENDED </label>

                            <div class="col-md-6">
                                <textarea id="ckeditor6" type="text" class="form-control" name="paymentterms" value="" required autofocus readonly>{{ $dealer->paymentterms}}</textarea>
                            </div>
                        </div>
                        <hr>


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        SEND
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                
        </div>
</div>
</div>
</div>

@endsection