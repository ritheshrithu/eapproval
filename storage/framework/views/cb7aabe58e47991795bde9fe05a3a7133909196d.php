    <?php $__env->startSection('content'); ?>
<div class="container">
     <div class="row">
        <div class="col-md-3">
            <a href="<?php echo e(url('/')); ?>/oldapprovals/capexapproval/" class="btn btn-info">BACK</a>
        </div>     
        <div class="col-md-8">
            <H4><a href="<?php echo e(url('/')); ?>/oldapprovals/">APPROVALS    </a><span class="fa fa-arrow-right"></span>
            <a href="<?php echo e(url('/')); ?>/oldapprovals/capexapproval">CAPEX APPROVAL    </a><span class="fa fa-arrow-right"></span>
            <a href="<?php echo e(url('/')); ?>/createapproval/capexapproval/new">NEW CAPEX APPROVAL    </a></H4>
        </div>
    </div>
    </div><br>
       <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><center><h3>CAPEX APPROVAL FORM</h3></center></div>
                <div class="container">
   
                   <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="<?php echo e(route('new')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('ref') ? ' has-error' : ''); ?>">
                            
                                <label for="ref" class="col-md-4 control-label">REFERENCE ID</label>
                                    <div class="col-md-3">
                                        <input id="ref" class="form-control" name="ref" value="<?php echo e(Auth::user()->roll); ?>" readonly >
                                    </div>

                                    <div class="col-md-3">
                                        <input id="ref2" class="form-control" name="ref2" value="CAPITAL" readonly >
                                    </div>                          
                        </div>
                        <hr>
                        <div class="form-group<?php echo e($errors->has('gen') ? ' has-error' : ''); ?>">
                            <label for="gen" class="col-md-4 control-label">INITIATOR NAME</label>

                            <div class="col-md-6">
                                <input id="gen" type="text" class="form-control" name="gen" value="<?php echo e(Auth::user()->name); ?>" readonly required>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('gen') ? ' has-error' : ''); ?>">
                            <label for="gen" class="col-md-4 control-label">INITIATOR ROLL NO</label>

                            <div class="col-md-6">
                                <input id="gen" type="text" class="form-control" name="gen" value="<?php echo e(Auth::user()->roll); ?>" readonly required>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                            <label for="title" class="col-md-4 control-label">NAME</label>

                            <div class="col-md-6">
                                <input id="title" type="dropdown" class="form-control" name="title" value="<?php echo e(old('title')); ?>" required autofocus>
                            </div>
                        </div>

                        <hr>
                         <div class="form-group<?php echo e($errors->has('quantity') ? ' has-error' : ''); ?>">
                            <label for="quantity" class="col-md-4 control-label">QUANTITY</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control" name="quantity" value="<?php echo e(old('quantity')); ?>"  autofocus>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group<?php echo e($errors->has('reason') ? ' has-error' : ''); ?>">
                            <label for="des" class="col-md-4 control-label">REASON</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor" class="form-control" name="reason" value="<?php echo e(old('reason')); ?>" required autofocus></textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('manu') ? ' has-error' : ''); ?>">
                            <label for="manu" class="col-md-4 control-label">NAME OF THE MANUFACTURER</label>

                            <div class="col-md-6">
                                <input id="manu" type="text" class="form-control" name="manu" value="<?php echo e(old('manu')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('ref') ? ' has-error' : ''); ?>">
                            
                                <label for="ref" class="col-md-4 control-label">IMPORT or INDIGENOUS</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="import" name="import">
                                            <option>Select...</option> 
                                            <option>IMPORT</option>
                                            <option>INDIGENOUS</option>
                                        </select>
                                    </div>                          
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('agent') ? ' has-error' : ''); ?>">
                            <label for="agent" class="col-md-4 control-label">NAME OF THE AGENT / DEALER</label>

                            <div class="col-md-6">
                                <input id="agent" type="text" class="form-control" name="agent" value="<?php echo e(old('agent')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group<?php echo e($errors->has('capacity') ? ' has-error' : ''); ?>">
                            <label for="capacity" class="col-md-4 control-label">CAPACITY</label>

                            <div class="col-md-6">
                                <input id="capacity" type="text" class="form-control" name="capacity" value="<?php echo e(old('capacity')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <center><h3 for="doc1" class="col-md-12">TECHNICAL DESCRIPTION (ENCLOSE MANUFACTURER’S LEAFLET, QUOTATION, ETC., )</h3></center>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group<?php echo e($errors->has('doc1') ? ' has-error' : ''); ?>">
                                <div class="col-md-4">
                                    <input id="doc1" type="file" class="form-control" name="doc1" value="<?php echo e(old('doc1')); ?>" onchange="myFunction(this.value)"  autofocus>
                                </div>
                            
                                <div class="col-md-4">
                                    <input id="doc2" type="file" class="form-control" name="doc2" value="<?php echo e(old('doc2')); ?>" onchange="myFunctions(this.value)" autofocus>
                                </div>
                           
                                <div class="col-md-4">
                                    <input id="doc3" type="file" class="form-control" name="doc3" value="<?php echo e(old('doc3')); ?>" onchange="myFunctionss(this.value)" autofocus>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <center><h3 for="base" class="col-md-12">COST OF THE EQUIPMENT </h3></center> 
                        </div><br>
                        <label for="base" class="col-md-4 control-label">TOTAL COST</label>
                            <div class="col-md-6">
                                
                                <input id="base" type="text" class="form-control" name="base" value="<?php echo e(old('base')); ?>" required autofocus>
                            </div>
                            <br><br>
                        <hr>

                        <div class="row">
                            <center><h3 for="base" class="col-md-12">TOTAL VALUE </h3></center> 
                        </div><br>
                        <div class="row">
                                <label for="eqcost" class="col-md-2 control-label">EQUIPMENT COST</label>
                                    <div class="col-md-4">
                                        <input id="eqcost" type="number" class="form-control" name="eqcost" value="<?php echo e(old('eqcost')); ?>" required autofocus>
                                    </div>
                            
                                <label for="duty" class="col-md-2 control-label">IMPORT DUTY</label>
                                    <div class="col-md-4">
                                        <input id="duty" type="number" class="form-control" name="duty" value="<?php echo e(old('duty')); ?>" required autofocus>
                                    </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <label for="vattable" class="col-md-2 control-label">VATTABLE PORTION</label>
                                    <div class="col-md-4">
                                        <input id="vattable" type="number" class="form-control" name="vattable" value="<?php echo e(old('vattable')); ?>" required autofocus>
                                    </div>
                            
                                <label for="electrical" class="col-md-2 control-label">ELECTRICAL WORK</label>
                                    <div class="col-md-4">
                                        <input id="electrical" type="number" class="form-control" name="electrical" value="<?php echo e(old('electrical')); ?>" required autofocus>
                                    </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <label for="total" class="col-md-2 control-label">TOTAL COST</label>
                                    <div class="col-md-6">
                                        <input id="total" type="number" class="form-control" name="total" value="<?php echo e(old('total')); ?>" required autofocus>
                                    </div>
                                    <div class="col-md-4">
                                            <label class="checkbox-inline"><input id="transport" type="checkbox"  name="transport" value="1">CLEARING & TRANSPORT CHARGES</label>
                                    </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('order') ? ' has-error' : ''); ?>">
                            <label for="order" class="col-md-4 control-label">ORDERING INSTRUCTION</label>

                            <div class="col-md-6">
                                <input id="order" type="text" class="form-control" name="order" value="<?php echo e(old('order')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('terms') ? ' has-error' : ''); ?>">
                            <label for="terms" class="col-md-4 control-label">TERMS & PAYMENT DELIVERY</label>

                            <div class="col-md-6">
                                <input id="terms" type="text" class="form-control" name="terms" value="<?php echo e(old('terms')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('warranty') ? ' has-error' : ''); ?>">
                            <label for="warranty" class="col-md-4 control-label">WARRANTY & TRANSIT INSURANCE (in years)</label>

                            <div class="col-md-6">
                                <input id="warranty" type="number" class="form-control" name="warranty" value="<?php echo e(old('warranty')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('time') ? ' has-error' : ''); ?>">
                            <label for="time" class="col-md-4 control-label">TIME REQUIRED FOR COMMISSIONING THE ITEM</label>

                            <div class="col-md-6">
                                <input id="time" type="number" class="form-control" name="time" value="<?php echo e(old('time')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('purpose') ? ' has-error' : ''); ?>">
                            <label for="purpose" class="col-md-4 control-label">PURPOSE FOR PROCUREMENT</label>

                            <div class="col-md-6">
                                <textarea  id="ckeditor6" type="text" class="form-control" name="purpose" value="<?php echo e(old('purpose')); ?>" required autofocus></textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <center><h3 for="repname" class="col-md-12"><a href="#replacement" data-toggle="collapse">REPLACEMENT&nbsp;&nbsp;<i class="fa fa-angle-down fa-1x" aria-hidden="true"></i></a></h3></center> 
                        </div><br>
                        <div class="collapse" id="replacement">
                            
                        
                        <div class="row">
                                <label for="repname" class="col-md-4 control-label">NAME OF THE EQUIPMENT & PI.NO.</label>
                                    <div class="col-md-6">
                                        <input id="repname" type="text" class="form-control" name="repname" value="<?php echo e(old('repname')); ?>" >
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="repreason" class="col-md-4 control-label">WHY THIS IS BEING REPLACED</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor5" class="form-control" name="repreason" value="<?php echo e(old('repreason')); ?>" ></textarea>
                            </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="repold" class="col-md-2 control-label">HOW OLD IS THE EQUIPMENT</label>
                                    <div class="col-md-4">
                                        <input id="repold" type="number" class="form-control" name="repold" value="<?php echo e(old('repold')); ?>" >
                                    </div>
                            
                                <label for="repmode" class="col-md-2 control-label">MODE OF DISPOSAL</label>
                                    <div class="col-md-4">
                                        <input id="repmode" type="text" class="form-control" name="repmode" value="<?php echo e(old('repmode')); ?>" >
                                    </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <center><h3 for="repname" class="col-md-12"><a href="#category" data-toggle="collapse">CAPACITY INCREASE&nbsp;&nbsp;<i class="fa fa-angle-down fa-1x" aria-hidden="true"></i></a></h3></center> 
                          
                        </div><br>
                        <div class="collapse" id="category">
                            
                        
                        <div class="row">
                            <label for="capcat" class="col-md-4 control-label">CATEGORY</label>
                                    <div class="col-md-6">
                                        <input id="capcat" type="text" class="form-control" name="capcat" value="<?php echo e(old('capcat')); ?>"  >
                                    </div>      
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="capadd" class="col-md-4 control-label">ADDITIONAL PRODUCTION EXPECTED AVERAGE PER MONTH</label>
                                    <div class="col-md-6">
                                        <input id="capadd" type="text" class="form-control" name="capadd" value="<?php echo e(old('capadd')); ?>"  >
                                    </div>  
                        </div>
                        <br><br>
                        
                        <div class="row">
                            <label for="capquality" class="col-md-4 control-label">QUALITY IMPROVEMENT</label>
                                    <div class="col-md-6">
                                        <input id="capquality" type="text" class="form-control" name="capquality" value="<?php echo e(old('capquality')); ?>"  >
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="capred" class="col-md-4 control-label">REDUCTION / REQUIREMENT OF MEN</label>
                                    <div class="col-md-6">
                                        <input id="capred" type="text" class="form-control" name="capred" value="<?php echo e(old('capred')); ?>"  >
                                    </div>
                        </div>
                        <br><br>
                        
                        <div class="row">
                            <label for="capcomm" class="col-md-4 control-label">COMMENCEMENT OF PRODUCTION</label>
                                    <div class="col-md-6">
                                        <input id="capcomm" type="text" class="form-control" name="capcomm" value="<?php echo e(old('capcomm')); ?>"  >
                                    </div>
                        </div>
                        <br><br>
                        
                        <div class="row">
                            <label for="capminmaj" class="col-md-4 control-label">MINOR / MAJOR BALANCING EQUIPMENT REQUIRED</label>
                                    <div class="col-md-6">
                                        <input id="capminmaj" type="text" class="form-control" name="capminmaj" value="<?php echo e(old('capminmaj')); ?>"  >
                                    </div>
                        </div><br><br>

                        <div class="row">
                            <label for="capspe" class="col-md-4 control-label">SPECIAL CONSUMABLE REQUIREMENTS RECOMMENDED</label>
                                    <div class="col-md-6">
                                        <input id="capspe" type="text" class="form-control" name="capspe" value="<?php echo e(old('capspe')); ?>"  >
                                    </div>
                        </div>
                        
                        </div><hr>

                        <div class="row">
                            <center><h3 for="repname" class="col-md-12"><a href="#accessories" data-toggle="collapse">ACCESSORIES REQUIRED & APPROXIMATE COST&nbsp;&nbsp;<i class="fa fa-angle-down fa-1x" aria-hidden="true"></i></a></h3></center> 
                        </div><br>
                        <div id="accessories" class="collapse">
                            
                        
                        <div class="row">
                            <label for="acplants" class="col-md-4 control-label">AC PLANTS</label>
                                    <div class="col-md-6">
                                        <input id="acplants" type="text" class="form-control" name="acplants" value="<?php echo e(old('acplants')); ?>"  >
                                    </div>      
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="acfume" class="col-md-4 control-label">FUME EXTRACTORS</label>
                                    <div class="col-md-6">
                                        <input id="acfume" type="text" class="form-control" name="acfume" value="<?php echo e(old('acfume')); ?>"  >
                                    </div>  
                        </div>
                        <br><br>
                        
                        <div class="row">
                            <label for="acmeasure" class="col-md-4 control-label">MEASURING INSTRUMENTS</label>
                                    <div class="col-md-6">
                                        <input id="acmeasure" type="text" class="form-control" name="acmeasure" value="<?php echo e(old('acmeasure')); ?>"  >
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="acvoltage" class="col-md-4 control-label">VOLTAGE STABILIZERS</label>
                                    <div class="col-md-6">
                                        <input id="acvoltage" type="text" class="form-control" name="acvoltage" value="<?php echo e(old('acvoltage')); ?>"  >
                                    </div>
                        </div>
                        <br><br>
                        
                        <div class="row">
                            <label for="acoil" class="col-md-4 control-label">OIL FILTRATION</label>
                                    <div class="col-md-6">
                                        <input id="acoil" type="text" class="form-control" name="acoil" value="<?php echo e(old('acoil')); ?>"  >
                                    </div>
                        </div>
                        <br><br>
                        
                        <div class="row">
                            <label for="acmaterial" class="col-md-4 control-label">MATERIAL MOVEMENT REQUIRED</label>
                                    <div class="col-md-6">
                                        <input id="acmaterial" type="text" class="form-control" name="acmaterial" value="<?php echo e(old('acmaterial')); ?>"  >
                                    </div>
                        </div><br><br>

                        <div class="row">
                            <label for="accabin" class="col-md-4 control-label">CABIN</label>
                                    <div class="col-md-6">
                                        <input id="accabin" type="text" class="form-control" name="accabin" value="<?php echo e(old('accabin')); ?>"  >
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="acfurniture" class="col-md-4 control-label">FURNITURE</label>
                                    <div class="col-md-6">
                                        <input id="acfurniture" type="text" class="form-control" name="acfurniture" value="<?php echo e(old('acfurniture')); ?>"  >
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="accivil" class="col-md-4 control-label">CIVIL WORK/AIR LINE CONNECTION</label>
                                    <div class="col-md-6">
                                        <input id="accivil" type="text" class="form-control" name="accivil" value="<?php echo e(old('accivil')); ?>"  >
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="acelectrical" class="col-md-4 control-label">ELECTRICAL WORK</label>
                                    <div class="col-md-6">
                                        <input id="acelectrical" type="text" class="form-control" name="acelectrical" value="<?php echo e(old('acelectrical')); ?>"  >
                                    </div>
                        </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('space') ? ' has-error' : ''); ?>">
                            <label for="space" class="col-md-4 control-label">WHETHER WE HAVE THE REQUIRED POWER & SPACE</label>

                            <div class="col-md-6">
                                        <select class="form-control" id="space" name="space">
                                            <option>Select...</option> 
                                            <option>YES</option>
                                            <option>NO</option>
                                        </select>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('installapprox') ? ' has-error' : ''); ?>">
                            <label for="installapprox" class="col-md-4 control-label">APPROXIMATE INSTALLATION EXPENSES</label>

                            <div class="col-md-6">
                                <input id="installapprox" type="text" class="form-control" name="installapprox" value="<?php echo e(old('installapprox')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('travel') ? ' has-error' : ''); ?>">
                            <label for="travel" class="col-md-4 control-label">TRAVEL EXPENSES – OUR EXECUTIVE</label>

                            <div class="col-md-6">
                                <input id="travel" type="text" class="form-control" name="travel" value="<?php echo e(old('travel')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('maintenance') ? ' has-error' : ''); ?>">
                            <label for="agent" class="col-md-4 control-label">APPROXIMATE COST OF MAINTENANCE PER ANNUM</label>

                            <div class="col-md-6">
                                <input id="maintenance" type="text" class="form-control" name="maintenance" value="<?php echo e(old('maintenance')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('speinstruction') ? ' has-error' : ''); ?>">
                            <label for="speinstruction" class="col-md-4 control-label">SPECIAL INSTRUCTION TO SALES </label>

                            <div class="col-md-6">
                                <input id="speinstruction" type="text" class="form-control" name="speinstruction" value="<?php echo e(old('speinstruction')); ?>" required autofocus>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group<?php echo e($errors->has('training') ? ' has-error' : ''); ?>">
                            <label for="training" class="col-md-4 control-label">TRAINING NEEDS AND APPROXIMATE COST </label>

                            <div class="col-md-6">
                                <input id="training" type="text" class="form-control" name="training" value="<?php echo e(old('training')); ?>" required autofocus>
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
<script>

    function myFunction(val) 
    {
        var sizes = document.getElementById('doc1').files[0].size;
        var val  = (sizes/ 1048576).toFixed(2);
        if(val > 8.00)
        {
            alert("File size exceeded.Upload file less than 8 MB.The Uploaded File size is: " + val + " MB");
        }
    }

    function myFunctions(val) 
    {
        var sizese = document.getElementById('doc2').files[0].size;
        var vale  = (sizese/ 1048576).toFixed(2);
        if(vale > 8.00)
        {
            alert("File size exceeded.Upload file less than 8 MB.The Uploaded File size is: " + vale + " MB");
        }
    }

    function myFunctionss(val) 
    {
        var sizesee = document.getElementById('doc3').files[0].size;
        var valee  = (sizesee/ 1048576).toFixed(2);
        if(valee > 8.00)
        {
            alert("File size exceeded.Upload file less than 8 MB.The Uploaded File size is: " + valee + " MB");
        }
    }

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>