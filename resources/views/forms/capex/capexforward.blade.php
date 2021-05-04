



@extends('layouts.app')


@section('content')
<div class="container-fluid">
    <div class="container">
     <div class="row"> <a href="{{ url('/')}}/approvals/capexapproval/{{$capex->id}}/" class="btn btn-info">GO BACK</a></div>
 </div><br>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
               <div class="panel-heading"><center><h3>APPROVE {{ $capex->title }}</h3></center></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="forward" enctype="multipart/form-data">
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
                                        <input id="ref" class="form-control" name="ref" value="{{ $capex->ref }}" readonly >
                                    </div>

                                    <div class="col-md-2">
                                        <input id="ref2" class="form-control" name="ref2" value="CAPITAL" readonly >
                                    </div>              

                                    <div class="col-md-2">
                                        <input id="ref3" class="form-control" type="number" name="ref3" value="{{ $capex->ref3 }}" required readonly>   
                                </div>            
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('gen') ? ' has-error' : '' }}">
                            <label for="gen" class="col-md-4 control-label">GENERATOR</label>

                            <div class="col-md-6">
                                <input id="gen" type="text" class="form-control" name="gen" value="{{ $capex->gen }}" readonly required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">NAME</label>

                            <div class="col-md-6">
                                <input id="title" type="dropdown" class="form-control" name="title" value="{{ $capex->title }}" required autofocus readonly>
                            </div>
                        </div>

                        <hr>
                         <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-4 control-label">QUANTITY</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control" name="quantity" value="{{ $capex->quantity }}" required autofocus readonly>
                            </div>
                        </div>

                        <hr>
                        <div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
                            <label for="des" class="col-md-4 control-label">REASON</label>

                            <div class="col-md-6">
                                <input id="reason" class="form-control" name="reason" value="{{ $capex->reason }}" required autofocus readonly>

                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('manu') ? ' has-error' : '' }}">
                            <label for="manu" class="col-md-4 control-label">NAME OF THE MANUFACTURER</label>

                            <div class="col-md-6">
                                <input id="manu" type="text" class="form-control" name="manu" value="{{ $capex->manu }}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('ref') ? ' has-error' : '' }}">
                            
                                <label for="ref" class="col-md-4 control-label">IMPORT or INDIGENOUS</label>
                                    <div class="col-md-6">
                                        <input id="import" type="text" class="form-control" name="import" value="{{ $capex->import }}" required autofocus readonly>
                                    </div>                          
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('agent') ? ' has-error' : '' }}">
                            <label for="agent" class="col-md-4 control-label">NAME OF THE AGENT / DEALER</label>

                            <div class="col-md-6">
                                <input id="agent" type="text" class="form-control" name="agent" value="{{ $capex->agent}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('capacity') ? ' has-error' : '' }}">
                            <label for="capacity" class="col-md-4 control-label">CAPACITY</label>

                            <div class="col-md-6">
                                <input id="capacity" type="text" class="form-control" name="capacity" value="{{ $capex->capacity}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>
                       
                        <div class="row">
                            <center><h3 for="base" class="col-md-12">COST OF THE EQUIPMENT </h3></center> 
                        </div><br>
                            <div class="form-group{{ $errors->has('base') ? ' has-error' : '' }}">
                            <label for="base" class="col-md-4 control-label">TOTAL COST</label>

                            <div class="col-md-6">
                                <input id="base" type="text" class="form-control" name="base" value="{{ $capex->base}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <center><h3 for="base" class="col-md-12">TOTAL VALUE </h3></center> 
                        </div><br>
                        <div class="row">
                                <label for="eqcost" class="col-md-2 control-label">EQUIPMENT COST</label>
                                    <div class="col-md-4">
                                        <input id="eqcost" type="number" class="form-control" name="eqcost" value="{{ $capex->eqcost}}" required autofocus readonly>
                                    </div>
                            
                                <label for="duty" class="col-md-2 control-label">IMPORT DUTY</label>
                                    <div class="col-md-4">
                                        <input id="duty" type="number" class="form-control" name="duty" value="{{ $capex->duty}}" required autofocus readonly>
                                    </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <label for="vattable" class="col-md-2 control-label">VATTABLE PORTION</label>
                                    <div class="col-md-4">
                                        <input id="vattable" type="number" class="form-control" name="vattable" value="{{ $capex->vattable}}" required autofocus readonly>
                                    </div>
                            
                                <label for="electrical" class="col-md-2 control-label">ELECTRICAL WORK</label>
                                    <div class="col-md-4">
                                        <input id="electrical" type="number" class="form-control" name="electrical" value="{{ $capex->electrical}}" required autofocus readonly>
                                    </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <label for="total" class="col-md-2 control-label">TOTAL COST</label>
                                    <div class="col-md-6">
                                        <input id="total" type="number" class="form-control" name="total" value="{{ $capex->total}}" required autofocus readonly>
                                    </div>
                                    <div class="col-md-4">
                                       <h4> + CLEARING & TRANSPORT CHARGES</h4>
                                    </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                            <label for="order" class="col-md-4 control-label">ORDERING INSTRUCTION</label>

                            <div class="col-md-6">
                                <input id="order" type="text" class="form-control" name="order" value="{{ $capex->order}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('terms') ? ' has-error' : '' }}">
                            <label for="terms" class="col-md-4 control-label">TERMS & PAYMENT DELIVERY</label>

                            <div class="col-md-6">
                                <input id="terms" type="text" class="form-control" name="terms" value="{{ $capex->terms}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('warranty') ? ' has-error' : '' }}">
                            <label for="warranty" class="col-md-4 control-label">WARRANTY & TRANSIT INSURANCE (in years)</label>

                            <div class="col-md-6">
                                <input id="warranty" type="number" class="form-control" name="warranty" value="{{ $capex->warranty}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                            <label for="time" class="col-md-4 control-label">TIME REQUIRED FOR COMMISSIONING THE ITEM</label>

                            <div class="col-md-6">
                                <input id="time" type="number" class="form-control" name="time" value="{{ $capex->time}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('purpose') ? ' has-error' : '' }}">
                            <label for="purpose" class="col-md-4 control-label">PURPOSE FOR PROCUREMENT</label>

                            <div class="col-md-6">
                                <input id="purpose" type="text" class="form-control" name="purpose" value="{{ $capex->purpose}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <center><h3 for="repname" class="col-md-12">REPLACEMENT</h3></center> 
                        </div><br>

                        <div class="row">
                                <label for="repname" class="col-md-4 control-label">NAME OF THE EQUIPMENT & PI.NO.</label>
                                    <div class="col-md-6">
                                        <input id="repname" type="text" class="form-control" name="repname" value="{{ $capex->repname}}" required autofocus readonly>
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="repreason" class="col-md-4 control-label">WHY THIS IS BEING REPLACED</label>

                            <div class="col-md-6">
                                <input id="repreason" type="text" class="form-control" name="repreason" value="{{ $capex->repreason}}" required autofocus readonly>
                            </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="repold" class="col-md-2 control-label">HOW OLD IS THE EQUIPMENT</label>
                                    <div class="col-md-4">
                                        <input id="repold" type="number" class="form-control" name="repold" value="{{ $capex->repold}}" required autofocus readonly>
                                    </div>
                            
                                <label for="repmode" class="col-md-2 control-label">MODE OF DISPOSAL</label>
                                    <div class="col-md-4">
                                        <input id="repmode" type="text" class="form-control" name="repmode" value="{{ $capex->repmode}}" required autofocus readonly>
                                    </div>
                        </div>
                        <hr>

                        <div class="row">
                            <center><h3 for="capacity" class="col-md-12">CAPACITY INCREASE </h3></center> 
                        </div><br>
                        <div class="row">
                            <label for="capcat" class="col-md-4 control-label">CATEGORY</label>
                                    <div class="col-md-6">
                                        <input id="capcat" type="text" class="form-control" name="capcat" value="{{ $capex->capcat}}" required autofocus readonly>
                                    </div>      
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="capadd" class="col-md-4 control-label">ADDITIONAL PRODUCTION EXPECTED AVERAGE PER MONTH</label>
                                    <div class="col-md-6">
                                        <input id="capadd" type="text" class="form-control" name="capadd" value="{{ $capex->capadd}}" required autofocus readonly>
                                    </div>  
                        </div>
                        <br><br>
                        
                        <div class="row">
                            <label for="capquality" class="col-md-4 control-label">QUALITY IMPROVEMENT</label>
                                    <div class="col-md-6">
                                        <input id="capquality" type="text" class="form-control" name="capquality" value="{{ $capex->capquality}}" required autofocus readonly>
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="capred" class="col-md-4 control-label">REDUCTION / REQUIREMENT OF MEN</label>
                                    <div class="col-md-6">
                                        <input id="capred" type="text" class="form-control" name="capred" value="{{ $capex->capred}}" required autofocus readonly>
                                    </div>
                        </div>
                        <br><br>
                        
                        <div class="row">
                            <label for="capcomm" class="col-md-4 control-label">COMMENCEMENT OF PRODUCTION</label>
                                    <div class="col-md-6">
                                        <input id="capcomm" type="text" class="form-control" name="capcomm" value="{{ $capex->capcomm}}" required autofocus readonly>
                                    </div>
                        </div>
                        <br><br>
                        
                        <div class="row">
                            <label for="capminmaj" class="col-md-4 control-label">MINOR / MAJOR BALANCING EQUIPMENT REQUIRED</label>
                                    <div class="col-md-6">
                                        <input id="capminmaj" type="text" class="form-control" name="capminmaj" value="{{ $capex->capminmaj}}" required autofocus readonly>
                                    </div>
                        </div><br><br>

                        <div class="row">
                            <label for="capspe" class="col-md-4 control-label">SPECIAL CONSUMABLE REQUIREMENTS RECOMMENDED</label>
                                    <div class="col-md-6">
                                        <input id="capspe" type="text" class="form-control" name="capspe" value="{{ $capex->capspe}}" required autofocus readonly>
                                    </div>
                        </div>
                        <hr>


                        <div class="row">
                            <center><h3 for="capacity" class="col-md-12">ACCESSORIES REQUIRED & APPROXIMATE COST</h3></center> 
                        </div><br>
                        <div class="row">
                            <label for="acplants" class="col-md-4 control-label">AC PLANTS</label>
                                    <div class="col-md-6">
                                        <input id="acplants" type="text" class="form-control" name="acplants" value="{{ $capex->acplants}}" required autofocus readonly>
                                    </div>      
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="acfume" class="col-md-4 control-label">FUME EXTRACTORS</label>
                                    <div class="col-md-6">
                                        <input id="acfume" type="text" class="form-control" name="acfume" value="{{ $capex->acfume}}" required autofocus readonly>
                                    </div>  
                        </div>
                        <br><br>
                        
                        <div class="row">
                            <label for="acmeasure" class="col-md-4 control-label">MEASURING INSTRUMENTS</label>
                                    <div class="col-md-6">
                                        <input id="acmeasure" type="text" class="form-control" name="acmeasure" value="{{ $capex->acmeasure}}" required autofocus readonly>
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="acvoltage" class="col-md-4 control-label">VOLTAGE STABILIZERS</label>
                                    <div class="col-md-6">
                                        <input id="acvoltage" type="text" class="form-control" name="acvoltage" value="{{ $capex->acvoltage}}" required autofocus readonly>
                                    </div>
                        </div>
                        <br><br>
                        
                        <div class="row">
                            <label for="acoil" class="col-md-4 control-label">OIL FILTRATION</label>
                                    <div class="col-md-6">
                                        <input id="acoil" type="text" class="form-control" name="acoil" value="{{ $capex->acoil}}" required autofocus readonly>
                                    </div>
                        </div>
                        <br><br>
                        
                        <div class="row">
                            <label for="acmaterial" class="col-md-4 control-label">MATERIAL MOVEMENT REQUIRED</label>
                                    <div class="col-md-6">
                                        <input id="acmaterial" type="text" class="form-control" name="acmaterial" value="{{ $capex->acmaterial}}" required autofocus readonly>
                                    </div>
                        </div><br><br>

                        <div class="row">
                            <label for="accabin" class="col-md-4 control-label">CABIN</label>
                                    <div class="col-md-6">
                                        <input id="accabin" type="text" class="form-control" name="accabin" value="{{ $capex->accabin}}" required autofocus readonly>
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="acfurniture" class="col-md-4 control-label">FURNITURE</label>
                                    <div class="col-md-6">
                                        <input id="acfurniture" type="text" class="form-control" name="acfurniture" value="{{ $capex->acfurniture}}" required autofocus readonly>
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="accivil" class="col-md-4 control-label">CIVIL WORK/AIR LINE CONNECTION</label>
                                    <div class="col-md-6">
                                        <input id="accivil" type="text" class="form-control" name="accivil" value="{{ $capex->accivil}}" required autofocus readonly>
                                    </div>
                        </div>
                        <br><br>

                        <div class="row">
                            <label for="acelectrical" class="col-md-4 control-label">ELECTRICAL WORK</label>
                                    <div class="col-md-6">
                                        <input id="acelectrical" type="text" class="form-control" name="acelectrical" value="{{ $capex->acelectrical}}" required autofocus readonly>
                                    </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('space') ? ' has-error' : '' }}">
                            <label for="space" class="col-md-4 control-label">WHETHER WE HAVE THE REQUIRED POWER & SPACE</label>

                            <div class="col-md-6">
                                        <input id="space" type="text" class="form-control" name="space" value="{{ $capex->space}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('installapprox') ? ' has-error' : '' }}">
                            <label for="installapprox" class="col-md-4 control-label">APPROXIMATE INSTALLATION EXPENSES</label>

                            <div class="col-md-6">
                                <input id="installapprox" type="text" class="form-control" name="installapprox" value="{{ $capex->installapprox}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('travel') ? ' has-error' : '' }}">
                            <label for="travel" class="col-md-4 control-label">TRAVEL EXPENSES – OUR EXECUTIVE</label>

                            <div class="col-md-6">
                                <input id="travel" type="text" class="form-control" name="travel" value="{{ $capex->travel}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('maintenance') ? ' has-error' : '' }}">
                            <label for="agent" class="col-md-4 control-label">APPROXIMATE COST OF MAINTENANCE PER ANNUM</label>

                            <div class="col-md-6">
                                <input id="maintenance" type="text" class="form-control" name="maintenance" value="{{ $capex->maintenance}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('speinstruction') ? ' has-error' : '' }}">
                            <label for="speinstruction" class="col-md-4 control-label">SPECIAL INSTRUCTION TO SALES </label>

                            <div class="col-md-6">
                                <input id="speinstruction" type="text" class="form-control" name="speinstruction" value="{{ $capex->speinstruction}}" required autofocus readonly>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group{{ $errors->has('training') ? ' has-error' : '' }}">
                            <label for="training" class="col-md-4 control-label">TRAINING NEEDS AND APPROXIMATE COST </label>

                            <div class="col-md-6">
                                <input id="training" type="text" class="form-control" name="training" value="{{ $capex->training}}" required autofocus readonly>
                            </div>
                        </div>
                        
                                       
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
