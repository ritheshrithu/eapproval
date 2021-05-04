<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Http\FormRequest;
use App\Http\Requests;
use App\SendApproval;
use Storage;
use App\Resend;
use App\Forward;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UploadRequest;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\ApprovalNote;
use App\Notifications\Notify;
use Illuminate\Support\Facades\Input;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\DatabaseNotification;
use Kyslik\ColumnSortable\Sortable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
    $off1 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", DB::table('users')->where('roll',Auth::user()->manager)->pluck('name'));
    $off2 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", DB::table('users')->where('roll',Auth::user()->superuser)->pluck('name'));
    $off3 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", DB::table('users')->where('roll',Auth::user()->supervisor)->pluck('name'));
    $off4 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", DB::table('users')->where('roll',Auth::user()->planthead)->pluck('name'));
    $off5 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", DB::table('users')->where('roll',Auth::user()->vpo)->pluck('name'));
    $off6 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", DB::table('users')->where('roll',Auth::user()->vpca)->pluck('name'));
    $off7 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", DB::table('users')->where('roll',Auth::user()->director)->pluck('name'));
    return view('home', array('off1' => $off1,'off2' => $off2,'off3' => $off3,'off4' => $off4,'off5' => $off5,'off6' => $off6,'off7' => $off7));        
    }
}
