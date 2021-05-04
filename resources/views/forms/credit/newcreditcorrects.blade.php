@extends('layouts.app')
@section('content')
<div class="container">
     <div class="row">
        <div class="col-md-3">
            <a href="{{ url('/') }}/approvals/creditapproval/" class="btn btn-info">BACK</a>
        </div>     
        <div class="col-md-8">
            <H4><a href="{{ url('/') }}/oldapprovals/">APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/oldapprovals/creditapproval">CREDIT APPROVAL    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/creditapproval/capexapproval/new1">NEW CREDIT APPROVAL    </a></H4>
        </div>
    </div>
    </div><br>
       <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><center><h3>CREDIT APPROVAL FORM</h3></center></div>
                <div class="container">
   
                   <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="newe" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('ref') ? ' has-error' : '' }}">
                            
                                <label for="ref" class="col-md-4 control-label">REFERENCE ID</label>
                                    <div class="col-md-3">
                                        <input id="ref" class="form-control" name="ref" value="{{ $credit->ref }}" readonly >
                                    </div>

                                    <div class="col-md-3">
                                        <input id="ref2" class="form-control" name="ref2" value="CREDIT" readonly >
                                    </div>                          
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('gen') ? ' has-error' : '' }}">
                            <label for="gen" class="col-md-4 control-label">GENERATOR</label>

                            <div class="col-md-6">
                                <input id="gen" type="text" class="form-control" name="gen" value="{{  $credit->gen }}" readonly required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">NAME</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $credit->title}}" required autofocus>
                            </div>
                        </div>

                        <hr>
                         <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">ADDRESS</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor" type="text" class="form-control" name="address" value="" required autofocus>{{ $credit->address}}</textarea>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                            <label for="telephone" class="col-md-4 control-label">TELEPHONE NUMBER</label>

                            <div class="col-md-6">
                                <input id="telephone" class="form-control" name="telephone" value="{{ $credit->telephone}}" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('constitution') ? ' has-error' : '' }}">
                            <label for="constitution" class="col-md-4 control-label">CONSTITUTION</label>
                                <div class="col-md-6">
                                <input id="constitution" class="form-control" name="constitution" value="{{ $credit->constitution}}" required autofocus>
                            </div>
                        </div>
                        <hr>

                        

                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year" class="col-md-4 control-label">YEAR OF ESTABLISHMENT</label>

                            <div class="col-md-6">
                                <input id="year" type="text" class="form-control" name="year" value="{{ $credit->year}}" required autofocus>
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
                                <input id="email" type="email" class="form-control" name="email" value="{{ $credit->email}}" required autofocus>
                            </div>
                        </div><br>
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">MOBILE NUMBER</label>

                            <div class="col-md-6">
                                <input id="mobile" type="number" class="form-control" name="mobile" value="{{ $credit->mobile}}" required autofocus>
                            </div>
                        </div><br>
                      
                        <hr>
                        <div class="row">
                            <center><h3 for="doc1" class="col-md-12">REQUIRED DOCUMENTS</h3></center>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group{{ $errors->has('doc1') ? ' has-error' : '' }}">
                                <div class="col-md-4">
                                    <input id="doc1" type="file" class="form-control" name="doc1" value="{{ $credit->doc1}}" autofocus>
                                </div>
                            
                                <div class="col-md-4">
                                    <input id="doc2" type="file" class="form-control" name="doc2" value="{{ $credit->doc2}}" autofocus>
                                </div>
                           
                                <div class="col-md-4">
                                    <input id="doc3" type="file" class="form-control" name="doc3" value="{{ $credit->doc3}}" autofocus>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('pan') ? ' has-error' : '' }}">
                            <label for="gst" class="col-md-4 control-label">PAN NUMBER</label>

                            <div class="col-md-6">
                                <input id="pan" type="text" class="form-control" name="pan" value="{{ $credit->pan}}" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('cin') ? ' has-error' : '' }}">
                            <label for="cin" class="col-md-4 control-label">CIN NUMBER</label>

                            <div class="col-md-6">
                                <input id="cin" type="text" class="form-control" name="cin" value="{{ $credit->cin}}" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('gst') ? ' has-error' : '' }}">
                            <label for="gst" class="col-md-4 control-label">GST NUMBER</label>

                            <div class="col-md-6">
                                <input id="gst" type="text" class="form-control" name="gst" value="{{ $credit->gst}}" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">STATE NAME</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state" value="{{ $credit->state}}" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('currency') ? ' has-error' : '' }}">
                            <label for="warranty" class="col-md-4 control-label">CURRENCY</label>

                            <div class="col-md-6">
                                <input id="currency" type="number" class="form-control" name="currency" value="{{ $credit->state}}" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <center><h3 for="repname" class="col-md-12">BANK DETAILS</h3></center> 
                        </div><br>

                        <div class="row">
                                <label for="bankname" class="col-md-4 control-label">BANK NAME</label>
                                    <div class="col-md-6">
                                        <input id="bankname" type="text" class="form-control" name="bankname" value="{{ $credit->bankname}}" required autofocus>
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="bankbranch" class="col-md-4 control-label">BRANCH NAME</label>

                            <div class="col-md-6">
                                <input id="bankbranch" type="text" class="form-control" name="bankbranch" value="{{ $credit->bankbranch}}" required autofocus>
                            </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="bankaccno" class="col-md-4 control-label">ACCOUNT NUMBER</label>

                            <div class="col-md-6">
                                <input id="bankaccno" type="number" class="form-control" name="bankaccno" value="{{ $credit->bankaccno}}" required autofocus>
                            </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="bankifsc" class="col-md-4 control-label">IFSC CODE</label>

                            <div class="col-md-6">
                                <input id="bankifsc" class="form-control" name="bankifsc" value="{{ $credit->bankifsc}}" required autofocus>
                            </div>
                        </div>
                        <br><br>

                    
                        <hr>
                        <div class="form-group{{ $errors->has('setup') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">PLANT SETUP DETAILS</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor1" type="text" class="form-control" name="setup" value="" required autofocus>{{ $credit->setup}}</textarea>
                            </div>

                        </div>

                        <hr>
                        <div class="row">
                            <label for="component" class="col-md-4 control-label">COMPONENT MANUFACTURING</label>
                                    <div class="col-md-6">
                                        <input id="component" type="text" class="form-control" name="component" value="{{ $credit->component}}" required autofocus>
                                    </div>      
                        </div>
                        <hr>

                        <div class="row">
                            <label for="supplied" class="col-md-4 control-label">SUPPLIED TO</label>
                                    <div class="col-md-6">
                                        <input id="supplied" type="text" class="form-control" name="supplied" value="{{ $credit->supplied}}" required autofocus>
                                    </div>  
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('cuttools') ? ' has-error' : '' }}">
                            <label for="cuttools" class="col-md-4 control-label">DEALING WITH CUTTING TOOLS?</label>

                            <div class="col-md-6">
                                        <input id="cuttools" type="text" class="form-control" name="cuttools" value="{{ $credit->cuttools}}" required>
                                    </div> 
                                </div>
                        <br><br>

                        <div class="row">
                                <label for="duration" class="col-md-4 control-label">DURATION IN BUSINESS</label>
                                    <div class="col-md-6">
                                        <input id="duration" type="text" class="form-control" name="duration" value="{{ $credit->duration}}">
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="source" class="col-md-4 control-label">SOURCE OF PURCHASE</label>
                            <div class="col-md-6">
                                <input id="source" type="text" class="form-control" name="source" value="{{ $credit->source}}">
                            </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="brands" class="col-md-4 control-label">BRANDS DEALING</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor2" type="number" class="form-control" name="brands" value="">{{ $credit->brands}}</textarea>
                            </div>
                        </div>
                        <br>

                        
                            
                        <hr>
                        
                        
                        <div class="row">
                            <center><h3 for="repname" class="col-md-12">SALES REVENUE OF LAST THREE YEARS</h3></center> 
                        </div><br>
                        <div class="row">
                            <label for="sales1" class="col-md-4 control-label">{{\Carbon\Carbon::now()->format('Y')}}</label>
                                    <div class="col-md-6">
                                        <input id="sales1" type="text" class="form-control" name="sales1" value="{{ $credit->sales1}}" required autofocus>
                                    </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <label for="sales2" class="col-md-4 control-label">{{\Carbon\Carbon::now()->format('Y') - 1}}</label>
                                    <div class="col-md-6">
                                        <input id="sales2" type="text" class="form-control" name="sales2" value="{{ $credit->sales2}}" required autofocus>
                                    </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <label for="sales3" class="col-md-4 control-label">{{\Carbon\Carbon::now()->format('Y') - 2}}</label>
                                    <div class="col-md-6">
                                        <input id="sales3" type="text" class="form-control" name="sales3" value="{{ $credit->sales3}}" required autofocus>
                                    </div>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <label for="employees" class="col-md-4 control-label">NO OF EMPLOYEES</label>
                                    <div class="col-md-6">
                                        <input id="employees" type="text" class="form-control" name="employees" value="{{ $credit->employees}}" required autofocus>
                                    </div>
                        </div>
                        <hr>
                        <div class="row">
                            <label for="transaction" class="col-md-4 control-label">NATURE OF TRANSACTION, IF ANY, WITH ANY OF THE AMALGAMATIONS GROUP WITH TERMS OF PAYMENT</label>
                                    <div class="col-md-6">
                                        <textarea id="ckeditor3" type="text" class="form-control" name="transaction" value="" required autofocus>{{ $credit->transaction}}</textarea>
                                    </div>
                        </div>
                        <hr>

                        <div class="row">
                            <label for="annual" class="col-md-4 control-label">ESTIMATED ANNUAL OFFTAKE</label>
                                    <div class="col-md-6">
                                        <input id="annual" type="text" class="form-control" name="annual" value="{{ $credit->annual}}" required autofocus>
                                    </div>      
                        </div>
                        <hr>

                        <div class="row">
                            <label for="payment" class="col-md-4 control-label">PAYMENT TERMS RECOMMENDED FOR CONSIDERATION</label>
                                    <div class="col-md-6">
                                        <textarea id="ckeditor4" type="text" class="form-control" name="payment" value="" required autofocus>{{ $credit->payment}}
                                    </textarea></div>  
                        </div>
                        <hr>
                        
                       <div class="row">
                            <label for="justify" class="col-md-4 control-label">JUSTIFICATION, IF CREDIT IS RECOMMENDED</label>
                                    <div class="col-md-6">
                                        <textarea id="ckeditor5" type="text" class="form-control" name="justify" value="" required autofocus>{{ $credit->justify}}
                                  </textarea>  </div>
                        </div>
                        <hr>

                         <div class="row">
                            <label for="remarks" class="col-md-4 control-label">REMARKS, IF ANY</label>
                                    <div class="col-md-6">
                                        <textarea id="ckeditor6" type="text" class="form-control" name="remarks" value="" required autofocus>{{ $credit->remarks}}
                                  </textarea>  </div>
                        </div>
                        <hr>
                        
                       
                    <div class="form-group{{ $errors->has('receiver') ? ' has-error' : '' }}">
                            <label for="rec" class="col-md-4 control-label">APPROVING AUTHORITY 1</label>
                            <div class="col-md-6">
                               
                             <input id="rec" type="text" class="form-control" name="rec" value="{{ $credit->rec}}" required autofocus>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('receiver') ? ' has-error' : '' }}">
                            <label for="rec1" class="col-md-4 control-label">APPROVING AUTHORITY 2</label>
                            <div class="col-md-6">
                               
                             <input id="rec1" type="text" class="form-control" name="rec1" value="{{ $credit->rec1}}" required autofocus>
                            </div>
                            
                        </div><hr>
                        <div class="form-group{{ $errors->has('receiver') ? ' has-error' : '' }}">
                            <label for="rec2" class="col-md-4 control-label">APPROVING AUTHORITY 3</label>
                            <div class="col-md-6">
                               
                             <input id="rec2" type="text" class="form-control" name="rec2" value="{{ $credit->rec2}}" required autofocus>
                           </div>
                        </div><hr>

                        <div class="form-group{{ $errors->has('receiver') ? ' has-error' : '' }}">
                            <label for="rec3" class="col-md-4 control-label">APPROVING AUTHORITY 4</label>
                            <div class="col-md-6">
                             <input id="rec3" type="text" class="form-control" name="rec3" value="{{ $credit->rec3}}" required autofocus>
                            </div>
                        </div>
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