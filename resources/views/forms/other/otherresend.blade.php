@extends('layouts.app')


@section('content')
<div class="container">
     <div class="row"> <a href="{{ url('/') }}/approvals/otherapproval/{{$approvals->id}}" class="btn btn-info">BACK</a></div>
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
               <div class="panel-heading"><center><h3> CORRECTION </h3></center></div>
                    <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="resend3" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('receiver') ? ' has-error' : '' }}">
                            <label for="rec" class="col-md-4 control-label">SENDER</label>
                            <div class="col-md-6">
                                <input id="sen" type="number" class="form-control" name="sen" value="{{Auth::user()->roll }}" readonly>
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('receiver') ? ' has-error' : '' }}">
                            <label for="gen" class="col-md-4 control-label">GENERATOR</label>
                            <div class="col-md-6">
                                <input id="gen" type="text" class="form-control" name="gen" value="{{ $approvals->gen }}" readonly>
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">REFERENCE ID</label>
                                <div class="col-md-2">
                                    <input id="ref" class="form-control" name="ref" value="{{$approvals->ref }}" readonly>
                                </div>

                                <div class="col-md-2">
                                    <input id="ref2" class="form-control" name="ref2" value="{{ $approvals->ref2}}" readonly>
                                </div>

                                <div class="col-md-2">
                                    <input id="ref3" class="form-control" type="number" name="ref3" value="{{ $approvals->ref3 }}" required readonly>   
                                </div>
                        </div>


                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">TITLE</label>

                            <div class="col-md-6">
                                <input id="title" class="form-control" name="title" value="{{ $approvals->title }}" required readonly></input>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sub') ? ' has-error' : '' }}">
                            <label for="sub" class="col-md-4 control-label">COMMITMENT (in Rupees)</label>

                            <div class="col-md-6">
                                <input id="sub" class="form-control" name="sub" value="{{ $approvals->sub }}" required readonly></input>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('des') ? ' has-error' : '' }}">
                            <label for="des" class="col-md-4 control-label">DESCRIPTION</label>

                            <div class="col-md-6">
                                <textarea id="ckeditor" class="form-control" name="des" required autofocus></textarea>
                            </div>
                        </div>

                            

                        <div class="form-group{{ $errors->has('md') ? ' has-error' : '' }}">
                            <label for="md" class="col-md-4 control-label">MAIN DOCUMENTS</label>

                            <div class="col-md-6">
                                <input id="md" type="file" class="form-control" name="md" autofocus>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sd') ? ' has-error' : '' }}">
                            <label for="sd" class="col-md-4 control-label">SUPPORTING DOCUMENTS</label>

                            <div class="col-md-6">
                                <input id="sd" type="file" class="form-control" name="sd" autofocus>

                            </div>
                        </div>

                        <!--div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">RECEIVER</label>

                            <div class="col-md-6">
                                <input id="gen" class="form-control" name="gen" value="{{ $approvals->rec }}" required readonly></input>
                            </div>
                        </div--->


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
@endsection
