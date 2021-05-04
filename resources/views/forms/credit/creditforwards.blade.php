@extends('layouts.app')


@section('content')
<div class="container-fluid">
    <div class="container">
     <div class="row"> <a href="{{ url('/')}}/approvals/creditapproval/{{$credit->id}}/" class="btn btn-info">GO BACK</a></div>
 </div><br>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><center><h3>CREDIT APPROVAL FORM</h3></center></div>
                <div class="container">
   
                   <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="forward1" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <div class="col-md-12"><center>
                                <button type="submit" class="btn btn-primary">
                                    APPROVE
                                </button></center>
                            </div>
                         </div>
                        <hr>

                        <div class="form-group{{ $errors->has('ref') ? ' has-error' : '' }}">
                            
                                <label for="ref" class="col-md-4 control-label">REFERENCE ID</label>
                                    <div class="col-md-2">
                                        <input id="ref" class="form-control" name="ref" value="{{ $credit->ref }}" readonly >
                                    </div>

                                    <div class="col-md-2">
                                        <input id="ref2" class="form-control" name="ref2" value="CREDIT" readonly >
                                    </div>

                                    <div class="col-md-2">
                                        <input id="ref3" class="form-control" name="ref3" value={{$credit->ref3}} readonly >
                                    </div>                          
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('gen') ? ' has-error' : '' }}">
                            <label for="gen" class="col-md-4 control-label">GENERATOR</label>

                            <div class="col-md-6">
                                <input id="gen" type="text" class="form-control" name="gen" value="{{  Auth::user()->name }}" readonly required readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">NAME</label>

                            <div class="col-md-6">
                                <input id="title" type="dropdown" class="form-control" name="title" value="{{ $credit->title}}" required readonly autofocus>
                            </div>
                        </div>

                        <hr>
                         <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">ADDRESS</label>

                            <div class="col-md-6">
                                <textarea id="address" type="text" class="form-control" name="address" required  autofocus readonly>{!!html_entity_decode($credit->address)!!}</textarea>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                            <label for="telephone" class="col-md-4 control-label">TELEPHONE NUMBER</label>

                            <div class="col-md-6">
                                <input id="telephone" class="form-control" name="telephone" value="{{ $credit->telephone}}" required readonly autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('constitution') ? ' has-error' : '' }}">
                            <label for="constitution" class="col-md-4 control-label">CONSTITUTION</label>

                            <div class="col-md-6">
                                        <input id="constitution" type="text" class="form-control" name="constitution" value="{{ $credit->constitution}}" required readonly autofocus>
                                    </div> 
                        </div>
                        <hr>

                        

                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year" class="col-md-4 control-label">YEAR OF ESTABLISHMENT</label>

                            <div class="col-md-6">
                                <input id="year" type="text" class="form-control" name="year" value="{{ $credit->year}}" required readonly autofocus>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <center><h3 for="doc1" class="col-md-12">CONTACT PERSON DETAILS</h3></center>
                        </div>
                        <br>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-MAIL ID</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $credit->email}}" required readonly autofocus>
                            </div>
                        </div><br>
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">MOBILE NUMBER</label>

                            <div class="col-md-6">
                                <input id="mobile" type="number" class="form-control" name="mobile" value="{{ $credit->mobile}}" required readonly autofocus>
                            </div>
                        </div><br>
                      
                        <hr>
                        

                        <div class="form-group{{ $errors->has('pan') ? ' has-error' : '' }}">
                            <label for="gst" class="col-md-4 control-label">PAN NUMBER</label>

                            <div class="col-md-6">
                                <input id="pan" type="text" class="form-control" name="pan" value="{{ $credit->pan}}" required readonly autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('cin') ? ' has-error' : '' }}">
                            <label for="cin" class="col-md-4 control-label">CIN NUMBER</label>

                            <div class="col-md-6">
                                <input id="cin" type="text" class="form-control" name="cin" value="{{ $credit->cin}}" required readonly autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('gst') ? ' has-error' : '' }}">
                            <label for="gst" class="col-md-4 control-label">GST NUMBER</label>

                            <div class="col-md-6">
                                <input id="gst" type="text" class="form-control" name="gst" value="{{ $credit->gst}}" required readonly autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">STATE NAME</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state" value="{{ $credit->state}}" required readonly autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('currency') ? ' has-error' : '' }}">
                            <label for="warranty" class="col-md-4 control-label">CURRENCY</label>

                            <div class="col-md-6">
                                <input id="currency" type="number" class="form-control" name="currency" value="{{ $credit->currency}}" required readonly autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <center><h3 for="repname" class="col-md-12">BANK DETAILS</h3></center> 
                        </div><br>

                        <div class="row">
                                <label for="bankname" class="col-md-4 control-label">BANK NAME</label>
                                    <div class="col-md-6">
                                        <input id="bankname" type="text" class="form-control" name="bankname" value="{{ $credit->bankname}}" required readonly autofocus>
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="bankbranch" class="col-md-4 control-label">BRANCH NAME</label>

                            <div class="col-md-6">
                                <input id="bankbranch" type="text" class="form-control" name="bankbranch" value="{{ $credit->bankbranch}}" required readonly autofocus>
                            </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="bankaccno" class="col-md-4 control-label">ACCOUNT NUMBER</label>

                            <div class="col-md-6">
                                <input id="bankaccno" type="number" class="form-control" name="bankaccno" value="{{ $credit->bankaccno}}" required readonly autofocus>
                            </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="bankifsc" class="col-md-4 control-label">IFSC CODE</label>

                            <div class="col-md-6">
                                <input id="bankifsc" class="form-control" name="bankifsc" value="{{ $credit->bankifsc}}" required readonly autofocus>
                            </div>
                        </div>
                        <br><br>

                    
                        <hr>
                        <div class="form-group{{ $errors->has('setup') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">PLANT SETUP DETAILS</label>

                            <div class="col-md-6">
                                <textarea id="address" type="text" class="form-control" name="setup" required readonly autofocus>{{ $credit->setup}}</textarea>
                            </div>

                        </div>

                        <hr>
                        <div class="row">
                            <label for="component" class="col-md-4 control-label">COMPONENT MANUFACTURING</label>
                                    <div class="col-md-6">
                                        <input id="component" type="text" class="form-control" name="component" value="{{ $credit->component}}" required readonly autofocus>
                                    </div>      
                        </div>
                        <hr>

                        <div class="row">
                            <label for="supplied" class="col-md-4 control-label">SUPPLIED TO</label>
                                    <div class="col-md-6">
                                        <input id="supplied" type="text" class="form-control" name="supplied" value="{{ $credit->supplied}}" required readonly autofocus>
                                    </div>  
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('cuttools') ? ' has-error' : '' }}">
                            <label for="cuttools" class="col-md-4 control-label">DEALING WITH CUTTING TOOLS?</label>

                            <div class="col-md-6">
                                        <input id="supplied" type="text" class="form-control" name="supplied" value="{{ $credit->cuttools}}" required readonly autofocus>
                                    </div> 
                                <div class="row">
                            <center><h3 for="repname" class="col-md-12">COMPANY DETAILS</h3></center> 
                        </div><br>

                        <div class="row">
                                <label for="duration" class="col-md-4 control-label">DURATION IN BUSINESS</label>
                                    <div class="col-md-6">
                                        <input id="duration" type="text" class="form-control" name="duration" value="{{ $credit->duration}}" required readonly autofocus>
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="source" class="col-md-4 control-label">SOURCE OF PURCHASE</label>

                            <div class="col-md-6">
                                <input id="source" type="text" class="form-control" name="source" value="{{ $credit->source}}" required readonly autofocus>
                            </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="brands" class="col-md-4 control-label">BRANDS DEALING</label>

                            <div class="col-md-6">
                                <textarea id="brands" type="number" class="form-control" name="brands" required readonly autofocus>{{ $credit->brands}}</textarea>
                            </div>
                        </div>
                        <br>

                        </div>
                            
                        <hr>
                        <div class="row">
                            <center><h3 for="repname" class="col-md-12">SALES REVENUE OF LAST THREE YEARS</h3></center> 
                        </div><br>
                        <div class="row">
                            <label for="sales1" class="col-md-4 control-label">{{\Carbon\Carbon::now()->format('Y')}}</label>
                                    <div class="col-md-6">
                                        <input id="sales1" type="text" class="form-control" name="sales1" value="{{ $credit->sales1}}" required readonly autofocus>
                                    </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <label for="sales2" class="col-md-4 control-label">{{\Carbon\Carbon::now()->format('Y') - 1}}</label>
                                    <div class="col-md-6">
                                        <input id="sales2" type="text" class="form-control" name="sales2" value="{{ $credit->sales2}}" required readonly autofocus>
                                    </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <label for="sales3" class="col-md-4 control-label">{{\Carbon\Carbon::now()->format('Y') - 2}}</label>
                                    <div class="col-md-6">
                                        <input id="sales3" type="text" class="form-control" name="sales3" value="{{ $credit->sales3}}" required readonly autofocus>
                                    </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <label for="employees" class="col-md-4 control-label">NO OF EMPLOYEES</label>
                                    <div class="col-md-6">
                                        <input id="employees" type="text" class="form-control" name="employees" value="{{ $credit->employees}}" required readonly autofocus>
                                    </div>
                        </div>
                        <hr>
                        <div class="row">
                            <label for="transaction" class="col-md-4 control-label">NATURE OF TRANSACTION, IF ANY, WITH ANY OF THE AMALGAMATIONS GROUP WITH TERMS OF PAYMENT</label>
                                    <div class="col-md-6">
                                        <textarea id="transaction" type="text" class="form-control" name="transaction" required readonly autofocus>{{ $credit->transaction}}</textarea>
                                    </div>
                        </div>
                        <hr>

                        <div class="row">
                            <label for="annual" class="col-md-4 control-label">ESTIMATED ANNUAL OFFTAKE</label>
                                    <div class="col-md-6">
                                        <input id="annual" type="text" class="form-control" name="annual" value="{{ $credit->annual}}" required readonly autofocus>
                                    </div>      
                        </div>
                        <hr>

                        <div class="row">
                            <label for="payment" class="col-md-4 control-label">PAYMENT TERMS RECOMMENDED FOR CONSIDERATION</label>
                                    <div class="col-md-6">
                                        <textarea id="payment" type="text" class="form-control" name="payment" required readonly autofocus>{{ $credit->payment}}
                                    </textarea></div>  
                        </div>
                        <hr>
                        
                       <div class="row">
                            <label for="justify" class="col-md-4 control-label">JUSTIFICATION, IF CREDIT IS RECOMMENDED</label>
                                    <div class="col-md-6">
                                        <textarea id="justify" type="text" class="form-control" name="justify" required readonly autofocus>{{ $credit->justify}}
                                  </textarea>  </div>
                        </div>
                        <hr>

                         <div class="row">
                            <label for="remarks" class="col-md-4 control-label">REMARKS, IF ANY</label>
                                    <div class="col-md-6">
                                        <textarea id="remarks" type="text" class="form-control" name="remarks" required readonly autofocus>{{ $credit->remarks}}
                                  </textarea>  </div>
                        </div>
                        <hr>
                        
                            
                        </form>
                    </div>
                
        </div>
        </div>
        </div>
    </div>
@endsection
