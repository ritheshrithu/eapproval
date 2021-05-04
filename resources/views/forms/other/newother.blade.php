@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{url('/')}}/oldapprovals/" class="btn btn-info">BACK</a>
    </div><br>
       <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><center><h3>NEW APPROVAL FORM</h3></center></div>
                <div class="container">
                   <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="new3" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('ref') ? ' has-error' : '' }}">
                            
                                <label for="ref" class="col-md-4 control-label">REFERENCE ID</label>
                                    <div class="col-md-3">
                                        <input id="ref" class="form-control" name="ref" value="{{ Auth::user()->roll }}" required  readonly >
                                    </div>

                                    <div class="col-md-3">
                                         <input id="ref2" class="form-control" name="ref2" value="{{ old('sub') }}" required  autofocus >
                                    </div>  
                        </div>

                        <div class="form-group{{ $errors->has('gen') ? ' has-error' : '' }}">
                            <label for="gen" class="col-md-4 control-label">GENERATOR</label>

                            <div class="col-md-6">
                                <input id="gen" type="text" class="form-control" name="gen" value="{{  Auth::user()->name }}" required readonly>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">TITLE</label>

                            <div class="col-md-6">
                                <input id="title" type="dropdown" class="form-control" name="title" value="{{ old('title') }}"  required autofocus>
                            </div>
                        </div>


                         <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="sub" class="col-md-4 control-label">COMMERCIAL (in Rupees)</label>

                            <div class="col-md-6">
                                <input id="sub" type="dropdown" class="form-control" name="sub" value="{{ old('sub') }}" required  autofocus>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('des') ? ' has-error' : '' }}">
                            <label for="des" class="col-md-4 control-label">DESCRIPTION</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor" class="form-control" name="des" value="{{ old('des') }}" required  autofocus></textarea>
                            </div>
                        </div>


                        
                        <div class="form-group{{ $errors->has('md') ? ' has-error' : '' }}" id="doc">
                            <label for="md" class="col-md-4 control-label">MAIN DOCUMENTS</label>

                            <div class="col-md-6">
                                <input id="md" type="file" class="form-control" name="md" value="{{ old('md') }}" onchange="myFunctions(this.value)"  autofocus>
                          
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sd') ? ' has-error' : '' }}" id="doc">
                            <label for="sd" class="col-md-4 control-label">SUPPORTING DOCUMENTS</label>

                            <div class="col-md-6">
                                <input id="sd" type="file" class="form-control" name="sd" value="{{ old('sd') }}" onchange="myFunction(this.value)" autofocus>
               
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('receiver') ? ' has-error' : '' }}">
                            <label for="rec" class="col-md-4 control-label">APPROVING AUTHORITY 1</label>
                            <div class="col-md-6">
                               
                            <select class="form-control" id="rec" name="rec" required> 
                                <option>                        </option>
                                <option>MANAGER - {{ Auth::user()->manager }} - {{ $off1 }} </option>
                                <option>SUPERVISOR - {{ Auth::user()->supervisor }} - {{ $off3 }}</option>
                                <option>PLANTHEAD - {{ Auth::user()->planthead }} - {{ $off4 }}</option>
                                <option>WTD - {{ Auth::user()->vpo }} - {{ $off5 }}</option>
                                <option>EVP & CFO - {{ Auth::user()->vpca }} - {{ $off6 }}</option>
                                <option>DIRECTOR - {{ Auth::user()->director }} - {{ $off7 }}</option>
                            </select>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="form-group{{ $errors->has('receiver') ? ' has-error' : '' }}">
                            <label for="rec1" class="col-md-4 control-label">APPROVING AUTHORITY 2</label>
                            <div class="col-md-6">
                               
                            <select class="form-control" id="rec1" name="rec1">
                                <option>                        </option>
                                <option>MANAGER - {{ Auth::user()->manager }} - {{ $off1 }} </option>
                                <option>SUPERVISOR - {{ Auth::user()->supervisor }} - {{ $off3 }}</option>
                                <option>PLANTHEAD - {{ Auth::user()->planthead }} - {{ $off4 }}</option>
                                <option>WTD - {{ Auth::user()->vpo }} - {{ $off5 }}</option>
                                <option>EVP & CFO - {{ Auth::user()->vpca }} - {{ $off6 }}</option>
                                <option>DIRECTOR - {{ Auth::user()->director }} - {{ $off7 }}</option>
                            </select>
                            </div>
                            
                        </div><hr>
                        <div class="form-group{{ $errors->has('receiver') ? ' has-error' : '' }}">
                            <label for="rec2" class="col-md-4 control-label">APPROVING AUTHORITY 3</label>
                            <div class="col-md-6">
                               
                            <select class="form-control" id="rec2" name="rec2">
                                <option>                        </option>
                                <option>MANAGER - {{ Auth::user()->manager }} - {{ $off1 }} </option>
                                <option>SUPERVISOR - {{ Auth::user()->supervisor }} - {{ $off3 }}</option>
                                <option>PLANTHEAD - {{ Auth::user()->planthead }} - {{ $off4 }}</option>
                                <option>WTD - {{ Auth::user()->vpo }} - {{ $off5 }}</option>
                                <option>EVP & CFO - {{ Auth::user()->vpca }} - {{ $off6 }}</option>
                                <option>DIRECTOR - {{ Auth::user()->director }} - {{ $off7 }}</option>
                            </select>
                           </div>
                        </div><hr>

                        <div class="form-group{{ $errors->has('receiver') ? ' has-error' : '' }}">
                            <label for="rec3" class="col-md-4 control-label">APPROVING AUTHORITY 4</label>
                            <div class="col-md-6">
                            <select class="form-control" id="rec3" name="rec3">
                                <option>                        </option>
                                <option>MANAGER - {{ Auth::user()->manager }} - {{ $off1 }} </option>
                                <option>SUPERVISOR - {{ Auth::user()->supervisor }} - {{ $off3 }}</option>
                                <option>PLANTHEAD - {{ Auth::user()->planthead }} - {{ $off4 }}</option>
                                <option>WTD - {{ Auth::user()->vpo }} - {{ $off5 }}</option>
                                <option>EVP & CFO - {{ Auth::user()->vpca }} - {{ $off6 }}</option>
                                <option>DIRECTOR - {{ Auth::user()->director }} - {{ $off7 }}</option>
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
<script>

    function myFunction(val) 
    {
        var sizes = document.getElementById('sd').files[0].size;
        var val  = (sizes/ 1048576).toFixed(2);
        if(val > 8.00)
        {
            alert("File size exceeded.Upload file less than 8 MB.The Uploaded File size is: " + val + " MB");
        }
    }

    function myFunctions(val) 
    {
        var sizese = document.getElementById('md').files[0].size;
        var vale  = (sizese/ 1048576).toFixed(2);
        if(vale > 8.00)
        {
            alert("File size exceeded.Upload file less than 8 MB.The Uploaded File size is: " + vale + " MB");
        }
    }

</script>


@endsection