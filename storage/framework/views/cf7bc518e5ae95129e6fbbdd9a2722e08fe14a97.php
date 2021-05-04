<?php $__env->startSection('content'); ?>
<div class="container">
     <div class="row">
        <div class="col-md-3">
            <a href="<?php echo e(url('/')); ?>/approvals/vendorapproval/" class="btn btn-info">BACK</a>
        </div>     
        <div class="col-md-8">
            <H4><a href="<?php echo e(url('/')); ?>/oldapprovals/">APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="<?php echo e(url('/')); ?>/oldapprovals/vendorapproval">VENDOR APPROVAL    </a><span class="fa fa-arrow-right"></span>
            <a href="<?php echo e(url('/')); ?>/createapproval/vendorapproval/new">NEW VENDOR APPROVAL    </a></H4>
        </div>
    </div>
    </div><br>
       <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><center><h3>VENDOR APPROVAL FORM</h3></center></div>
                <div class="container">
   
                   <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="new2" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('ref') ? ' has-error' : ''); ?>">
                            
                                <label for="ref" class="col-md-4 control-label">REFERENCE ID</label>
                                    <div class="col-md-3">
                                        <input id="ref" class="form-control" name="ref" value="<?php echo e(Auth::user()->roll); ?>" readonly >
                                    </div>

                                    <div class="col-md-3">
                                        <input id="ref2" class="form-control" name="ref2" value="VENDOR" readonly >
                                    </div>                          
                        </div>
                        <hr>
                        
                        <div class="form-group<?php echo e($errors->has('location') ? ' has-error' : ''); ?>">
                            <label for="location" class="col-md-4 control-label">LOCATION</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="<?php echo e(old('location')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('vendorcode') ? ' has-error' : ''); ?>">
                            <label for="vendorcode" class="col-md-4 control-label">VENDOR CODE</label>

                            <div class="col-md-6">
                                <input id="vendorcode" type="text" class="form-control" name="vendorcode" value="<?php echo e(old('vendorcode')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('paymentterms') ? ' has-error' : ''); ?>">
                            <label for="title" class="col-md-4 control-label">PAYMENT TERMS</label>

                            <div class="col-md-6">
                                <input id="paymentterms" type="text" class="form-control" name="paymentterms" value="<?php echo e(old('paymentterms')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('currency') ? ' has-error' : ''); ?>">
                            <label for="currency" class="col-md-4 control-label">CURRENCY</label>

                            <div class="col-md-6">
                                <input id="currency" type="text" class="form-control" name="currency" value="<?php echo e(old('currency')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group<?php echo e($errors->has('paymentmode') ? ' has-error' : ''); ?>">
                            <label for="paymentmode" class="col-md-4 control-label">PAYMENT MODE</label>

                            <div class="col-md-6">
                                <select name="paymentmode" id="paymentmode" class="form-control" required autofocus>
                                    <option></option>
                                    <option>CHEQUE</option>
                                    <option>DD</option>
                                    <option>PAY ORDER</option>
                                    <option>OTHERS</option>
                                </select>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('class') ? ' has-error' : ''); ?>">
                            <label for="class" class="col-md-4 control-label">CLASS</label>

                            <div class="col-md-6">
                                <select name="class" id="class" class="form-control" required autofocus>
                                    <option></option>
                                    <option>SMALL</option>
                                    <option>MICRO</option>
                                    <option>MEDIUM</option>
                                    <option>LARGE</option>
                                </select>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">NAME</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control"  name="name" value="<?php echo e(old('name')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('address1') ? ' has-error' : ''); ?>">
                            <label for="address1" class="col-md-4 control-label">ADDRESS 1</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor4" type="text" class="form-control"  name="address1" value="<?php echo e(old('address1')); ?>" required autofocus></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group<?php echo e($errors->has('address2') ? ' has-error' : ''); ?>">
                            <label for="address2" class="col-md-4 control-label">ADDRESS 2</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor5" type="text" class="form-control"  name="address2" value="<?php echo e(old('address2')); ?>" required autofocus></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group<?php echo e($errors->has('address3') ? ' has-error' : ''); ?>">
                            <label for="address3" class="col-md-4 control-label">ADDRESS 3</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor6" type="text" class="form-control" name="address3" value="<?php echo e(old('address3')); ?>" required autofocus></textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('city') ? ' has-error' : ''); ?>">
                            <label for="city" class="col-md-4 control-label">CITY</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="<?php echo e(old('city')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('country') ? ' has-error' : ''); ?>">
                            <label for="country" class="col-md-4 control-label">COUNTRY</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control" name="country" value="<?php echo e(old('country')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
                            <label for="state" class="col-md-4 control-label">STATE</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state" value="<?php echo e(old('state')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('pincode') ? ' has-error' : ''); ?>">
                            <label for="pincode" class="col-md-4 control-label">PIN CODE</label>

                            <div class="col-md-6">
                                <input id="pincode" type="number" class="form-control" name="pincode" value="<?php echo e(old('pincode')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                            <label for="phone" class="col-md-4 control-label">PHONE</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('fax') ? ' has-error' : ''); ?>">
                            <label for="fax" class="col-md-4 control-label">FAX</label>

                            <div class="col-md-6">
                                <input id="fax" type="number" class="form-control" name="fax" value="<?php echo e(old('fax')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">EMAIL</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('proposed') ? ' has-error' : ''); ?>">
                            <label for="proposed" class="col-md-4 control-label">ITEMS PROPOSED TO BE PURCHASED / SERVICES PROPOSED TO BE AVAILED</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor" type="text" class="form-control" name="proposed" value="<?php echo e(old('proposed')); ?>" required autofocus></textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('justification') ? ' has-error' : ''); ?>">
                            <label for="justification" class="col-md-4 control-label">NEED / JUSTIFICATION FOR THE INTRODUCTION OF NEW VENDOR</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor1" type="text" class="form-control" name="justification" value="<?php echo e(old('justification')); ?>" required autofocus></textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('paymentofterm') ? ' has-error' : ''); ?>">
                            <label for="paymentofterm" class="col-md-4 control-label">PAYMENT OF TERM OF EXISTING VENDOR SUPLLYING SAME / SIMILAR ITEMS / PROVIDING SIMILAR SERVICE</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor2" type="text" class="form-control" name="paymentofterm" value="<?php echo e(old('paymentofterm')); ?>" required autofocus></textarea>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group<?php echo e($errors->has('referenceif') ? ' has-error' : ''); ?>">
                            <label for="referenceif" class="col-md-4 control-label">REFERENCE IF ANY</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor3" type="text" class="form-control" name="referenceif" value="<?php echo e(old('referenceif')); ?>" required autofocus></textarea>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group<?php echo e($errors->has('pan') ? ' has-error' : ''); ?>">
                            <label for="pan" class="col-md-4 control-label">PAN</label>

                            <div class="col-md-6">
                                <input id="pan" type="text" class="form-control" name="pan" value="<?php echo e(old('pan')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group<?php echo e($errors->has('esi') ? ' has-error' : ''); ?>">
                            <label for="esi" class="col-md-4 control-label">ESI NO</label>

                            <div class="col-md-6">
                                <input id="esi" type="text" class="form-control" name="esi" value="<?php echo e(old('esi')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group<?php echo e($errors->has('vendor') ? ' has-error' : ''); ?>">
                            <label for="vendor" class="col-md-4 control-label">VENDOR TYPE</label>

                            <div class="col-md-6">
                                <input id="vendortype" type="text" class="form-control" name="vendortype" value="<?php echo e(old('vendortype')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group<?php echo e($errors->has('gststate') ? ' has-error' : ''); ?>">
                            <label for="gststate" class="col-md-4 control-label">GST STATE CODE</label>

                            <div class="col-md-6">
                                <input id="gststate" type="text" class="form-control" name="gststate" value="<?php echo e(old('gststate')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group<?php echo e($errors->has('gstin') ? ' has-error' : ''); ?>">
                            <label for="gstin" class="col-md-4 control-label">GSTIN NO</label>

                            <div class="col-md-6">
                                <input id="gstin" type="text" class="form-control" name="gstin" value="<?php echo e(old('gstin')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">HSN CODE FOR GOODS </label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="hsncode" value="<?php echo e(old('email')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">SAC CODE FOR SERVICES </label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="saccode" value="<?php echo e(old('email')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        
                        <div class="row">
                            <center><h3 for="doc1" class="col-md-12">REQUIRED DOCUMENTS</h3></center>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group<?php echo e($errors->has('doc1') ? ' has-error' : ''); ?>">
                                <div class="col-md-4">
                                    <input id="doc1" type="file" class="form-control" name="doc1" value="<?php echo e(old('doc1')); ?>" autofocus>
                                </div>
                            
                                <div class="col-md-4">
                                    <input id="doc2" type="file" class="form-control" name="doc2" value="<?php echo e(old('doc2')); ?>" autofocus>
                                </div>
                           
                                <div class="col-md-4">
                                    <input id="doc3" type="file" class="form-control" name="doc3" value="<?php echo e(old('doc3')); ?>" autofocus>
                                </div>
                            </div>
                        </div>
                        <hr>



                                        <div class="form-group<?php echo e($errors->has('receiver') ? ' has-error' : ''); ?>">
                            <label for="rec" class="col-md-4 control-label">APPROVING AUTHORITY 1</label>
                            <div class="col-md-6">
                               
                            <select class="form-control" id="rec" name="rec" required> 
                                <option>                        </option>
                                <option>MANAGER - <?php echo e(Auth::user()->manager); ?> - <?php echo e($off1); ?> </option>
                                <option>SUPERVISOR - <?php echo e(Auth::user()->supervisor); ?> - <?php echo e($off3); ?></option>
                                <option>PLANTHEAD - <?php echo e(Auth::user()->planthead); ?> - <?php echo e($off4); ?></option>
                                <option>WTD - <?php echo e(Auth::user()->vpo); ?> - <?php echo e($off5); ?></option>
                                <option>EVP & CFO - <?php echo e(Auth::user()->vpca); ?> - <?php echo e($off6); ?></option>
                                <option>DIRECTOR - <?php echo e(Auth::user()->director); ?> - <?php echo e($off7); ?></option>
                            </select>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="form-group<?php echo e($errors->has('receiver') ? ' has-error' : ''); ?>">
                            <label for="rec1" class="col-md-4 control-label">APPROVING AUTHORITY 2</label>
                            <div class="col-md-6">
                               
                            <select class="form-control" id="rec1" name="rec1">
                                <option>                        </option>
                                <option>MANAGER - <?php echo e(Auth::user()->manager); ?> - <?php echo e($off1); ?> </option>
                                <option>SUPERVISOR - <?php echo e(Auth::user()->supervisor); ?> - <?php echo e($off3); ?></option>
                                <option>PLANTHEAD - <?php echo e(Auth::user()->planthead); ?> - <?php echo e($off4); ?></option>
                                <option>WTD - <?php echo e(Auth::user()->vpo); ?> - <?php echo e($off5); ?></option>
                                <option>EVP & CFO - <?php echo e(Auth::user()->vpca); ?> - <?php echo e($off6); ?></option>
                                <option>DIRECTOR - <?php echo e(Auth::user()->director); ?> - <?php echo e($off7); ?></option>
                            </select>
                            </div>
                            
                        </div><hr>
                        <div class="form-group<?php echo e($errors->has('receiver') ? ' has-error' : ''); ?>">
                            <label for="rec2" class="col-md-4 control-label">APPROVING AUTHORITY 3</label>
                            <div class="col-md-6">
                               
                            <select class="form-control" id="rec2" name="rec2">
                                <option>                        </option>
                                <option>MANAGER - <?php echo e(Auth::user()->manager); ?> - <?php echo e($off1); ?> </option>
                                <option>SUPERVISOR - <?php echo e(Auth::user()->supervisor); ?> - <?php echo e($off3); ?></option>
                                <option>PLANTHEAD - <?php echo e(Auth::user()->planthead); ?> - <?php echo e($off4); ?></option>
                                <option>WTD - <?php echo e(Auth::user()->vpo); ?> - <?php echo e($off5); ?></option>
                                <option>EVP & CFO - <?php echo e(Auth::user()->vpca); ?> - <?php echo e($off6); ?></option>
                                <option>DIRECTOR - <?php echo e(Auth::user()->director); ?> - <?php echo e($off7); ?></option>
                            </select>
                           </div>
                        </div><hr>

                        <div class="form-group<?php echo e($errors->has('receiver') ? ' has-error' : ''); ?>">
                            <label for="rec3" class="col-md-4 control-label">APPROVING AUTHORITY 4</label>
                            <div class="col-md-6">
                            <select class="form-control" id="rec3" name="rec3">
                                <option>                        </option>
                                <option>MANAGER - <?php echo e(Auth::user()->manager); ?> - <?php echo e($off1); ?> </option>
                                <option>SUPERVISOR - <?php echo e(Auth::user()->supervisor); ?> - <?php echo e($off3); ?></option>
                                <option>PLANTHEAD - <?php echo e(Auth::user()->planthead); ?> - <?php echo e($off4); ?></option>
                                <option>WTD - <?php echo e(Auth::user()->vpo); ?> - <?php echo e($off5); ?></option>
                                <option>EVP & CFO - <?php echo e(Auth::user()->vpca); ?> - <?php echo e($off6); ?></option>
                                <option>DIRECTOR - <?php echo e(Auth::user()->director); ?> - <?php echo e($off7); ?></option>
                            </select>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>