<?php

namespace App\Http\Controllers;

use App\vendor;
use App\vendorForward;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Http\FormRequest;
use App\Http\Requests;
use Storage;
use App\Resend;
use App\Forward;
use App\Mail\Vendors;
use App\Mail\VendorApproval;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\UploadRequest;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\ApprovalNote;
use App\Notifications\Notify;
use App\Notifications\MailNotification;
use App\Notifications\ResendNotification;
use Illuminate\Support\Facades\Input;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Notifications\DatabaseNotification;
use Kyslik\ColumnSortable\Sortable;
use RealRashid\SweetAlert\Toaster;

class VendorController extends Controller
{
    
    public function home()
    {
        if(!Auth::check()) 
            { 
                return redirect('/login');
            }
            else
            {
                 $vendor = Vendor::sortable()->where('ref',Auth::user()->roll)->orderBy('created_at','desc')->paginate(5);
        return view('forms.vendor.vendorhomesen',array('vendor' => $vendor));
            }
       
    }
    public function homerec()
    {
        if(!Auth::check()) 
            { 
                return redirect('/login');
            }
        else
        {
        $vendor = VendorForward::sortable()->orderBy('created_at','desc')->paginate(5);

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

        return view('forms.vendor.vendorhomerec',array('vendor' => $vendor,'note1' => $note1,'note2' => $note2,'note3' => $note3,'note4' => $note4,'note5' => $note5));
        }
    }
    public function index()
    {
    $off1 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->manager)->pluck('name'));
    $off2 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->superuser)->pluck('name'));
    $off3 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->supervisor)->pluck('name'));
    $off4 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->planthead)->pluck('name'));
    $off5 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->vpo)->pluck('name'));
    $off6 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->vpca)->pluck('name'));
    $off7 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->director)->pluck('name'));
    return view('forms.vendor.newvendor', array('off1' => $off1,'off2' => $off2,'off3' => $off3,'off4' => $off4,'off5' => $off5,'off6' => $off6,'off7' => $off7));
    }
     public function indexcorrect($id)
    {
        $t01 = VendorForward::where('id',$id)->pluck('ref');
        $t11 = str_replace('[', '' , $t01);
        $t21 = str_replace(']', '' , $t11);
        $t31 = str_replace('"', '' , $t21);
        $a =  $t31;

        $t02 = VendorForward::where('id',$id)->pluck('ref3');
        $t12 = str_replace('[', '' , $t02);
        $t22 = str_replace(']', '' , $t12);
        $t32 = str_replace('"', '' , $t22);
        $b =  $t32;

        $forward = $b.$a;

        $vendor = Vendor::where('reference',$forward)->first();
       
    $off1 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->manager)->pluck('name'));
    $off2 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->superuser)->pluck('name'));
    $off3 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->supervisor)->pluck('name'));
    $off4 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->planthead)->pluck('name'));
    $off5 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->vpo)->pluck('name'));
    $off6 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->vpca)->pluck('name'));
    $off7 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->director)->pluck('name'));
    return view('forms.vendor.newvendorcorrect', array('vendor'=> $vendor,'off1' => $off1,'off2' => $off2,'off3' => $off3,'off4' => $off4,'off5' => $off5,'off6' => $off6,'off7' => $off7));
    }
    public function store(Request $request)
    {
        if($request->hasFile('doc1'))
        {
            $id =Auth::user()->roll;
            $filenameWithExt = $request->file('doc1')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension = $request->file('doc1')->getClientOriginalExtension();
            $fsname = $filename.'_'.$id.'.'.$extension;
            $fsize = $request->file('doc1')->getClientSize();
            $path = $request->file('doc1')->storeAs('public/docs',$fsname);
        }
        else
        {
            $fsname = "NO FILE ATTACHED";
             $fsize=0;
        }
        if($request->hasFile('doc2'))
        {
            $filenameWithExt = $request->file('doc2')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension = $request->file('doc2')->getClientOriginalExtension();
            $fsname1 = $filename.'_'.$id.'.'.$extension;
            $fsize1 = $request->file('doc2')->getClientSize();
            $path = $request->file('doc2')->storeAs('public/docs',$fsname1);
        }
        else
        {
            $fsname1 = "NO FILE ATTACHED";
            $fsize1=0;
        }
        if($request->hasFile('doc3'))
        {
            $filenameWithExt = $request->file('doc3')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension = $request->file('doc3')->getClientOriginalExtension();
            $fsname2 = $filename.'_'.$id.'.'.$extension;
            $fsize2 = $request->file('doc3')->getClientSize();
            $path = $request->file('doc3')->storeAs('public/docs',$fsname2);
        }
        else
        {
            $fsname2 = "NO FILE ATTACHED";
            $fsize2=0;
        }
        if($fsize > 8000000 || $fsize1 > 8000000 || $fsize2 > 8000000)
        {
            return back()->with('error','FILE SHOULD NOT EXCEED 8MB');   
        }
        $approval = new Vendor;        
        $approval->sen = Auth::user()->roll;
        $approval->gen = Auth::user()->name;
        $approval->ref = Auth::user()->roll;
        $approval->ref2 = "VENDOR";
        $approval->ref3 = Carbon::now()->format('dmHi');
        //FORMING A UNIQUE REFERENCE FOR THE CURRENT APPROVAL
            $a =  Auth::user()->roll;
            $c =  Carbon::now()->format('dmHi');
            $conc = ($c.$a);
        $approval->reference = $conc;
            $approval->location = $request->location;
            $approval->vendorcode = $request->vendorcode;
            $approval->paymentterms = $request->paymentterms;
            $approval->currency = $request->currency;
            $approval->paymentmode = $request->paymentmode;
            $approval->class = $request->class;
            $approval->name = $request->name;
            $approval->address1 = $request->address1;
            $approval->address2 = $request->address2;
            $approval->address3 = $request->address3;
            $approval->city = $request->city;
            $approval->country = $request->country;
            $approval->state = $request->state;
            $approval->pincode = $request->pincode;
            $approval->phone = $request->phone;
            $approval->fax = $request->fax;
            $approval->email = $request->email;
            $approval->proposed = $request->proposed;
            $approval->justification = $request->justification;
            $approval->paymentofterm = $request->paymentofterm;
            $approval->referenceif = $request->referenceif;
            $approval->pan = $request->pan;
            $approval->esi = $request->esi;
            $approval->vendortype = $request->vendortype;
            $approval->gststate = $request->gststate;
            $approval->gstin = $request->gstin;
            $approval->hsncode = $request->hsncode;
            $approval->saccode = $request->saccode;
            $approval->rec = $request->rec;
            $approval->rec1 = $request->rec1;
            $approval->rec2 = $request->rec2;
            $approval->rec3 = $request->rec3;
            $approval->doc1 = $fsname;
            $approval->doc2 = $fsname1;
            $approval->doc3 = $fsname2;

//GENERATOR SELECTS THE RECEIVER (HIS SUPERIORS)
        //MANAGER
        

        $manager = preg_replace("/[^0-9]/","",$request->rec);
        $manager1 = preg_replace("/[^0-9]/","",$request->rec1);
        $manager2 = preg_replace("/[^0-9]/","",$request->rec2);
        $manager3 = preg_replace("/[^0-9]/","",$request->rec3);
        if($manager === Auth::user()->manager)
        {
             $approval->rec = Auth::user()->manager;
             
        }
        if($manager1 === Auth::user()->manager)
        {
             $approval->rec1 = Auth::user()->manager;   
        }
        if($manager2 === Auth::user()->manager)
        {
             $approval->rec2 = Auth::user()->manager;   
        }
        if($manager3 === Auth::user()->manager)
        {
             $approval->rec3 = Auth::user()->manager;   
        }

        //SUPERUSER
        $superuser = preg_replace("/[^0-9]/","",$request->rec);
        $superuser1 = preg_replace("/[^0-9]/","",$request->rec1);
        $superuser2 = preg_replace("/[^0-9]/","",$request->rec2);
        $superuser3 = preg_replace("/[^0-9]/","",$request->rec3);

        if($superuser === Auth::user()->superuser)
        {
             $approval->rec = Auth::user()->superuser;   
        }
        if($superuser1 === Auth::user()->superuser)
        {
             $approval->rec1 = Auth::user()->superuser;   
        }
        if($superuser2 === Auth::user()->superuser)
        {
             $approval->rec2 = Auth::user()->superuser;   
        }
        if($superuser3 === Auth::user()->superuser)
        {
             $approval->rec3 = Auth::user()->superuser;   
        }

        //SUPERVISOR
        $supervisor = preg_replace("/[^0-9]/","",$request->rec);
        $supervisor1 = preg_replace("/[^0-9]/","",$request->rec1);
        $supervisor2 = preg_replace("/[^0-9]/","",$request->rec2);
        $supervisor3 = preg_replace("/[^0-9]/","",$request->rec3);

        if($supervisor === Auth::user()->supervisor)
        {
             $approval->rec = Auth::user()->supervisor;   
        }
        if($supervisor1 === Auth::user()->supervisor)
        {
             $approval->rec1 = Auth::user()->supervisor;   
        }
        if($supervisor2 === Auth::user()->supervisor)
        {
             $approval->rec2 = Auth::user()->supervisor;   
        }
        if($supervisor3 === Auth::user()->supervisor)
        {
             $approval->rec3 = Auth::user()->supervisor;   
        }

        //PLANTHEAD
        $planthead = preg_replace("/[^0-9]/","",$request->rec);
        $planthead1 = preg_replace("/[^0-9]/","",$request->rec1);
        $planthead2 = preg_replace("/[^0-9]/","",$request->rec2);
        $planthead3 = preg_replace("/[^0-9]/","",$request->rec3);

        if($planthead === Auth::user()->planthead)
        {
             $approval->rec = Auth::user()->planthead;   
        }
        if($planthead1 === Auth::user()->planthead)
        {
             $approval->rec1 = Auth::user()->planthead;   
        }
        if($planthead2 === Auth::user()->planthead)
        {
             $approval->rec2 = Auth::user()->planthead;   
        }
        if($planthead3 === Auth::user()->planthead)
        {
             $approval->rec3 = Auth::user()->planthead;   
        }

        //VPO
        $vpo = preg_replace("/[^0-9]/","",$request->rec);
        $vpo1 = preg_replace("/[^0-9]/","",$request->rec1);
        $vpo2 = preg_replace("/[^0-9]/","",$request->rec2);
        $vpo3 = preg_replace("/[^0-9]/","",$request->rec3);

        if($vpo === Auth::user()->vpo)
        {
             $approval->rec = Auth::user()->vpo;   
        }
        if($vpo1 === Auth::user()->vpo)
        {
             $approval->rec1 = Auth::user()->vpo;   
        }
        if($vpo2 === Auth::user()->vpo)
        {
             $approval->rec2 = Auth::user()->vpo;   
        }
        if($vpo3 === Auth::user()->vpo)
        {
             $approval->rec3 = Auth::user()->vpo;   
        }

        //PLANTHEAD
        $vpca = preg_replace("/[^0-9]/","",$request->rec);
        $vpca1 = preg_replace("/[^0-9]/","",$request->rec1);
        $vpca2 = preg_replace("/[^0-9]/","",$request->rec2);
        $vpca3 = preg_replace("/[^0-9]/","",$request->rec3);

        if($vpca === Auth::user()->vpca)
        {
             $approval->rec = Auth::user()->vpca;   
        }
        if($vpca1 === Auth::user()->vpca)
        {
             $approval->rec1 = Auth::user()->vpca;   
        }
        if($vpca2 === Auth::user()->vpca)
        {
             $approval->rec2 = Auth::user()->vpca;   
        }
        if($vpca3 === Auth::user()->vpca)
        {
             $approval->rec3 = Auth::user()->vpca;   
        }

        //DIRECTOR
        $director = preg_replace("/[^0-9]/","",$request->rec);
        $director1 = preg_replace("/[^0-9]/","",$request->rec1);
        $director2 = preg_replace("/[^0-9]/","",$request->rec2);
        $director3 = preg_replace("/[^0-9]/","",$request->rec3);

        if($director === Auth::user()->director)
        {
             $approval->rec = Auth::user()->director;   
        }
        if($director1 === Auth::user()->director)
        {
             $approval->rec1 = Auth::user()->director;   
        }
        if($director2 === Auth::user()->director)
        {
             $approval->rec2 = Auth::user()->director;   
        }
        if($director3 === Auth::user()->director)
        {
             $approval->rec3 = Auth::user()->director;   
        }


        //NULL
        if($request->rec1 === null)
        {
             $approval->rec1 = 0;   
        }
        
        if($request->rec2 === null)
        {
             $approval->rec2 = 0;   
        }        

        if($request->rec3 === null)
        {
             $approval->rec3 = 0;   
        }
//END
//SELECTING RECEIVERS IN WRONG MANNER
        if($request->rec2 === null && $request->rec3 !== null || 
           $request->rec2 === null && $request->rec4 !== null || 
           $request->rec3 === null && $request->rec4 !== null )
        {
            return redirect('/vendorapproval')->with('error',"CHOOSE RECEIVERS CORRECTLY"); 
        }
//DIRECTOR IS THE FINAL APPROVER
        if($request->rec === "DIRECTOR" && $request->rec1 !== null || 
           $request->rec === "DIRECTOR" && $request->rec2 !== null ||
           $request->rec === "DIRECTOR" && $request->rec3 !== null )
        {
             return redirect('/vendorapproval')->with('error','DIRECTOR HAS TO APPROVE FINALLY');  
        }
       $approval->save();

//vendorEFORWARDS TABLE CONTENT

       if($request->hasFile('doc1'))
        {
            $id =Auth::user()->roll;
            $filenameWithExt = $request->file('doc1')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension = $request->file('doc1')->getClientOriginalExtension();
            $fsname = $filename.'_'.$id.'.'.$extension;
            $fsize = $request->file('doc1')->getClientSize();
            $path = $request->file('doc1')->storeAs('public/docs',$fsname);
        }
        else
        {
            $fsname = "NO FILE ATTACHED";
             $fsize=0;
        }
        if($request->hasFile('doc2'))
        {
            $filenameWithExt = $request->file('doc2')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension = $request->file('doc2')->getClientOriginalExtension();
            $fsname1 = $filename.'_'.$id.'.'.$extension;
            $fsize1 = $request->file('doc2')->getClientSize();
            $path = $request->file('doc2')->storeAs('public/docs',$fsname1);
        }
        else
        {
            $fsname1 = "NO FILE ATTACHED";
            $fsize1=0;
        }
        if($request->hasFile('doc3'))
        {
            $filenameWithExt = $request->file('doc3')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension = $request->file('doc3')->getClientOriginalExtension();
            $fsname2 = $filename.'_'.$id.'.'.$extension;
            $fsize2 = $request->file('doc3')->getClientSize();
            $path = $request->file('doc3')->storeAs('public/docs',$fsname2);
        }
        else
        {
            $fsname2 = "NO FILE ATTACHED";
            $fsize2=0;
        }

        if($fsize > 8000000 || $fsize1 > 8000000 || $fsize2 > 8000000)
        {
            return back()->with('error','FILE SHOULD NOT EXCEED 8MB');   
        }

        $approval = new VendorForward;        
        $approval->sen = Auth::user()->roll;
        $approval->gen = Auth::user()->name;
        $approval->ref = Auth::user()->roll;
        $approval->ref2 = "VENDOR";
        $approval->ref3 = Carbon::now()->format('dmHi');
        //FORMING A UNIQUE REFERENCE FOR THE CURRENT APPROVAL
            $a =  Auth::user()->roll;
            $c =  Carbon::now()->format('dmHi');
            $conc = ($c.$a);
        $approval->reference = $conc;
            $approval->location = $request->location;
            $approval->vendorcode = $request->vendorcode;
            $approval->paymentterms = $request->paymentterms;
            $approval->currency = $request->currency;
            $approval->paymentmode = $request->paymentmode;
            $approval->class = $request->class;
            $approval->name = $request->name;
            $approval->address1 = $request->address1;
            $approval->address2 = $request->address2;
            $approval->address3 = $request->address3;
            $approval->city = $request->city;
            $approval->country = $request->country;
            $approval->state = $request->state;
            $approval->pincode = $request->pincode;
            $approval->phone = $request->phone;
            $approval->fax = $request->fax;
            $approval->email = $request->email;
            $approval->proposed = $request->proposed;
            $approval->justification = $request->justification;
            $approval->paymentofterm = $request->paymentofterm;
            $approval->referenceif = $request->referenceif;
            $approval->pan = $request->pan;
            $approval->esi = $request->esi;
            $approval->vendortype = $request->vendortype;
            $approval->gststate = $request->gststate;
            $approval->gstin = $request->gstin;
            $approval->hsncode = $request->hsncode;
            $approval->saccode = $request->saccode;
            $approval->doc1 = $fsname;
            $approval->doc2 = $fsname1;
            $approval->doc3 = $fsname2;

        //MANAGER
        $manager = preg_replace("/[^0-9]/","",$request->rec);
        if($manager === Auth::user()->manager)
        {
             $approval->rec = Auth::user()->manager;
        }
        //SUPERUSER
        $superuser = preg_replace("/[^0-9]/","",$request->rec);
        if($superuser === Auth::user()->superuser)
        {
             $approval->rec = Auth::user()->superuser;   
        }
        //SUPERVISOR
        $supervisor = preg_replace("/[^0-9]/","",$request->rec);
        if($supervisor === Auth::user()->supervisor)
        {
             $approval->rec = Auth::user()->supervisor;   
        }
        //PLANTHEAD
        $planthead = preg_replace("/[^0-9]/","",$request->rec);
        if($planthead === Auth::user()->planthead)
        {
             $approval->rec = Auth::user()->planthead;   
        }
        //VPO
        $vpo = preg_replace("/[^0-9]/","",$request->rec);
        if($vpo === Auth::user()->vpo)
        {
             $approval->rec = Auth::user()->vpo;   
        }
        //VPCA
        $vpca = preg_replace("/[^0-9]/","",$request->rec);
        if($vpca === Auth::user()->vpca)
        {
             $approval->rec = Auth::user()->vpca;   
        }
        //DIRECTOR
        $director = preg_replace("/[^0-9]/","",$request->rec);
        if($director === Auth::user()->director)
        {
             $approval->rec = Auth::user()->director;   
        }

        
        $t01 = User::where('roll',$approval->rec)->pluck('id');
        $t11 = str_replace('[', '' , $t01);
        $t21 = str_replace(']', '' , $t11);
        $t22 = str_replace('"', '' , $t21);
        $a =  $t22;
         $c01 = User::where('roll',$approval->rec)->pluck('vendor');
        $c11 = str_replace('[', '' , $c01);
        $c21 = str_replace(']', '' , $c11);
        $c31 = (int)str_replace('"', '' , $c21);
        if($c31 === null)
        {
            User::where('roll',$approval->rec)->update(array('vendor' => 1));
        }
        else
        {
            $count = $c31+1;
            User::where('roll',$approval->rec)->update(array('vendor' => ($count)));
        }
        $approval->save(); 
        $user = User::find($a);
        //echo $user;
        $user->notify(new ApprovalNote($approval));  
        alert()->success('SUCCESS','APPROVAL SENT SUCCESSFULLY');
       return redirect('/oldapprovals/vendorapproval/')->with('success','APPROVAL SENT SUCCESSFULLY');  
    }
//FOR SENDER IN OLD APPROVALS -> vendor APPROVALS PANEL
    public function showold($id)
    {
        $vendor = Vendor::find($id);
        if(Auth::user()->roll === $vendor->ref)
            {
                return view('forms.vendor.showvendorsen',array('vendor' => $vendor));
            }
        else
            {
                return redirect('/vendorapproval')->with('error','NO ACCESS TO THIS PAGE');
            }
    } 
//FOR RECEIVER IN APPROVALS->vendor APPROVALS PANEL
    public function display($id)
    {
        $vendor = VendorForward::find($id);
//TO FIND THE RECEIVERS OF THE CURRENT APPROVAL
        //$t01 = DB::table('sendapprovals')->where('reference',$approvals->reference)->pluck('rec');
        $t01 = Vendor::where('reference',$vendor->reference)->pluck('rec');
        $t11 = str_replace('[', '' , $t01);
        $t21 = str_replace(']', '' , $t11);
        $t31 = str_replace('"', '' , $t21);
        $a =  $t31;
                
        $t02 = Vendor::where('reference',$vendor->reference)->pluck('rec1');
        $t12 = str_replace('[', '' , $t02);
        $t22 = str_replace(']', '' , $t12);
        $t32 = str_replace('"', '' , $t22);
        $b =  $t32;
                
        $t03 = Vendor::where('reference',$vendor->reference)->pluck('rec2');
        $t13 = str_replace('[', '' , $t03);
        $t23 = str_replace(']', '' , $t13);
        $t33 = str_replace('"', '' , $t23);
        $c =  $t33;
                
        $t04 = Vendor::where('reference',$vendor->reference)->pluck('rec3');
        $t14 = str_replace('[', '' , $t04);
        $t24 = str_replace(']', '' , $t14);
        $t34 = str_replace('"', '' , $t24);
        $d =  $t34;

//END
//CHECHING IF THE CURRENT USER IS A RECEIVER OF CURRENT APPROVAL
        if(Auth::user()->roll === $a)
            {   
                $t01 = User::where('roll',$vendor->rec)->pluck('id');
                $t11 = str_replace('[', '' , $t01);
                $t21 = str_replace(']', '' , $t11);
                $t31 = str_replace('"', '' , $t21);
                $user1 = $t31;
                $user = User::find($user1);
                if(count($user->unreadNotifications) > 0)
                {
                    $user->unreadNotifications->first()->markAsRead(); 
                }
                else
                {
                    $user->unreadNotifications->markAsRead();   
                }
                $c01 = User::where('roll',$vendor->rec)->pluck('vendor');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 !== null)
                {
                   $count = $c31-1;
                   if($count > 0)
                   {
                        User::where('roll',$vendor->rec)->update(array('vendor' => ($count)));
                   }
                   else{
                    User::where('roll',$vendor->rec)->update(array('vendor' => (null)));
                }  
                    
                } 
                else{
                    User::where('roll',$vendor->rec)->update(array('vendor' => (null)));
                }       
                 VendorForward::where('reference',$vendor->reference)->update(array('readat1' => Carbon::now()));
                return view('forms.vendor.showvendorrec', array('vendor' => $vendor,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d));
            }

        elseif(Auth::user()->roll === $b)
            {

                $u01 = User::where('roll',$vendor->rec1)->pluck('id');
                $u11 = str_replace('[', '' , $u01);
                $u21 = str_replace(']', '' , $u11);
                $u22 = str_replace('"', '' , $u21);
                $user2 = $u22;
                $user = User::find($user2);
                if(count($user->unreadNotifications) > 0)
                {
                    $user->unreadNotifications->first()->markAsRead(); 
                }
                else
                {
                    $user->unreadNotifications->markAsRead();   
                }
                $c01 = User::where('roll',$vendor->rec1)->pluck('vendor');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 !== null)
                {
                   $count = $c31-1;
                   if($count > 0)
                   {
                        User::where('roll',$vendor->rec1)->update(array('vendor' => ($count)));
                   }
                   else{
                    User::where('roll',$vendor->rec1)->update(array('vendor' => (null)));
                }  
                    
                } 
                else{
                    User::where('roll',$vendor->rec1)->update(array('vendor' => (null)));
                } 
                VendorForward::where('reference',$vendor->reference)->update(array('readat2' => Carbon::now()));
                return view('forms.vendor.showvendorrec', array('vendor' => $vendor,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d));
            }
        elseif(Auth::user()->roll === $c)
            {
                $v01 = User::where('roll',$vendor->rec2)->pluck('id');
                $v11 = str_replace('[', '' , $v01);
                $v21 = str_replace(']', '' , $v11);
                $v22 = str_replace('"', '' , $v21);
                $user3 = $v22;
                $user = User::find($user3);
                if(count($user->unreadNotifications) > 0)
                {
                    $user->unreadNotifications->first()->markAsRead(); 
                }
                else
                {
                    $user->unreadNotifications->markAsRead();   
                }
                $c01 = User::where('roll',$vendor->rec2)->pluck('vendor');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 !== null)
                {
                   $count = $c31-1;
                   if($count > 0)
                   {
                        User::where('roll',$vendor->rec2)->update(array('vendor' => ($count)));
                   }
                   else{
                    User::where('roll',$vendor->rec2)->update(array('vendor' => (null)));
                }  
                    
                } 
                else{
                    User::where('roll',$vendor->rec2)->update(array('vendor' => (null)));
                } 
                VendorForward::where('reference',$vendor->reference)->update(array('readat3' => Carbon::now()));
                return view('forms.vendor.showvendorrec', array('vendor' => $vendor,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d));
            }
        elseif(Auth::user()->roll === $d)
            {
                $w01 = User::where('roll',$vendor->rec3)->pluck('id');
                $w11 = str_replace('[', '' , $w01);
                $w21 = str_replace(']', '' , $w11);
                $w22 = str_replace('"', '' , $w21);
                $user4 = $w22;
                $user = User::find($user4);
                if(count($user->unreadNotifications) > 0)
                {
                    $user->unreadNotifications->first()->markAsRead(); 
                }
                else
                {
                    $user->unreadNotifications->markAsRead();   
                }
                $c01 = User::where('roll',$vendor->rec3)->pluck('vendor');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 !== null)
                {
                   $count = $c31-1;
                   if($count > 0)
                   {
                        User::where('roll',$vendor->rec3)->update(array('vendor' => ($count)));
                   }
                   else{
                    User::where('roll',$vendor->rec3)->update(array('vendor' => (null)));
                }  
                    
                } 
                else{
                    User::where('roll',$vendor->rec)->update(array('vendor' => (null)));
                } 
                VendorForward::where('reference',$vendor->reference)->update(array('readat4' => Carbon::now()));
                return view('forms.vendor.showvendorrec', array('vendor' => $vendor,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d));
            }
        else
            {

                 $x01 = User::where('roll',$vendor->ref)->pluck('id');
                $x11 = str_replace('[', ' ' , $x01);
                $x21 = str_replace(']', ' ' , $x11);
                $x22 = str_replace('"', '' , $x21);
                $user5 = $x22;
                $user = User::find($user5);
                if(count($user->unreadNotifications) > 0)
                {
                    $user->unreadNotifications->first()->markAsRead(); 
                }
                else
                {
                    $user->unreadNotifications->markAsRead();   
                }
                
                $u01 = User::where('roll',$vendor->sen)->pluck('name');
                $u11 = str_replace('[', '' , $u01);
                $u21 = str_replace(']', '' , $u11);
                $u31 = str_replace('"', '' , $u21);
                $user2 =  $u31;

                $c01 = User::where('roll',$vendor->rec)->pluck('vendor');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);

                $t01 = User::where('roll',$vendor->rec)->pluck('id');
                $t11 = str_replace('[', '' , $t01);
                $t21 = str_replace(']', '' , $t11);
                $t31 = str_replace('"', '' , $t21);
                $user1 = $t31;
                $user = User::find($user1);
                if(count($user->unreadNotifications) > 0)
                {
                    $user->unreadNotifications->first()->markAsRead(); 
                }
                else
                {
                    $user->unreadNotifications->markAsRead();   
                }
                if($c31 !== null)
                {
                   $count = $c31-1;
                   if($count > 0)
                   {
                        User::where('roll',$vendor->rec)->update(array('vendor' => ($count)));
                   }
                   else{
                    User::where('roll',$vendor->rec)->update(array('vendor' => (null)));
                }  
                    
                } 
                else{
                    User::where('roll',$vendor->rec)->update(array('vendor' => (null)));
                }       
                return view('forms.vendor.showvendorresend', array('vendor' => $vendor,'user' => $user2,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d));
            
                
            }

    }
        public function PDF($id)
    {
        
        $t01 =Vendor::where('id',$id)->pluck('ref');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t31 = str_replace('"', '' , $t21);

            $t03 = Vendor::where('id',$id)->pluck('ref3');
            $t13 = str_replace('[', '' , $t03);
            $t23 = str_replace(']', '' , $t13); 
            $t33 = str_replace('"', '' , $t23); 
            
            $con = $t33.$t31;
            $r1 = Vendor::where('reference',$con)->pluck('id');
            $r11 = str_replace('[', '' , $r1);
            $r21 = str_replace(']', '' , $r11);
            $r31 = str_replace('"', '' , $r21);
           
            $vendor = Vendor::find($r31);

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
                
                $pdf = PDF::loadview('forms.vendor.vendorpdf',['vendor' => $vendor,'rec' => $a,'name' => $a1,'name1' => $b1,'name2' => $c1,'name3' => $d1,'rec1' => $b,'rec2' => $c,'rec3' => $d]);
                return $pdf->stream('vendorapproval.pdf');
       
    }

    public function forward($id)
    {
        $vendor = VendorForward::find($id);
        return view('forms.vendor.vendorforwards')->with('vendor',$vendor);
    }

    public function forwardsend(Request $request,$id)
    {
        if($request->hasFile('doc1'))
        {
            $filenameWithExt = $request->file('doc1')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension = $request->file('doc1')->getClientOriginalExtension();
            $fsname = $filename.'.'.$extension;
            $fsize = $request->file('doc1')->getClientSize();
            $path = $request->file('doc1')->storeAs('public/docs',$fsname);
            $approval = VendorForward::where('id',$id)->update(array('doc1' => $fsname));
        }
        else
        {
            $fsname = "NO FILE ATTACHED";
             $fsize=0;
        }
        if($request->hasFile('doc2'))
        {   
            $filenameWithExt = $request->file('doc2')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension = $request->file('doc2')->getClientOriginalExtension();
            $fsname1 = $filename.'.'.$extension;
            $fsize1 = $request->file('doc2')->getClientSize();
            $path = $request->file('doc2')->storeAs('public/docs',$fsname1);
            $approval = VendorForward::where('id',$id)->update(array('doc2' => $fsname1));
        }
        else
        {
            $fsname1 = "NO FILE ATTACHED";
            $fsize1=0;
        }
        if($request->hasFile('doc3'))
        {   
           
            $filenameWithExt = $request->file('doc3')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension = $request->file('doc3')->getClientOriginalExtension();
            $fsname2 = $filename.'.'.$extension;
            $fsize2 = $request->file('doc3')->getClientSize();
            $path = $request->file('doc3')->storeAs('public/docs',$fsname1);
            $approval = VendorForward::where('id',$id)->update(array('doc3' => $fsname1));
        }
        else
        {
            $fsname2 = "NO FILE ATTACHED";
            $fsize2=0;
        }
        if($fsize > 8000000 || $fsize1 > 8000000 || $fsize2 > 8000000)
        {
            return back()->with('error','FILE SHOULD NOT EXCEED 10MB');   
        }
        $approval = new VendorForward;
        $approval->sen = Auth::user()->roll;
        $approval->gen = $request->gen;
        $approval->ref = $request->ref;
        $approval->ref2 = $request->ref;
        $approval->ref3 = $request->ref3;
        //FORMING A UNIQUE REFERENCE FOR THE CURRENT APPROVAL
            $a =  $request->ref;
            $c =  $request->ref3;
            $conc = ($c.$a);
            $approval->reference = $conc;
            $approval->location = $request->location;
            $approval->vendorcode = $request->vendorcode;
            $approval->paymentterms = $request->paymentterms;
            $approval->currency = $request->currency;
            $approval->paymentmode = $request->paymentmode;
            $approval->class = $request->class;
            $approval->name = $request->name;
            $approval->address1 = $request->address1;
            $approval->address2 = $request->address2;
            $approval->address3 = $request->address3;
            $approval->city = $request->city;
            $approval->country = $request->country;
            $approval->state = $request->state;
            $approval->pincode = $request->pincode;
            $approval->phone = $request->phone;
            $approval->fax = $request->fax;
            $approval->email = $request->email;
            $approval->proposed = $request->proposed;
            $approval->justification = $request->justification;
            $approval->paymentofterm = $request->paymentofterm;
            $approval->referenceif = $request->referenceif;
            $approval->pan = $request->pan;
            $approval->esi = $request->esi;
            $approval->vendortype = $request->vendortype;
            $approval->gststate = $request->gststate;
            $approval->gstin = $request->gstin;
            $approval->hsncode = $request->hsncode;
            $approval->saccode = $request->saccode;
                        $approval->doc1 = $fsname;
            $approval->doc2 = $fsname1;
            $approval->doc3 = $fsname2;
            


        $t01 = Vendor::where('reference',$conc)->pluck('rec');
        $t11 = str_replace('[', '' , $t01);
        $t21 = str_replace(']', '' , $t11);
        $t31 = str_replace('"', '' , $t21);
        $a = $t31;

        $t02 = Vendor::where('reference',$conc)->pluck('rec1');
        $t12 = str_replace('[', '' , $t02);
        $t22 = str_replace(']', '' , $t12);
        $t23 = str_replace('"', '' , $t22);
        $b = $t23; 

        $t03 = Vendor::where('reference',$conc)->pluck('rec2');
        $t13 = str_replace('[', '' , $t03);
        $t23 = str_replace(']', '' , $t13);
        $t33 = str_replace('"', '' , $t23);
        $c = $t33; 
        
        $t04 = Vendor::where('reference',$conc)->pluck('rec3');
        $t14 = str_replace('[', '' , $t04);
        $t24 = str_replace(']', '' , $t14);
        $t34 = str_replace('"', '' , $t24);
        $d = $t34;
        $number = Auth::user()->roll;

        if($a === $number && (int)$b !== 0)
        {  
            $approval->rec = $b;
            if($b === $number)
            {
                return redirect('/approvals/vendorapproval')->with('error','SENDER AND RECEIVER CANNOT BE SAME');
            }
            $data = $request->all();
            $approval->update($data); 
            $t01 = User::where('roll',$approval->rec)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' ,$t21);
            $b =   $t22;
            $user = User::find($b);
             $c01 = User::where('roll',$approval->rec)->pluck('vendor');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('vendor' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('vendor' => ($count)));
            }
            
            $user->notify(new ApprovalNote());   
            Mail::to($user)->send(new VendorApproval($approval));
            $approval = VendorForward::where('reference',$conc)->update(array('rec1' => $approval->rec));
            $approval = VendorForward::where('reference',$conc)->update(array('update1' => Carbon::now()));
            $approval = VendorForward::where('reference',$conc)->update(array('ip1' => \Request::ip()));
            alert()->success('THANK YOU','FORWARDED SUCCESSFULLY');
            return redirect('/approvals/vendorapproval')->with('success','FORWARDED SUCCESSFULLY');
        }
        elseif($a === $number && (int)$b === 0)
        {
            $t01 = User::where('roll',$approval->ref)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' ,$t21);
            $b =   $t22;
            $user = User::find($b); 
            Mail::to($user)->send(new Vendors($approval));
            //$user->notify(new MailNotification($approval->id)); 
            $approval = VendorForward::where('reference',$conc)->update(array('update1' => Carbon::now()));
            $approval = VendorForward::where('reference',$conc)->update(array('ip1' => \Request::ip()));  
            alert()->success('THANK YOU','APPROVED SUCCESSFULLY');
            return redirect('/approvals/vendorapproval')->with('success','APPROVED SUCCESSFULLY');
        }
        elseif ($b === $number && (int)$c!== 0)
        {
            $approval->rec = $c;
            if($approval->rec === $number)
            {
                return redirect('/approvals/vendorapproval')->with('error','SENDER AND RECEIVER CANNOT BE SAME');
            }
            $data = $request->all();
            $approval->update($data);
            $t01 = User::where('roll',$approval->rec)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' , $t21);
            $b =   $t22;
            $user = User::find($b);
            $c01 = User::where('roll',$approval->rec)->pluck('vendor');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('vendor' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('vendor' => ($count)));
            }
            $user->notify(new ApprovalNote()); 
            Mail::to($user)->send(new VendorApproval($approval));
            $approval = VendorForward::where('reference',$conc)->update(array('rec2' => $approval->rec));
            $approval = VendorForward::where('reference',$conc)->update(array('update2' => Carbon::now()));
            $approval = VendorForward::where('reference',$conc)->update(array('ip2' => \Request::ip()));
            alert()->success('THANK YOU','FORWARDED SUCCESSFULLY');
            return redirect('/approvals/vendorapproval')->with('success','FORWARDED SUCCESSFULLY');
        }
        elseif($b === $number && (int)$c === 0)
        {
              $t01 = User::where('roll',$approval->ref)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' ,$t21);
            $b =   $t22;
            $user = User::find($b);
            
            $user->notify(new MailNotification($approval->id));
            Mail::to($user)->send(new Vendors($approval)); 
            $approval = VendorForward::where('reference',$conc)->update(array('update2' => Carbon::now()));
            $approval = VendorForward::where('reference',$conc)->update(array('ip2' => \Request::ip())); 
            alert()->success('THANK YOU','APPROVED SUCCESSFULLY'); 
            return redirect('/approvals/vendorapproval')->with('success','APPROVED SUCCESSFULLY'); 
        }
        elseif($c ===  $number && (int)$d!==0)
        {
            $approval->rec = $d;
            if($approval->rec === $number)
            {
                return redirect('/approvals/vendorapproval')->with('error','SENDER AND RECEIVER CANNOT BE SAME');
            }
            $data = $request->all();
            $approval->update($data);
            $t01 = User::where('roll',$approval->rec)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' , $t21);
            $b =   $t22;
            $user = User::find($b);
            $c01 = User::where('roll',$approval->rec)->pluck('vendor');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('vendor' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('vendor' => ($count)));
            }
            $user->notify(new ApprovalNote());
            Mail::to($user)->send(new VendorApproval($approval));
            $approval = VendorForward::where('reference',$conc)->update(array('rec3' => $approval->rec));
            $approval = VendorForward::where('reference',$conc)->update(array('update3' => Carbon::now()));
            $approval = VendorForward::where('reference',$conc)->update(array('ip3' => \Request::ip()));
            alert()->success('THANK YOU','FORWARDED SUCCESSFULLY');
            return redirect('/approvals/vendorapproval')->with('success','FORWARDED SUCCESSFULLY');
        }
        elseif($c ===  $number && (int)$d === 0)
        {
              $t01 = User::where('roll',$approval->ref)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' ,$t21);
            $b =   $t22;
            $user = User::find($b);
            
            //$user->notify(new MailNotification($approval->id)); 
            Mail::to($user)->send(new Vendors($approval));
            $approval = VendorForward::where('reference',$conc)->update(array('update3' => Carbon::now()));
            $approval = VendorForward::where('reference',$conc)->update(array('ip3' => \Request::ip()));  
            alert()->success('THANK YOU','APPROVED SUCCESSFULLY');
            return redirect('/approvals/vendorapproval')->with('success','APPROVED SUCCESSFULLY');
        }
        elseif($d  === $number)
        {
            if($approval->rec === $d)
            {
                return redirect('/approvals/vendorapproval')->with('error','SENDER AND RECEIVER CANNOT BE SAME');
            }
              $t01 = User::where('roll',$approval->ref)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' ,$t21);
            $b =   $t22;
            $user = User::find($b);
            Mail::to($user)->send(new Vendors($approval));
            //$user->notify(new MailNotification($approval->id)); 
            $approval = VendorForward::where('reference',$conc)->update(array('update4' => Carbon::now()));
            $approval = VendorForward::where('reference',$conc)->update(array('ip4' => \Request::ip()));
            alert()->success('THANK YOU','APPROVED SUCCESSFULLY');  
            return redirect('/approvals/vendorapproval')->with('success','APPROVED SUCCESSFULLY');

        }
        else
        {
            alert()->error('OOPS...','SOME ERROR OCCURED'); 
            return redirect('/approvals/vendorapproval')->with('error','FAILED :-(');
        }   
    }

    public function edit($id)
    {
        $vendor = VendorForward::find($id);
        return view('forms.vendor.vendorresend')->with('vendor',$vendor);
    }
    public function editsend($id,Request $request)
    {
    $approval = new VendorForward;
        $approval->sen = Auth::user()->roll;
        $approval->gen = $request->gen;
        $approval->ref = $request->ref;
        $approval->ref2 = $request->ref2;
        $approval->ref3 = $request->ref3;
        //FORMING A UNIQUE REFERENCE FOR THE CURRENT APPROVAL
            $a =  $request->ref;
            $c =  $request->ref3;
            $conc = ($c.$a);
        $approval->reference = null;
            $approval->location = $request->location;
            $approval->vendorcode = $request->vendorcode;
            $approval->paymentterms = $request->paymentterms;
            $approval->currency = $request->currency;
            $approval->paymentmode = $request->paymentmode;
            $approval->class = $request->class;
            $approval->name = $request->name;
            $approval->address1 = $request->address1;
            $approval->address2 = $request->address2;
            $approval->address3 = $request->address3;
            $approval->city = $request->city;
            $approval->country = $request->country;
            $approval->state = $request->state;
            $approval->pincode = $request->pincode;
            $approval->phone = $request->phone;
            $approval->fax = $request->fax;
            $approval->email = $request->email;
            $approval->proposed = $request->proposed;
            $approval->justification = $request->justification;
            $approval->paymentofterm = $request->paymentofterm;
            $approval->referenceif = $request->referenceif;
            $approval->pan = $request->pan;
            $approval->esi = $request->esi;
            $approval->vendortype = $request->vendortype;
            $approval->gststate = $request->gststate;
            $approval->gstin = $request->gstin;
            $approval->hsncode = $request->hsncode;
            $approval->saccode = $request->saccode;

        $approval->des = $request->des;

       $reference = ($request->ref3.$request->ref);

            $t01 = Vendor::where('reference',$reference)->pluck('rec');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t31 = str_replace('"', '' , $t21);
            $a1 =   $t31;

            $t02 = Vendor::where('reference',$reference)->pluck('rec1');
            $t12 = str_replace('[', '' , $t02);
            $t22 = str_replace(']', '' , $t12);
            $t32 = str_replace('"', '' , $t22);
            $b1 =   $t32;

            $t03 = Vendor::where('reference',$reference)->pluck('rec2');
            $t13 = str_replace('[', '' , $t03);
            $t23 = str_replace(']', '' , $t13);
            $t23 = str_replace('"', '' , $t23);
            $c1 =   $t23;

            $t04 = Vendor::where('reference',$reference)->pluck('rec3');
            $t14 = str_replace('[', '' , $t04);
            $t24 = str_replace(']', '' , $t14);
            $t24 = str_replace('"', '' , $t24);
            $d1 =   $t24;

            if(Auth::user()->roll === $a1)
            {
                $approval->rec = $approval->ref;
                    $t01 = User::where('roll',$approval->rec)->pluck('id');
                    $t11 = str_replace('[', '' , $t01);
                    $t21 = str_replace(']', '' , $t11);
                    $t22 = str_replace('"', '' , $t21);
                    echo $approval->rec;
                    $b =   $t22;
                    $user = User::find($b);
                    $user->notify(new ApprovalNote());
                $u01 = User::where('roll',$approval->ref)->pluck('id');
                $u11 = str_replace('[', '' , $u01);
                $u21 = str_replace(']', '' , $u11);
                $u22 = str_replace('"', '' , $u21);
                $c =   $u22;
                $user1 = User::find($c);
                $c01 = User::where('roll',$approval->rec)->pluck('vendor');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('vendor' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('vendor' => ($count)));
            }
                $user1->notify(new ResendNotification());
                $approval->save();
                VendorForward::where('reference',$reference)->where('rec',$a1)->update(array('rec' => null));
                VendorForward::where('reference',$reference)->update(array('update1' => null));
                VendorForward::where('reference',$reference)->update(array('ip1' => null));
                
            }
            elseif(Auth::user()->roll === $b1)
            {
                $approval->rec = $a1;
                    $t01 = User::where('roll',$approval->rec)->pluck('id');
                    $t11 = str_replace('[', '' , $t01);
                    $t21 = str_replace(']', '' , $t11);
                    $t22 = str_replace('"', '' , $t21);
                    $b =   $t22;
                    $user = User::find($b);
                    $user->notify(new ApprovalNote());
                $u01 = User::where('roll',$approval->ref)->pluck('id');
                $u11 = str_replace('[', '' , $u01);
                $u21 = str_replace(']', '' , $u11);
                $u22 = str_replace('"', '' , $u21);
                $c =   $u22;
                $user1 = User::find($c);
                     $c01 = User::where('roll',$approval->rec)->pluck('vendor');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('vendor' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('vendor' => ($count)));
            }
                $user1->notify(new ResendNotification());
                $approval->save();
                VendorForward::where('reference',$reference)->where('rec1',$b1)->update(array('rec1' => null));
                VendorForward::where('reference',$reference)->update(array('update2' => null));
                VendorForward::where('reference',$reference)->update(array('ip2' => null));
                echo $c;
            }
            elseif(Auth::user()->roll === $c1)
            {
                $approval->rec = $b1;
                    $t01 = User::where('roll',$approval->rec)->pluck('id');
                    $t11 = str_replace('[', '' , $t01);
                    $t21 = str_replace(']', '' , $t11);
                    $t22 = str_replace('"', '' , $t21);
                    $b =   $t22;
                    $user = User::find($b);
                    $user->notify(new ApprovalNote());
                $u01 = User::where('roll',$approval->ref)->pluck('id');
                $u11 = str_replace('[', '' , $u01);
                $u21 = str_replace(']', '' , $u11);
                $u22 = str_replace('"', '' , $u21);
                $c =   $u22;
                $user1 = User::find($c);
                 $c01 = User::where('roll',$approval->rec)->pluck('vendor');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('vendor' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('vendor' => ($count)));
            }
                $user1->notify(new ResendNotification());
                VendorForward::where('reference',$reference)->where('rec2',$c1)->update(array('rec2' => null));
                VendorForward::where('reference',$reference)->update(array('update3' => null));
                VendorForward::where('reference',$reference)->update(array('ip3' => null));
                $approval->save();
                  
            }
            elseif(Auth::user()->roll === $d1)
            {
                $approval->rec = $c1;
                    $t01 = User::where('roll',$approval->rec)->pluck('id');
                    $t11 = str_replace('[', '' , $t01);
                    $t21 = str_replace(']', '' , $t11);
                    $t22 = str_replace('"', '' , $t21);
                    echo $approval->rec;
                    $b =   $t22;
                    $user = User::find($b);
                    $user->notify(new ApprovalNote());
                $u01 = User::where('roll',$approval->ref)->pluck('id');
                $u11 = str_replace('[', '' , $u01);
                $u21 = str_replace(']', '' , $u11);
                $u22 = str_replace('"', '' , $u21);
                $c =   $u22;
                $user1 = User::find($c);
                 $c01 = User::where('roll',$approval->rec)->pluck('vendor');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('vendor' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('vendor' => ($count)));
            }
                $user1->notify(new ResendNotification());
                 VendorForward::where('reference',$reference)->where('rec3',$d1)->update(array('rec3' => null));

                $approval->save();
                  
            } 
          return redirect('/approvals/vendorapproval')->with('success','RESENT SUCCESSFULLY');
    
    }

       public function storecorrect(Request $request,$id)
    {
       if($request->hasFile('doc1'))
        {
            $id =Auth::user()->roll;
            $filenameWithExt = $request->file('doc1')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension = $request->file('doc1')->getClientOriginalExtension();
            $fsname = $filename.'_'.$id.'.'.$extension;
            $fsize = $request->file('doc1')->getClientSize();
            $path = $request->file('doc1')->storeAs('public/docs',$fsname);
            $approval = CreditForward::where('id',$id)->update(array('doc1' => $fsname));
        }
        else
        {
            $fsname = "NO FILE ATTACHED";
             $fsize=0;
        }
        if($request->hasFile('doc2'))
        {   
            $id =Auth::user()->roll;
            $filenameWithExt = $request->file('doc2')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension = $request->file('doc2')->getClientOriginalExtension();
            $fsname1 = $filename.'_'.$id.'.'.$extension;
            $fsize1 = $request->file('doc2')->getClientSize();
            $path = $request->file('doc2')->storeAs('public/docs',$fsname1);
            $approval = CreditForward::where('id',$id)->update(array('doc2' => $fsname1));
        }
        else
        {
            $fsname1 = "NO FILE ATTACHED";
            $fsize1=0;
        }
        if($request->hasFile('doc3'))
        {   
            $id =Auth::user()->roll;
            $filenameWithExt = $request->file('doc3')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt , PATHINFO_FILENAME);
            $extension = $request->file('doc3')->getClientOriginalExtension();
            $fsname2 = $filename.'_'.$id.'.'.$extension;
            $fsize2 = $request->file('doc3')->getClientSize();
            $path = $request->file('doc3')->storeAs('public/docs',$fsname1);
            $approval = CreditForward::where('id',$id)->update(array('doc3' => $fsname2));
        }
        else
        {
            $fsname2 = "NO FILE ATTACHED";
            $fsize2=0;
        }

    $approval = new VendorForward;
        $approval->sen = Auth::user()->roll;
        $approval->gen = $request->gen;
        $approval->ref = $request->ref;
        $approval->ref2 = $request->ref2;
        $approval->ref3 =$request->ref3;
        //FORMING A UNIQUE REFERENCE FOR THE CURRENT APPROVAL
            $a =  $request->ref;
            $c =  $request->ref3;
            $conc = ($c.$a);
        $approval->reference = $conc;
            $approval->location = $request->location;
            $approval->vendorcode = $request->vendorcode;
            $approval->paymentterms = $request->paymentterms;
            $approval->currency = $request->currency;
            $approval->paymentmode = $request->paymentmode;
            $approval->class = $request->class;
            $approval->name = $request->name;
            $approval->address1 = $request->address1;
            $approval->address2 = $request->address2;
            $approval->address3 = $request->address3;
            $approval->city = $request->city;
            $approval->country = $request->country;
            $approval->state = $request->state;
            $approval->pincode = $request->pincode;
            $approval->phone = $request->phone;
            $approval->fax = $request->fax;
            $approval->email = $request->email;
            $approval->proposed = $request->proposed;
            $approval->justification = $request->justification;
            $approval->paymentofterm = $request->paymentofterm;
            $approval->referenceif = $request->referenceif;
            $approval->pan = $request->pan;
            $approval->esi = $request->esi;
            $approval->vendortype = $request->vendortype;
            $approval->gststate = $request->gststate;
            $approval->gstin = $request->gstin;
            $approval->hsncode = $request->hsncode;
            $approval->saccode = $request->saccode;

            $data = request()->except(['_token']);
            $data1 = request()->except(array('_token','rec1','rec2','rec3'));

        if($fsize > 8000000 || $fsize1 > 8000000)
        {
            return back()->with('error','FILE SHOULD NOT EXCEED 10MB');   
        }

        $t01 = VendorForward::where('id',$id)->pluck('ref');
        $t11 = str_replace('[', '' , $t01);
        $t21 = str_replace(']', '' , $t11);
        $t31 = str_replace('"', '' , $t21);
        $a =  $t31;

        $t02 = VendorForward::where('id',$id)->pluck('ref3');
        $t12 = str_replace('[', '' , $t02);
        $t22 = str_replace(']', '' , $t12);
        $t32 = str_replace('"', '' , $t22);
        $b =  $t32;



        $forward = $b.$a;
        
        Vendor::where('reference',$forward)->update($data);
        VendorForward::where('reference',$forward)->update($data1);

        
            $t01 = Vendor::where('reference',$forward)->pluck('rec');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t31 = str_replace('"', '' , $t21);
            $a1 =  $t31;

            $t02 = Vendor::where('reference',$forward)->pluck('rec1');
            $t12 = str_replace('[', '' , $t02);
            $t22 = str_replace(']', '' , $t12);
            $t32 = str_replace('"', '' , $t22);
            $b1 =   $t32;

            $t03 = Vendor::where('reference',$forward)->pluck('rec2');
            $t13 = str_replace('[', '' , $t03);
            $t23 = str_replace(']', '' , $t13);
            $t23 = str_replace('"', '' , $t23);
            $c1 =  $t23;

            $t04 = Vendor::where('reference',$forward)->pluck('rec3');
            $t14 = str_replace('[', '' , $t04);
            $t24 = str_replace(']', '' , $t14);
            $t24 = str_replace('"', '' , $t24);
            $d1 =   $t24;

            if(Auth::user()->roll === $a)
            {
                $a01 = User::where('roll',$a1)->pluck('id');
                $a11 = str_replace('[', '' , $a01);
                $a21 = str_replace(']', '' , $a11);
                $a22 = str_replace('"', '' ,$a21);
                $b =   $a22;
                $user = User::find($b);        
                $user->notify(new ApprovalNote()); 


                $c01 = User::where('roll',$a1)->pluck('vendor');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 === null)
                {   
                    User::where('roll',$a1)->update(array('vendor' => 1));
                }
                else
                {
                    $count = $c31+1;
                    User::where('roll',$a1)->update(array('vendor' => ($count)));
                }
                VendorForward::where('reference',$forward)->update(array('rec' => $a1));
            }

            elseif(Auth::user()->roll === $a1)
            {
                echo $b1;
                $a01 = User::where('roll',$b1)->pluck('id');
                $a11 = str_replace('[', '' , $a01);
                $a21 = str_replace(']', '' , $a11);
                $a22 = str_replace('"', '' ,$a21);
                $b =   $a22;
                $user = User::find($b);        
                $user->notify(new ApprovalNote()); 


                $c01 = User::where('roll',$b1)->pluck('vendor');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 === null)
                {   
                    User::where('roll',$b1)->update(array('vendor' => 1));
                }
                else
                {
                    $count = $c31+1;
                    User::where('roll',$b1)->update(array('vendor' => ($count)));
                }
                VendorForward::where('reference',$forward)->update(array('rec1' => $b1));
                VendorForward::where('reference',$forward)->update(array('update1' => Carbon::now()));
            }

             elseif(Auth::user()->roll === $b1)
            {
                echo $c1;
                $a01 = User::where('roll',$c1)->pluck('id');
                $a11 = str_replace('[', '' , $a01);
                $a21 = str_replace(']', '' , $a11);
                $a22 = str_replace('"', '' ,$a21);
                $b =   $a22;
                $user = User::find($b);        
                $user->notify(new ApprovalNote()); 


                $c01 = User::where('roll',$c1)->pluck('vendor');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 === null)
                {   
                    User::where('roll',$c1)->update(array('vendor' => 1));
                }
                else
                {
                    $count = $c31+1;
                    User::where('roll',$c1)->update(array('vendor' => ($count)));
                }
                VendorForward::where('reference',$forward)->update(array('rec2' => $c1));
                VendorForward::where('reference',$forward)->update(array('update2' => Carbon::now()));
            }

            elseif(Auth::user()->roll === $c1)
            {
                echo $d1;
                $a01 = User::where('roll',$d1)->pluck('id');
                $a11 = str_replace('[', '' , $a01);
                $a21 = str_replace(']', '' , $a11);
                $a22 = str_replace('"', '' ,$a21);
                $b =   $a22;
                $user = User::find($b);        
                $user->notify(new ApprovalNote()); 


                $c01 = User::where('roll',$d1)->pluck('vendor');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 === null)
                {   
                    User::where('roll',$d1)->update(array('vendor' => 1));
                }
                else
                {
                    $count = $c31+1;
                    User::where('roll',$d1)->update(array('vendor' => ($count)));
                }
                VendorForward::where('reference',$forward)->update(array('rec3' => $d1));
                VendorForward::where('reference',$forward)->update(array('update3' => Carbon::now()));
            }

            alert()->success('THANK YOU','APPROVAL SENT SUCCESSFULLY');
            return redirect('/approvals/vendorapproval')->with('success','APPROVAL SENT SUCCESSFULLY');
    

    }

}


