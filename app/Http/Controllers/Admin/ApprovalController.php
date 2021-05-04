<?php

namespace App\Http\Controllers\Admin;
use App\Notifications\Note;
use Illuminate\Notifications\Notification;
use Illuminate\Http\Request;
use App\Forward;
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

class ApprovalController extends Controller
{
    public function index()
    {  
        $approvals = Forward::orderBy('created_at', 'DESC')->get();
        return view('admin.approvals.approvals')->with('approvals',$approvals);
    }


    public function show($id)
    {   
        $approvals = Forward::find($id); 
        return view('admin.approvals.show')->with('approvals',$approvals);
    }
    public function final($id)
    {
        

        $t01 = DB::table('sendapprovals')->where('id',$id)->pluck('ref');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t31 = str_replace('"', '' , $t21);

            $t03 = DB::table('sendapprovals')->where('id',$id)->pluck('ref3');
            $t13 = str_replace('[', '' , $t03);
            $t23 = str_replace(']', '' , $t13); 
            $t33 = str_replace('"', '' , $t23); 
            
            $con = $t33.$t31;
            $r1 = DB::table('forwards')->where('reference',$con)->pluck('id');
            $r11 = str_replace('[', '' , $r1);
            $r21 = str_replace(']', '' , $r11);
            $r31 = str_replace('"', '' , $r21);
           
            $approvals = Forward::find($r31);

                $t01 = DB::table('sendapprovals')->where('reference',$con)->pluck('rec');
                $t11 = str_replace('[', '' , $t01);
                $t21 = str_replace(']', '' , $t11);
                $t31 = str_replace('"', '' , $t21);
                $a =  (int)$t31;
                
                $t02 = DB::table('sendapprovals')->where('reference',$con)->pluck('rec1');
                $t12 = str_replace('[', '' , $t02);
                $t22 = str_replace(']', '' , $t12);
                $t32 = str_replace('"', '' , $t22);
                $b =  (int)$t32;
                
                $t03 = DB::table('sendapprovals')->where('reference',$con)->pluck('rec2');
                $t13 = str_replace('[', '' , $t03);
                $t23 = str_replace(']', '' , $t13);
                $t33 = str_replace('"', '' , $t23);
                $c =  (int)$t33;
                
                $t04 = DB::table('sendapprovals')->where('reference',$con)->pluck('rec3');
                $t14 = str_replace('[', '' , $t04);
                $t24 = str_replace(']', '' , $t14);
                $t34 = str_replace('"', '' , $t24);
                $d =  (int)$t34;


                $u01 = DB::table('users')->where('roll',$a)->pluck('name');
                $u11 = str_replace('[', '' , $u01);
                $u21 = str_replace(']', '' , $u11);
                $u31 = str_replace('"', '' , $u21);
                $a1 =  $u31;

                 $v01 = DB::table('users')->where('roll',$b)->pluck('name');
                $v11 = str_replace('[', '' , $v01);
                $v21 = str_replace(']', '' , $v11);
                $v31 = str_replace('"', '' , $v21);
                $b1 =  $v31;

                 $w01 = DB::table('users')->where('roll',$c)->pluck('name');
                $w11 = str_replace('[', '' , $w01);
                $w21 = str_replace(']', '' , $w11);
                $w31 = str_replace('"', '' , $w21);
                $c1 =  $w31;

                 $x01 = DB::table('users')->where('roll',$d)->pluck('name');
                $x11 = str_replace('[', '' , $x01);
                $x21 = str_replace(']', '' , $x11);
                $x31 = str_replace('"', '' , $x21);
                $d1 =  $x31;




                $pdf = PDF::loadview('final',['approvals' => $approvals,'rec' => $a,'name' => $a1,'name1' => $b1,'name2' => $c1,'name3' => $d1,'rec1' => $b,'rec2' => $c,'rec3' => $d]);
                return $pdf->stream('approval.pdf');
                
    }

          
}
