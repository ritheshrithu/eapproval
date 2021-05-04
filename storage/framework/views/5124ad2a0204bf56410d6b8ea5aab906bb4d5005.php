<?php $__env->startSection('content'); ?>
<div class="container">
     <div class="row">
        <div class="col-md-3">
            <a href="<?php echo e(url('/')); ?>/approvals/dealerapproval/" class="btn btn-info">BACK</a>
        </div>     
        <div class="col-md-8">
            <H4><a href="<?php echo e(url('/')); ?>/oldapprovals/">APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="<?php echo e(url('/')); ?>/oldapprovals/dealerapproval">DEALER ENROLMENT    </a><span class="fa fa-arrow-right"></span>
            <a href="<?php echo e(url('/')); ?>/createapproval/dealerapproval/newd">NEW DEALER ENROLMENT    </a></H4>
        </div>
    </div>
    </div><br>
       <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><center><h3>DEALER ENROLMENT FORM</h3></center></div>
                <div class="container">
   
                   <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="new4" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('ref') ? ' has-error' : ''); ?>">
                            
                                <label for="ref" class="col-md-4 control-label">REFERENCE ID</label>
                                    <div class="col-md-3">
                                        <input id="ref" class="form-control" name="ref" value="<?php echo e(Auth::user()->roll); ?>" readonly >
                                    </div>

                                    <div class="col-md-3">
                                        <input id="ref2" class="form-control" name="ref2" value="DEALER" readonly >
                                    </div>                          
                        </div>
                        <hr>
                        
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">NAME OF DEALER</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                            <label for="address" class="col-md-4 control-label">FULL POSTAL ADDRESS WITH LANDLINE & MOBILE NUMBER</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor" type="text" class="form-control" name="address" value="<?php echo e(old('address')); ?>" required autofocus></textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">EMAIL ID</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('pan') ? ' has-error' : ''); ?>">
                            <label for="pan" class="col-md-4 control-label">PAN</label>

                            <div class="col-md-6">
                                <input id="pan" type="pan" class="form-control" name="pan" value="<?php echo e(old('pan')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('constitution') ? ' has-error' : ''); ?>">
                            <label for="class" class="col-md-4 control-label">CONSTITUTION (PLEASE SELECT ONE)</label>

                            <div class="col-md-6">
                                <select name="constitution" id="constitution" class="form-control" required autofocus>
                                    <option></option>
                                    <option>PUBLIC LTD</option>
                                    <option>PRIVATE LTD</option>
                                    <option>LLP</option>
                                    <option>PARTNERSHIP</option>
                                    <option>PROPRIETORSHIP</option>
                                </select>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('handler') ? ' has-error' : ''); ?>">
                            <label for="address" class="col-md-4 control-label">NAME OF THE PROPRIETOR / PARTNER – WHO WILL BE DIRECTLY HANDLING OUR PRODUCTS</label>

                            <div class="col-md-6">
                                <input id="handler" type="text" class="form-control" name="handler" value="<?php echo e(old('handler')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('year') ? ' has-error' : ''); ?>">
                            <label for="year" class="col-md-4 control-label">YEAR OF ESTABLISHMENT</label>

                            <div class="col-md-6">
                                <input id="year" type="number" class="form-control" name="year" value="<?php echo e(old('year')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('gst') ? ' has-error' : ''); ?>">
                            <label for="gst" class="col-md-4 control-label">GST NO</label>

                            <div class="col-md-6">
                                <input id="gst" type="text" class="form-control" name="gst" value="<?php echo e(old('gst')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('state') ? ' has-error' : ''); ?>">
                            <label for="state" class="col-md-4 control-label">STATE NAME</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state" value="<?php echo e(old('state')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('dealerbank') ? ' has-error' : ''); ?>">
                            <label for="address" class="col-md-4 control-label">NAME OF DEALER’S BANKER / POSTAL ADDRESS</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor1" type="text" class="form-control" name="dealerbank" value="<?php echo e(old('dealerbank')); ?>" required autofocus></textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('authdealer') ? ' has-error' : ''); ?>">
                            <label for="authdealer" class="col-md-4 control-label">SPECIFY DETAILS, IN CASE OF AUTHORIZED DEALER FOR ANY OTHER PRODUCTS</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor2" type="text" class="form-control" name="authdealer" value="<?php echo e(old('authdealer')); ?>" required autofocus></textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('authdirect') ? ' has-error' : ''); ?>">
                            <label for="authdirect" class="col-md-4 control-label">IF SO, WHETHER DEALING DIRECT OR THROUGH ANY OTHER SOURCE</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor3" type="text" class="form-control" name="authdirect" value="<?php echo e(old('authdirect')); ?>" required autofocus></textarea>
                            </div>
                        </div>
                        <hr>

                         <div class="form-group<?php echo e($errors->has('selling') ? ' has-error' : ''); ?>">
                            <label for="class" class="col-md-4 control-label">MAINLY SELLING TO</label>

                            <div class="col-md-6">
                                <select name="selling" id="selling" class="form-control" required autofocus>
                                    <option></option>
                                    <option>CUSTOMERS</option>
                                    <option>SUB-DEALERS</option>
                                    <option>BOTH</option>
                                </select>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('cutting') ? ' has-error' : ''); ?>">
                            <label for="cutting" class="col-md-4 control-label">IF ALREADY DEALING WITH CUTTING TOOLS, HOW LONG AND SOURCE OF PURCHASE AND BRAND IN WHICH DEALING, INDICATING APPROXIMATE ANNUAL OFF TAKE IF POSSIBLE</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor4" type="text" class="form-control" name="cutting" value="<?php echo e(old('cutting')); ?>" required autofocus></textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('reason') ? ' has-error' : ''); ?>">
                            <label for="reason" class="col-md-4 control-label">REASONS FOR TAKING ADDISON DEALERSHIP</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor5" type="text" class="form-control" name="reason" value="<?php echo e(old('reason')); ?>" required autofocus></textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <center><h3 for="repname" class="col-md-12">ESTIMATED NETT TAKE PER YEAR FOR FIRST 3 YEARS</h3></center> 
                        </div><br>
                        <div class="row">
                            <label for="nettake1" class="col-md-4 control-label">I</label>
                                    <div class="col-md-6">
                                        <input id="nettake1" type="text" class="form-control" name="nettake1" value="<?php echo e(old('nettake1')); ?>" required autofocus>
                                    </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <label for="snettake" class="col-md-4 control-label">II</label>
                                    <div class="col-md-6">
                                        <input id="nettake2" type="text" class="form-control" name="nettake2" value="<?php echo e(old('nettake2')); ?>" required autofocus>
                                    </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <label for="nettake3" class="col-md-4 control-label">III</label>
                                    <div class="col-md-6">
                                        <input id="sales3" type="text" class="form-control" name="nettake3" value="<?php echo e(old('nettake3')); ?>" required autofocus>
                                    </div>
                        </div>
                        <br>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('paymentterms') ? ' has-error' : ''); ?>">
                            <label for="paymentterms" class="col-md-4 control-label">PAYMENT TERMS RECOMMENDED AND JUSTIFICATION IF CREDIT RECOMMENDED </label>

                            <div class="col-md-6">
                                <textarea id="ckeditor6" type="text" class="form-control" name="paymentterms" value="<?php echo e(old('paymentterms')); ?>" required autofocus></textarea>
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