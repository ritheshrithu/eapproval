<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SendApproval;
use App\User;
use App\Forward;
use App\Capex;
use App\CapexForward;
use App\Credit;
use App\CreditForward;
use App\Vendor;
use App\VendorForward;
use App\Dealer;
use App\DealerForward;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\FormRequest;
use App\Http\Requests;
use Storage;
use App\Http\Requests\UploadRequest;

class TrackController extends Controller
{
        public function index()
        {
            if(!Auth::check()) 
            { 
                return redirect('/login');
            }
            else
            {
                return view('forms.status.trackhome');
            }
        }

        public function capexindex()
        {
            if(!Auth::check()) 
            { 
                return redirect('/login');
            }
             else
            {
                $approvals = Capex::where('ref',Auth::user()->roll)->orderBy('created_at','desc')->paginate(10);
                return view('forms.status.capextrack')->with('approvals',$approvals);
            }
        }
        public function capexshow($id)
          {
            $t01 = Capex::where('id',$id)->pluck('ref');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t31 = str_replace('"', '' , $t21);
            
            $t03 = Capex::where('id',$id)->pluck('ref3');
            $t13 = str_replace('[', '' , $t03);
            $t23 = str_replace(']', '' , $t13); 
            $t33 = str_replace('"', '' , $t23); 
            
            $con = $t33.$t31;

            $r1 = CapexForward::where('reference',$con)->pluck('id');
            $r11 = str_replace('[', '' , $r1);
            $r21 = str_replace(']', '' , $r11);
            $r31 = str_replace('"', '' , $r21);
           
            $approvals = CapexForward::find($r31);

                $t01 = Capex::where('reference',$con)->pluck('rec');
                $t11 = str_replace('[', '' , $t01);
                $t21 = str_replace(']', '' , $t11);
                $t31 = str_replace('"', '' , $t21);
                $a =  (int)$t31;
                
                $t02 = Capex::where('reference',$con)->pluck('rec1');
                $t12 = str_replace('[', '' , $t02);
                $t22 = str_replace(']', '' , $t12);
                $t32 = str_replace('"', '' , $t22);
                $b =  (int)$t32;
                
                $t03 = Capex::where('reference',$con)->pluck('rec2');
                $t13 = str_replace('[', '' , $t03);
                $t23 = str_replace(']', '' , $t13);
                $t33 = str_replace('"', '' , $t23);
                $c =  (int)$t33;
                
                $t04 = Capex::where('reference',$con)->pluck('rec3');
                $t14 = str_replace('[', '' , $t04);
                $t24 = str_replace(']', '' , $t14);
                $t34 = str_replace('"', '' , $t24);
                $d =  (int)$t34;

                $u01 = User::where('roll',$a)->pluck('name');
                $u11 = str_replace('[', '' , $u01);
                $u21 = str_replace(']', '' , $u11);
                $u31 = str_replace('"', '' , $u21);
                $a1 =  $u31;

                $v01 = User::where('roll',$b)->pluck('name');
                $v11 = str_replace('[', '' , $v01);
                $v21 = str_replace(']', '' , $v11);
                $v31 = str_replace('"', '' , $v21);
                $b1 =  $v31;

                $w01 = User::where('roll',$c)->pluck('name');
                $w11 = str_replace('[', '' , $w01);
                $w21 = str_replace(']', '' , $w11);
                $w31 = str_replace('"', '' , $w21);
                $c1 =  $w31;

                $x01 = User::where('roll',$d)->pluck('name');
                $x11 = str_replace('[', '' , $x01);
                $x21 = str_replace(']', '' , $x11);
                $x31 = str_replace('"', '' , $x21);
                $d1 =  $x31;

                return view('forms.status.capexshowtrack', array('approvals' => $approvals,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d,'name' => $a1,'name1' => $b1,'name2' => $c1,'name3' => $d1));
          }
          public function creditindex()
          {
            if(!Auth::check()) 
            { 
                return redirect('/login');
            }
             else
            {
                $approvals = Credit::where('ref',Auth::user()->roll)->orderBy('created_at','desc')->paginate(10);
                return view('forms.status.credittrack')->with('approvals',$approvals);
            }
          }
        public function creditshow($id)
          {
            $t01 = Credit::where('id',$id)->pluck('ref');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t31 = str_replace('"', '' , $t21);
            
            $t03 = Credit::where('id',$id)->pluck('ref3');
            $t13 = str_replace('[', '' , $t03);
            $t23 = str_replace(']', '' , $t13); 
            $t33 = str_replace('"', '' , $t23); 
            
            $con = $t33.$t31;

            $r1 = CreditForward::where('reference',$con)->pluck('id');
            $r11 = str_replace('[', '' , $r1);
            $r21 = str_replace(']', '' , $r11);
            $r31 = str_replace('"', '' , $r21);
           
            $approvals = CreditForward::find($r31);

                $t01 = Credit::where('reference',$con)->pluck('rec');
                $t11 = str_replace('[', '' , $t01);
                $t21 = str_replace(']', '' , $t11);
                $t31 = str_replace('"', '' , $t21);
                $a =  (int)$t31;
                
                $t02 = Credit::where('reference',$con)->pluck('rec1');
                $t12 = str_replace('[', '' , $t02);
                $t22 = str_replace(']', '' , $t12);
                $t32 = str_replace('"', '' , $t22);
                $b =  (int)$t32;
                
                $t03 = Credit::where('reference',$con)->pluck('rec2');
                $t13 = str_replace('[', '' , $t03);
                $t23 = str_replace(']', '' , $t13);
                $t33 = str_replace('"', '' , $t23);
                $c =  (int)$t33;
                
                $t04 = Credit::where('reference',$con)->pluck('rec3');
                $t14 = str_replace('[', '' , $t04);
                $t24 = str_replace(']', '' , $t14);
                $t34 = str_replace('"', '' , $t24);
                $d =  (int)$t34;

                $u01 = User::where('roll',$a)->pluck('name');
                $u11 = str_replace('[', '' , $u01);
                $u21 = str_replace(']', '' , $u11);
                $u31 = str_replace('"', '' , $u21);
                $a1 =  $u31;

                 $v01 = User::where('roll',$b)->pluck('name');
                $v11 = str_replace('[', '' , $v01);
                $v21 = str_replace(']', '' , $v11);
                $v31 = str_replace('"', '' , $v21);
                $b1 =  $v31;

                 $w01 = User::where('roll',$c)->pluck('name');
                $w11 = str_replace('[', '' , $w01);
                $w21 = str_replace(']', '' , $w11);
                $w31 = str_replace('"', '' , $w21);
                $c1 =  $w31;

                 $x01 = User::where('roll',$d)->pluck('name');
                $x11 = str_replace('[', '' , $x01);
                $x21 = str_replace(']', '' , $x11);
                $x31 = str_replace('"', '' , $x21);
                $d1 =  $x31;
                return view('forms.status.creditshowtrack', array('approvals' => $approvals,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d,'name' => $a1,'name1' => $b1,'name2' => $c1,'name3' => $d1));
          }

          public function vendorindex()
          {
            if(!Auth::check()) 
            { 
                return redirect('/login');
            }
             else
            {
                $approvals = Vendor::where('ref',Auth::user()->roll)->orderBy('created_at','desc')->paginate(10);
                return view('forms.status.vendortrack')->with('approvals',$approvals);
            }
          }
        public function vendorshow($id)
          {
            $t01 = Vendor::where('id',$id)->pluck('ref');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t31 = str_replace('"', '' , $t21);
            
            $t03 = Vendor::where('id',$id)->pluck('ref3');
            $t13 = str_replace('[', '' , $t03);
            $t23 = str_replace(']', '' , $t13); 
            $t33 = str_replace('"', '' , $t23); 
            
            $con = $t33.$t31;

            $r1 = VendorForward::where('reference',$con)->pluck('id');
            $r11 = str_replace('[', '' , $r1);
            $r21 = str_replace(']', '' , $r11);
            $r31 = str_replace('"', '' , $r21);
           
            $approvals = VendorForward::find($r31);

                $t01 = Vendor::where('reference',$con)->pluck('rec');
                $t11 = str_replace('[', '' , $t01);
                $t21 = str_replace(']', '' , $t11);
                $t31 = str_replace('"', '' , $t21);
                $a =  (int)$t31;
                
                $t02 = Vendor::where('reference',$con)->pluck('rec1');
                $t12 = str_replace('[', '' , $t02);
                $t22 = str_replace(']', '' , $t12);
                $t32 = str_replace('"', '' , $t22);
                $b =  (int)$t32;
                
                $t03 = Vendor::where('reference',$con)->pluck('rec2');
                $t13 = str_replace('[', '' , $t03);
                $t23 = str_replace(']', '' , $t13);
                $t33 = str_replace('"', '' , $t23);
                $c =  (int)$t33;
                
                $t04 = Vendor::where('reference',$con)->pluck('rec3');
                $t14 = str_replace('[', '' , $t04);
                $t24 = str_replace(']', '' , $t14);
                $t34 = str_replace('"', '' , $t24);
                $d =  (int)$t34;

                $u01 = User::where('roll',$a)->pluck('name');
                $u11 = str_replace('[', '' , $u01);
                $u21 = str_replace(']', '' , $u11);
                $u31 = str_replace('"', '' , $u21);
                $a1 =  $u31;

                 $v01 = User::where('roll',$b)->pluck('name');
                $v11 = str_replace('[', '' , $v01);
                $v21 = str_replace(']', '' , $v11);
                $v31 = str_replace('"', '' , $v21);
                $b1 =  $v31;

                 $w01 = User::where('roll',$c)->pluck('name');
                $w11 = str_replace('[', '' , $w01);
                $w21 = str_replace(']', '' , $w11);
                $w31 = str_replace('"', '' , $w21);
                $c1 =  $w31;

                 $x01 = User::where('roll',$d)->pluck('name');
                $x11 = str_replace('[', '' , $x01);
                $x21 = str_replace(']', '' , $x11);
                $x31 = str_replace('"', '' , $x21);
                $d1 =  $x31;
                return view('forms.status.vendorshowtrack', array('approvals' => $approvals,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d,'name' => $a1,'name1' => $b1,'name2' => $c1,'name3' => $d1));
          }     


          public function otherindex()
          {
            if(!Auth::check()) 
            { 
                return redirect('/login');
            }
             else
            {
                $approvals = SendApproval::where('ref',Auth::user()->roll)->orderBy('created_at','desc')->paginate(10);
                return view('forms.status.othertrack')->with('approvals',$approvals);
            }
          }
        public function othershow($id)
        {
            $approvals = SendApproval::find($id);

            if(Auth::user()->roll === $approvals->sen)
            {
            $t01 = SendApproval::where('id',$id)->pluck('ref');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t31 = str_replace('"', '' , $t21);
            
            $t03 = SendApproval::where('id',$id)->pluck('ref3');
            $t13 = str_replace('[', '' , $t03);
            $t23 = str_replace(']', '' , $t13); 
            $t33 = str_replace('"', '' , $t23); 
            
            $con = $t33.$t31;
            $r1 = Forward::where('reference',$con)->pluck('id');
            $r11 = str_replace('[', '' , $r1);
            $r21 = str_replace(']', '' , $r11);
            $r31 = str_replace('"', '' , $r21);

            $approvals = Forward::find($r31);
                $t01 = SendApproval::where('reference',$con)->pluck('rec');
                $t11 = str_replace('[', '' , $t01);
                $t21 = str_replace(']', '' , $t11);
                $t31 = str_replace('"', '' , $t21);
                $a =  (int)$t31;
                
                $t02 = SendApproval::where('reference',$con)->pluck('rec1');
                $t12 = str_replace('[', '' , $t02);
                $t22 = str_replace(']', '' , $t12);
                $t32 = str_replace('"', '' , $t22);
                $b =  (int)$t32;
                
                $t03 = SendApproval::where('reference',$con)->pluck('rec2');
                $t13 = str_replace('[', '' , $t03);
                $t23 = str_replace(']', '' , $t13);
                $t33 = str_replace('"', '' , $t23);
                $c =  (int)$t33;
                
                $t04 = SendApproval::where('reference',$con)->pluck('rec3');
                $t14 = str_replace('[', '' , $t04);
                $t24 = str_replace(']', '' , $t14);
                $t34 = str_replace('"', '' , $t24);
                $d =  (int)$t34;

                $u01 = User::where('roll',$a)->pluck('name');
                $u11 = str_replace('[', '' , $u01);
                $u21 = str_replace(']', '' , $u11);
                $u31 = str_replace('"', '' , $u21);
                $a1 =  $u31;

                 $v01 = User::where('roll',$b)->pluck('name');
                $v11 = str_replace('[', '' , $v01);
                $v21 = str_replace(']', '' , $v11);
                $v31 = str_replace('"', '' , $v21);
                $b1 =  $v31;

                 $w01 = User::where('roll',$c)->pluck('name');
                $w11 = str_replace('[', '' , $w01);
                $w21 = str_replace(']', '' , $w11);
                $w31 = str_replace('"', '' , $w21);
                $c1 =  $w31;

                 $x01 = User::where('roll',$d)->pluck('name');
                $x11 = str_replace('[', '' , $x01);
                $x21 = str_replace(']', '' , $x11);
                $x31 = str_replace('"', '' , $x21);
                $d1 =  $x31;
                return view('forms.status.othershowtrack', array('approvals' => $approvals,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d,'name' => $a1,'name1' => $b1,'name2' => $c1,'name3' => $d1));
                }
                else
                {
                    return back()->with('error','ACCESS DENIED');   
                }
          }


          public function dealerindex()
          {
            if(!Auth::check()) 
            { 
                return redirect('/login');
            }
             else
            {
                $approvals = Dealer::where('ref',Auth::user()->roll)->orderBy('created_at','desc')->paginate(10);
                return view('forms.status.dealertrack')->with('approvals',$approvals);
            }
          }
        public function dealershow($id)
          {
            $t01 = Dealer::where('id',$id)->pluck('ref');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t31 = str_replace('"', '' , $t21);
            
            $t03 = Dealer::where('id',$id)->pluck('ref3');
            $t13 = str_replace('[', '' , $t03);
            $t23 = str_replace(']', '' , $t13); 
            $t33 = str_replace('"', '' , $t23); 
            
            $con = $t33.$t31;

            $r1 = DealerForward::where('reference',$con)->pluck('id');
            $r11 = str_replace('[', '' , $r1);
            $r21 = str_replace(']', '' , $r11);
            $r31 = str_replace('"', '' , $r21);
           
            $approvals = DealerForward::find($r31);

                $t01 = Dealer::where('reference',$con)->pluck('rec');
                $t11 = str_replace('[', '' , $t01);
                $t21 = str_replace(']', '' , $t11);
                $t31 = str_replace('"', '' , $t21);
                $a =  (int)$t31;
                
                $t02 = Dealer::where('reference',$con)->pluck('rec1');
                $t12 = str_replace('[', '' , $t02);
                $t22 = str_replace(']', '' , $t12);
                $t32 = str_replace('"', '' , $t22);
                $b =  (int)$t32;
                
                $t03 = Dealer::where('reference',$con)->pluck('rec2');
                $t13 = str_replace('[', '' , $t03);
                $t23 = str_replace(']', '' , $t13);
                $t33 = str_replace('"', '' , $t23);
                $c =  (int)$t33;
                
                $t04 = Dealer::where('reference',$con)->pluck('rec3');
                $t14 = str_replace('[', '' , $t04);
                $t24 = str_replace(']', '' , $t14);
                $t34 = str_replace('"', '' , $t24);
                $d =  (int)$t34;

                $u01 = User::where('roll',$a)->pluck('name');
                $u11 = str_replace('[', '' , $u01);
                $u21 = str_replace(']', '' , $u11);
                $u31 = str_replace('"', '' , $u21);
                $a1 =  $u31;

                 $v01 = User::where('roll',$b)->pluck('name');
                $v11 = str_replace('[', '' , $v01);
                $v21 = str_replace(']', '' , $v11);
                $v31 = str_replace('"', '' , $v21);
                $b1 =  $v31;

                 $w01 = User::where('roll',$c)->pluck('name');
                $w11 = str_replace('[', '' , $w01);
                $w21 = str_replace(']', '' , $w11);
                $w31 = str_replace('"', '' , $w21);
                $c1 =  $w31;

                 $x01 = User::where('roll',$d)->pluck('name');
                $x11 = str_replace('[', '' , $x01);
                $x21 = str_replace(']', '' , $x11);
                $x31 = str_replace('"', '' , $x21);
                $d1 =  $x31;
                return view('forms.status.dealershowtrack', array('approvals' => $approvals,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d,'name' => $a1,'name1' => $b1,'name2' => $c1,'name3' => $d1));
          }

}
