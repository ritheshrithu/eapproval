@extends('layouts.app')
@section('content')
<div class="container">
     <div class="row">
        <div class="col-md-3">
            <a href="{{ url('/') }}/approvals/vendorapproval/{{ $vendor->id}}" class="btn btn-info">BACK</a>
        </div>     
        <div class="col-md-8">
            <H4><a href="{{ url('/') }}/oldapprovals/">APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/oldapprovals/vendorapproval">VENDOR APPROVAL    </a><span class="fa fa-arrow-right"></span>
            <a href="{{ url('/') }}/createapproval/vendorapproval/new">NEW VENDOR APPROVAL    </a></H4>
        </div>
    </div>
    </div><br>
       <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><center><h3>VENDOR APPROVAL FORM</h3></center></div>
                <div class="container">
   
                   <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="forward2" enctype="multipart/form-data">
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
                                        <input id="ref" class="form-control" name="ref" value="{{ $vendor->ref}}" readonly >
                                    </div>

                                    <div class="col-md-2">
                                        <input id="ref2" class="form-control" name="ref2" value="VENDOR" readonly >
                                    </div>  

                                    <div class="col-md-2">
                                        <input id="ref3" class="form-control" name="ref3" value="{{ $vendor->ref3}}" readonly >
                                    </div>                          
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('gen') ? ' has-error' : '' }}">
                            <label for="gen" class="col-md-4 control-label">GENERATOR</label>

                            <div class="col-md-6">
                                <input id="gen" type="text" class="form-control" name="gen" value="{{$vendor->gen}}" readonly required readonly>
                            </div>
                        </div>
                        <hr>
                        
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">LOCATION</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ $vendor->location}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('vendorcode') ? ' has-error' : '' }}">
                            <label for="vendorcode" class="col-md-4 control-label">VENDOR CODE</label>

                            <div class="col-md-6">
                                <input id="vendorcode" type="text" class="form-control" name="vendorcode" value="{{ $vendor->vendorcode}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('paymentterms') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">PAYMENT TERMS</label>

                            <div class="col-md-6">
                                <input id="paymentterms" type="text" class="form-control" name="paymentterms"       value="{{ $vendor->paymentterms}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('currency') ? ' has-error' : '' }}">
                            <label for="currency" class="col-md-4 control-label">CURRENCY</label>

                            <div class="col-md-6">
                                <input id="currency" type="text" class="form-control" name="currency" value="{{ $vendor->currency}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group{{ $errors->has('paymentmode') ? ' has-error' : '' }}">
                            <label for="paymentmode" class="col-md-4 control-label">PAYMENT MODE</label>

                            <div class="col-md-6">
                                <input id="paymentmode" type="text" class="form-control" name="paymentmode" value="{{ $vendor->paymentmode}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('class') ? ' has-error' : '' }}">
                            <label for="class" class="col-md-4 control-label">CLASS</label>

                            <div class="col-md-6">
                                <input id="class" type="text" class="form-control" name="class" value="{{ $vendor->class}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">NAME</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"  name="name" value="{{ $vendor->name}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                            <label for="address1" class="col-md-4 control-label">ADDRESS 1</label>

                            <div class="col-md-6">
                                <textarea id="address1" type="text" class="form-control"  name="address1" value="{{ $vendor->address1}}" required autofocus readonly>{{ $vendor->address1}}</textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                            <label for="address2" class="col-md-4 control-label">ADDRESS 2</label>

                            <div class="col-md-6">
                                <textarea id="address2" type="text" class="form-control"  name="address2" value="{{ $vendor->address2}}" required autofocus readonly>{{ $vendor->address2}}</textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('address3') ? ' has-error' : '' }}">
                            <label for="address3" class="col-md-4 control-label">ADDRESS 3</label>

                            <div class="col-md-6">
                                <textarea id="address3" type="text" class="form-control" name="address3" value="{{ $vendor->address3}}" required autofocus readonly>{{ $vendor->address3}}</textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">CITY</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ $vendor->city}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="country" class="col-md-4 control-label">COUNTRY</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" value="{{ $vendor->country}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">STATE</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state" value="{{ $vendor->state}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('pincode') ? ' has-error' : '' }}">
                            <label for="pincode" class="col-md-4 control-label">PIN CODE</label>

                            <div class="col-md-6">
                                <input id="pincode" type="number" class="form-control" name="pincode" value="{{ $vendor->pincode}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">PHONE</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" name="phone" value="{{ $vendor->phone}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
                            <label for="fax" class="col-md-4 control-label">FAX</label>

                            <div class="col-md-6">
                                <input id="fax" type="number" class="form-control" name="fax" value="{{ $vendor->fax}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">EMAIL</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $vendor->email}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('proposed') ? ' has-error' : '' }}">
                            <label for="proposed" class="col-md-4 control-label">ITEMS PROPOSED TO BE PURCHASED / SERVICES PROPOSED TO BE AVAILED</label>

                            <div class="col-md-6">
                                <textarea id="proposed" type="text" class="form-control" name="proposed" value="{{ $vendor->proposed}}" required autofocus readonly>{{ $vendor->proposed}}</textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('justification') ? ' has-error' : '' }}">
                            <label for="justification" class="col-md-4 control-label">NEED / JUSTIFICATION FOR THE INTRODUCTION OF NEW VENDOR</label>

                            <div class="col-md-6">
                                <textarea id="justification" type="text" class="form-control" name="justification" value="{{ $vendor->justification}}" required autofocus readonly>{{ $vendor->justification}}</textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('paymentofterm') ? ' has-error' : '' }}">
                            <label for="paymentofterm" class="col-md-4 control-label">PAYMENT OF TERM OF EXISTING VENDOR SUPLLYING SAME / SIMILAR ITEMS / PROVIDING SIMILAR SERVICE</label>

                            <div class="col-md-6">
                                <textarea id="paymentofterm" type="text" class="form-control" name="paymentofterm" value="{{ $vendor->paymentofterm}}" required autofocus readonly>{{ $vendor->paymentofterm}}</textarea>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group{{ $errors->has('referenceif') ? ' has-error' : '' }}">
                            <label for="referenceif" class="col-md-4 control-label">REFERENCE IF ANY</label>

                            <div class="col-md-6">
                                <textarea id="referenceif" type="text" class="form-control" name="referenceif" value="{{ $vendor->referenceif}}" required autofocus readonly>{{ $vendor->referenceif}}</textarea>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group{{ $errors->has('pan') ? ' has-error' : '' }}">
                            <label for="pan" class="col-md-4 control-label">PAN</label>

                            <div class="col-md-6">
                                <input id="pan" type="text" class="form-control" name="pan" value="{{ $vendor->pan}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group{{ $errors->has('esi') ? ' has-error' : '' }}">
                            <label for="esi" class="col-md-4 control-label">ESI NO</label>

                            <div class="col-md-6">
                                <input id="esi" type="text" class="form-control" name="esi" value="{{ $vendor->esi}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group{{ $errors->has('vendor') ? ' has-error' : '' }}">
                            <label for="vendor" class="col-md-4 control-label">VENDOR TYPE</label>

                            <div class="col-md-6">
                                <input id="vendortype" type="text" class="form-control" name="vendortype" value="{{ $vendor->vendortype}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group{{ $errors->has('gststate') ? ' has-error' : '' }}">
                            <label for="gststate" class="col-md-4 control-label">GST STATE CODE</label>

                            <div class="col-md-6">
                                <input id="gststate" type="text" class="form-control" name="gststate" value="{{ $vendor->gststate}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group{{ $errors->has('gstin') ? ' has-error' : '' }}">
                            <label for="gstin" class="col-md-4 control-label">GSTIN NO</label>

                            <div class="col-md-6">
                                <input id="gstin" type="text" class="form-control" name="gstin" value="{{ $vendor->gstin}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">HSN CODE FOR GOODS </label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="hsncode" value="{{ $vendor->hsncode}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">SAC CODE FOR SERVICES </label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="saccode" value="{{ $vendor->saccode}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>
                            
                        </form>
                    </div>
                
        </div>
</div>
</div>
</div>

@endsection