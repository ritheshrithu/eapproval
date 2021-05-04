<?php

namespace App\Http\Controllers\Admin;
use App\Notifications\Note;
use Illuminate\Notifications\Notification;
use Illuminate\Http\Request;
use App\SendApproval;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Storage;
use App\Http\Requests\UploadRequest;
use Illuminate\Notifications\DatabaseNotification;
use App\Http\Controllers\Controller;
use App\Next;

class ShowController extends Controller
{
    public function index()
    {  
        $approvals = SendApproval::orderBy('created_at', 'DESC')->get();;
        return view('admin.approvals.old')->with('approvals',$approvals);
    }


    public function show($id)
    {   
        $approvals = SendApproval::find($id); 
        return view('admin.approvals.showold')->with('approvals',$approvals);
    }

          
}
