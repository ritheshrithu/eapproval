<?php

namespace App\Http\Controllers;
use App\Notifications\Note;
use Illuminate\Notifications\Notification;
use Illuminate\Http\Request;
use App\SendApproval;
use App\Capex;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Storage;
use App\Http\Requests\UploadRequest;
use Illuminate\Notifications\DatabaseNotification;


class AppShowController extends Controller
{
    public function index1()
    {  
        return view('forms.main.generated');
    }

    public function index2()
    {  
        
        $t01 =  User::where('roll',Auth::user()->roll)->pluck('capex');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $note1 = str_replace('"', '' , $t21);

        $t02 =  User::where('roll',Auth::user()->roll)->pluck('credit');
            $t12 = str_replace('[', '' , $t02);
            $t22 = str_replace(']', '' , $t12);
            $note2 = str_replace('"', '' , $t22);

        $t03 =  User::where('roll',Auth::user()->roll)->pluck('vendor');
            $t13 = str_replace('[', '' , $t03);
            $t23 = str_replace(']', '' , $t13);
            $note3 = str_replace('"', '' , $t23);

        $t04 =  User::where('roll',Auth::user()->roll)->pluck('dealer');
            $t14 = str_replace('[', '' , $t04);
            $t24 = str_replace(']', '' , $t14);
            $note4 = str_replace('"', '' , $t24);

        $t05 =  User::where('roll',Auth::user()->roll)->pluck('other');
            $t15 = str_replace('[', '' , $t05);
            $t25 = str_replace(']', '' , $t15);
            $note5 = str_replace('"', '' , $t25);

        return view('forms.main.approvals',array('note1' => $note1,'note2' => $note2,'note3' => $note3,'note4' => $note4,'note5' => $note5));
    }

    public function index3()
    {  
        return view('forms.drafts.drafthome');
    }
}
