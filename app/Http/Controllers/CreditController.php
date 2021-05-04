<?php

namespace App\Http\Controllers;

use App\Credit;
use App\CreditForward;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Http\FormRequest;
use App\Http\Requests;
use Storage;
use App\Resend;
use App\Forward;
use App\Mail\Credits;
use App\Mail\CreditApproval;
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

class CreditController extends Controller
{
    
    public function home()
    {
        if(!Auth::check()) 
            { 
                return redirect('/login');
            }
            else
            {
                 $credit = Credit::sortable()->where('ref',Auth::user()->roll)->orderBy('created_at','desc')->paginate(5);
        return view('forms.credit.credithomesen',array('credit' => $credit));
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
        $credit = CreditForward::sortable()->orderBy('created_at','desc')->paginate(5);
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

        return view('forms.credit.credithomerec',array('credit'=>$credit,'note1' => $note1,'note2' => $note2,'note3' => $note3,'note4' => $note4,'note5' => $note5));
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
    return view('forms.credit.newcredit', array('off1' => $off1,'off2' => $off2,'off3' => $off3,'off4' => $off4,'off5' => $off5,'off6' => $off6,'off7' => $off7));
    }
    public function indexcorrect($id)
    {
        $t01 = CreditForward::where('id',$id)->pluck('ref');
        $t11 = str_replace('[', '' , $t01);
        $t21 = str_replace(']', '' , $t11);
        $t31 = str_replace('"', '' , $t21);
        $a =  $t31;

        $t02 = CreditForward::where('id',$id)->pluck('ref3');
        $t12 = str_replace('[', '' , $t02);
        $t22 = str_replace(']', '' , $t12);
        $t32 = str_replace('"', '' , $t22);
        $b =  $t32;

        $forward = $b.$a;

        $credit = Credit::where('reference',$forward)->first();

    $off1 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->manager)->pluck('name'));
    $off2 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->superuser)->pluck('name'));
    $off3 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->supervisor)->pluck('name'));
    $off4 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->planthead)->pluck('name'));
    $off5 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->vpo)->pluck('name'));
    $off6 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->vpca)->pluck('name'));
    $off7 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->director)->pluck('name'));
    return view('forms.credit.newcreditcorrects', array('credit'=> $credit,'off1' => $off1,'off2' => $off2,'off3' => $off3,'off4' => $off4,'off5' => $off5,'off6' => $off6,'off7' => $off7));
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
        $approval = new credit;        
        $approval->sen = Auth::user()->roll;
        $approval->gen = Auth::user()->name;
        $approval->ref = $request->ref;
        $approval->ref2 = "CREDIT";
        $approval->ref3 = Carbon::now()->format('dmHi');
        //FORMING A UNIQUE REFERENCE FOR THE CURRENT APPROVAL
            $a =  Auth::user()->roll;
            $c =  Carbon::now()->format('dmHi');
            $conc = ($c.$a);
        $approval->reference = $conc;
        $approval->title = $request->title;
        $approval->address = $request->address;
        $approval->telephone = $request->telephone;
        $approval->constitution = $request->constitution;
        $approval->year = $request->year;
        $approval->email = $request->email;
        $approval->mobile = $request->mobile;
        $approval->pan = $request->pan;
        $approval->cin = $request->cin;
        $approval->gst = $request->gst;
        $approval->state = $request->state;
        $approval->currency = $request->currency;
        $approval->bankname = $request->bankname;
        $approval->bankbranch = $request->bankbranch;
        $approval->bankaccno = $request->bankaccno;
        $approval->bankifsc = $request->bankifsc;
        $approval->setup = $request->setup;
        $approval->component = $request->component;
        $approval->supplied = $request->supplied;
        $approval->cuttools = $request->cuttools;
        $approval->duration = $request->duration;
        $approval->source = $request->source;
        $approval->brands = $request->brands;
        $approval->sales1 = $request->sales1;
        $approval->sales2 = $request->sales2;
        $approval->sales3 = $request->sales3;
        $approval->employees= $request->employees;
        $approval->transaction = $request->transaction;
        $approval->annual = $request->annual;
        $approval->payment = $request->payment;
        $approval->justify = $request->justify;
        $approval->remarks = $request->remarks;
        $approval->doc1= $fsname;
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
            return redirect('/creditapproval')->with('error',"CHOOSE RECEIVERS CORRECTLY"); 
        }
//DIRECTOR IS THE FINAL APPROVER
        if($request->rec === "DIRECTOR" && $request->rec1 !== null || 
           $request->rec === "DIRECTOR" && $request->rec2 !== null ||
           $request->rec === "DIRECTOR" && $request->rec3 !== null )
        {
             return redirect('/creditapproval')->with('error','DIRECTOR HAS TO APPROVE FINALLY');  
        }
       $approval->save();

//creditEFORWARDS TABLE CONTENT

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

        $approval = new creditForward;
        $approval->sen = Auth::user()->roll;
        $approval->gen = Auth::user()->name;
        $approval->ref = $request->ref;
        $approval->ref2 = "CREDIT";
        $approval->ref3 = Carbon::now()->format('dmHi');
        //FORMING A UNIQUE REFERENCE FOR THE CURRENT APPROVAL
            $a =  Auth::user()->roll;
            $c =  Carbon::now()->format('dmHi');
            $conc = ($c.$a);
        $approval->reference = $conc;
        $approval->title = $request->title;
        $approval->address = $request->address;
        $approval->telephone = $request->telephone;
        $approval->constitution = $request->constitution;
        $approval->year = $request->year;
        $approval->email = $request->email;
        $approval->mobile = $request->mobile;
        $approval->pan = $request->pan;
        $approval->cin = $request->cin;
        $approval->gst = $request->gst;
        $approval->state = $request->state;
        $approval->currency = $request->currency;
        $approval->bankname = $request->bankname;
        $approval->bankbranch = $request->bankbranch;
        $approval->bankaccno = $request->bankaccno;
        $approval->bankifsc = $request->bankifsc;
        $approval->setup = $request->setup;
        $approval->component = $request->component;
        $approval->supplied = $request->supplied;
        $approval->cuttools = $request->cuttools;
        $approval->duration = $request->duration;
        $approval->source = $request->source;
        $approval->brands = $request->brands;
        $approval->sales1 = $request->sales1;
        $approval->sales2 = $request->sales2;
        $approval->sales3 = $request->sales3;
        $approval->employees= $request->employees;
        $approval->transaction = $request->transaction;
        $approval->annual = $request->annual;
        $approval->payment = $request->payment;
        $approval->justify = $request->justify;
        $approval->remarks = $request->remarks;
        $approval->doc1= $fsname;
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

        $c01 = User::where('roll',$approval->rec)->pluck('credit');
        $c11 = str_replace('[', '' , $c01);
        $c21 = str_replace(']', '' , $c11);
        $c31 = (int)str_replace('"', '' , $c21);
        if($c31 === null)
        {
            User::where('roll',$approval->rec)->update(array('credit' => 1));
        }
        else
        {
            $count = $c31+1;
            User::where('roll',$approval->rec)->update(array('credit' => ($count)));
        }
        $approval->save(); 
        $user = User::find($a);
        Mail::to($user)->send(new CreditApproval($approval));
        $user->notify(new ApprovalNote($approval));  
        
        alert()->success('SUCCESS','APPROVAL SENT SUCCESSFULLY');
       return redirect('/oldapprovals/creditapproval/')->with('success','APPROVAL SENT SUCCESSFULLY');  
    }
//FOR SENDER IN OLD APPROVALS -> credit APPROVALS PANEL
    public function showold($id)
    {
        $credit = Credit::find($id);
        if(Auth::user()->roll === $credit->ref)
            {
                return view('forms.credit.showcreditsen',array('credit' => $credit));
            }
        else
            {
                return redirect('/creditapproval')->with('error','NO ACCESS TO THIS PAGE');
            }
    } 
//FOR RECEIVER IN APPROVALS->credit APPROVALS PANEL
    public function display($id)
    {
        $credit = CreditForward::find($id);
//TO FIND THE RECEIVERS OF THE CURRENT APPROVAL
        $t01 = Credit::where('reference',$credit->reference)->pluck('rec');
        $t11 = str_replace('[', '' , $t01);
        $t21 = str_replace(']', '' , $t11);
        $t31 = str_replace('"', '' , $t21);
        $a =  $t31;
                
        $t02 = Credit::where('reference',$credit->reference)->pluck('rec1');
        $t12 = str_replace('[', '' , $t02);
        $t22 = str_replace(']', '' , $t12);
        $t32 = str_replace('"', '' , $t22);
        $b =  $t32;
                
        $t03 = Credit::where('reference',$credit->reference)->pluck('rec2');
        $t13 = str_replace('[', '' , $t03);
        $t23 = str_replace(']', '' , $t13);
        $t33 = str_replace('"', '' , $t23);
        $c =  $t33;
                
        $t04 = Credit::where('reference',$credit->reference)->pluck('rec3');
        $t14 = str_replace('[', '' , $t04);
        $t24 = str_replace(']', '' , $t14);
        $t34 = str_replace('"', '' , $t24);
        $d =  $t34;

//END
//CHECHING IF THE CURRENT USER IS A RECEIVER OF CURRENT APPROVAL
        if(Auth::user()->roll === $a)
            {   
                $t01 = User::where('roll',$credit->rec)->pluck('id');
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
                $c01 = User::where('roll',$credit->rec)->pluck('credit');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 !== null)
                {
                   $count = $c31-1;
                   if($count > 0)
                    {
                        User::where('roll',$credit->rec)->update(array('credit' => ($count)));
                    }
                   else
                    {
                        User::where('roll',$credit->rec)->update(array('credit' => (null)));
                    }                  
                } 
                else
                {
                    User::where('roll',$credit->rec)->update(array('credit' => (null)));
                } 
                 CreditForward::where('reference',$credit->reference)->update(array('readat1' => Carbon::now()));
                return view('forms.credit.showcreditrec', array('credit' => $credit,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d));
            }

        elseif(Auth::user()->roll === $b)
            {

                $u01 = User::where('roll',$credit->rec1)->pluck('id');
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
                $c01 = User::where('roll',$credit->rec1)->pluck('credit');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 !== null)
                {
                   $count = $c31-1;
                   if($count > 0)
                    {
                        User::where('roll',$credit->rec1)->update(array('credit' => ($count)));
                    }
                   else
                    {
                        User::where('roll',$credit->rec1)->update(array('credit' => (null)));
                    }                  
                } 
                else
                {
                    User::where('roll',$credit->rec1)->update(array('credit' => (null)));
                } 
                CreditForward::where('reference',$credit->reference)->update(array('readat2' => Carbon::now()));
                return view('forms.credit.showcreditrec', array('credit' => $credit,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d));
            }
        elseif(Auth::user()->roll === $c)
            {
                $v01 = User::where('roll',$credit->rec2)->pluck('id');
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
                $c01 = User::where('roll',$credit->rec2)->pluck('credit');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 !== null)
                {
                   $count = $c31-1;
                   if($count > 0)
                    {
                        User::where('roll',$credit->rec2)->update(array('credit' => ($count)));
                    }
                   else
                    {
                        User::where('roll',$credit->rec2)->update(array('credit' => (null)));
                    }                  
                } 
                else
                {
                    User::where('roll',$credit->rec2)->update(array('credit' => (null)));
                } 
                CreditForward::where('reference',$credit->reference)->update(array('readat3' => Carbon::now()));
                return view('forms.credit.showcreditrec', array('credit' => $credit,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d));
            }
        elseif(Auth::user()->roll === $d)
            {
                $w01 = User::where('roll',$credit->rec3)->pluck('id');
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
                $c01 = User::where('roll',$credit->rec3)->pluck('credit');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 !== null)
                {
                   $count = $c31-1;
                   if($count > 0)
                    {
                        User::where('roll',$credit->rec3)->update(array('credit' => ($count)));
                    }
                   else
                    {
                        User::where('roll',$credit->rec3)->update(array('credit' => (null)));
                    }                  
                } 
                else
                {
                    User::where('roll',$credit->rec3)->update(array('credit' => (null)));
                } 
                CreditForward::where('reference',$credit->reference)->update(array('readat4' => Carbon::now()));
                return view('forms.credit.showcreditrec', array('credit' => $credit,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d));
            }
             else
            {
                $x01 = User::where('roll',$credit->ref)->pluck('id');
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
                
                $u01 = User::where('roll',$credit->sen)->pluck('name');
                $u11 = str_replace('[', '' , $u01);
                $u21 = str_replace(']', '' , $u11);
                $u31 = str_replace('"', '' , $u21);
                $user2 =  $u31;

                $c01 = User::where('roll',$credit->rec)->pluck('credit');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);

                $t01 = User::where('roll',$credit->rec)->pluck('id');
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
                        User::where('roll',$credit->rec)->update(array('credit' => ($count)));
                   }
                   else{
                    User::where('roll',$credit->rec)->update(array('credit' => (null)));
                }  
                    
                } 
                else{
                    User::where('roll',$credit->rec)->update(array('credit' => (null)));
                }       
                return view('forms.credit.showcreditresend', array('credit' => $credit,'user' => $user2,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d));
            }
        
    }
        public function PDF($id)
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
           
            $credit =  Credit::find($id);

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

       
               $pdf = PDF::loadview('forms.credit.creditpdf',['credit' => $credit,'rec' => $a,'name' => $a1,'name1' => $b1,'name2' => $c1,'name3' => $d1,'rec1' => $b,'rec2' => $c,'rec3' => $d])->setPaper('a4', 'portrait');
                return $pdf->stream('creditapproval.pdf');
       
    }

    public function final($id)
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
           
            $credit =  CreditForward::find($id);

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

       
               $pdf = PDF::loadview('forms.credit.creditfinal',['credit' => $credit,'rec' => $a,'name' => $a1,'name1' => $b1,'name2' => $c1,'name3' => $d1,'rec1' => $b,'rec2' => $c,'rec3' => $d])->setPaper('a4', 'portrait');
                return $pdf->stream('approved.pdf');
       
    }

    public function forward($id)
    {
        $credit = CreditForward::find($id);
        return view('forms.credit.creditforwards')->with('credit',$credit);
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
            $approval = CreditForward::where('id',$id)->update(array('doc1' => $fsname));
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
            $approval = CreditForward::where('id',$id)->update(array('doc2' => $fsname1));
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
            $approval = CreditForward::where('id',$id)->update(array('doc3' => $fsname1));
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
        $approval = new creditForward;
        $approval->sen = Auth::user()->roll;
        $approval->gen = Auth::user()->name;
        $approval->ref = $request->ref;
        $approval->ref2 = $request->ref;
        $approval->ref3 = $request->ref3;
        //FORMING A UNIQUE REFERENCE FOR THE CURRENT APPROVAL
            $a =  $request->ref;
            $c =  $request->ref3;
            $conc = ($c.$a);
        $approval->reference = $conc;
        $approval->title = $request->title;
        $approval->address = $request->address;
        $approval->telephone = $request->telephone;
        $approval->constitution = $request->constitution;
        $approval->year = $request->year;
        $approval->email = $request->email;
        $approval->mobile = $request->mobile;
        $approval->pan = $request->pan;
        $approval->cin = $request->cin;
        $approval->gst = $request->gst;
        $approval->state = $request->state;
        $approval->currency = $request->currency;
        $approval->bankname = $request->bankname;
        $approval->bankbranch = $request->bankbranch;
        $approval->bankaccno = $request->bankaccno;
        $approval->bankifsc = $request->bankifsc;
        $approval->setup = $request->setup;
        $approval->component = $request->component;
        $approval->supplied = $request->supplied;
        $approval->cuttools = $request->cuttools;
        $approval->duration = $request->duration;
        $approval->source = $request->source;
        $approval->brands = $request->brands;
        $approval->sales1 = $request->sales1;
        $approval->sales2 = $request->sales2;
        $approval->sales3 = $request->sales3;
        $approval->employees= $request->employees;
        $approval->transaction = $request->transaction;
        $approval->annual = $request->annual;
        $approval->payment = $request->payment;
        $approval->justify = $request->justify;
        $approval->remarks = $request->remarks;
        $approval->doc1= $fsname;
        $approval->doc2 = $fsname1;
        $approval->doc3 = $fsname2;

        $t01 = Credit::where('reference',$conc)->pluck('rec');
        $t11 = str_replace('[', '' , $t01);
        $t21 = str_replace(']', '' , $t11);
        $t31 = str_replace('"', '' , $t21);
        $a = $t31;

        $t02 = Credit::where('reference',$conc)->pluck('rec1');
        $t12 = str_replace('[', '' , $t02);
        $t22 = str_replace(']', '' , $t12);
        $t23 = str_replace('"', '' , $t22);
        $b = $t23; 

        $t03 = Credit::where('reference',$conc)->pluck('rec2');
        $t13 = str_replace('[', '' , $t03);
        $t23 = str_replace(']', '' , $t13);
        $t33 = str_replace('"', '' , $t23);
        $c = $t33; 
        
        $t04 = Credit::where('reference',$conc)->pluck('rec3');
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
                return redirect('/approvals/creditapproval')->with('error','SENDER AND RECEIVER CANNOT BE SAME');
            }
            $data = $request->all();
            $approval->update($data); 
            $t01 = User::where('roll',$approval->rec)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' ,$t21);
            $b =   $t22;
            $user = User::find($b);
            
            $user->notify(new ApprovalNote()); 
            Mail::to($user)->send(new CreditApproval($approval));  
            $c01 = User::where('roll',$approval->rec)->pluck('credit');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('credit' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('credit' => ($count)));
            }
            $approval = CreditForward::where('reference',$conc)->update(array('rec1' => $approval->rec));
            $approval = CreditForward::where('reference',$conc)->update(array('update1' => Carbon::now()));
            $approval = CreditForward::where('reference',$conc)->update(array('ip1' => \Request::ip()));
            alert()->success('THANK YOU','FORWARDED SUCCESSFULLY');
            return redirect('/approvals/creditapproval')->with('success','FORWARDED SUCCESSFULLY');
        }
        elseif($a === $number && (int)$b === 0)
        {
            $t01 = User::where('roll',$approval->ref)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' ,$t21);
            $b =   $t22;
            $user = User::find($b);
            Mail::to($user)->send(new Credits($approval));
            //$user->notify(new MailNotification($approval->id)); 
            $approval = CreditForward::where('reference',$conc)->update(array('update1' => Carbon::now()));
            $approval = CreditForward::where('reference',$conc)->update(array('ip1' => \Request::ip()));  
            alert()->success('THANK YOU','APPROVED SUCCESSFULLY');
            return redirect('/approvals/creditapproval')->with('success','APPROVED SUCCESSFULLY');
        }
        elseif ($b === $number && (int)$c!== 0)
        {
            $approval->rec = $c;
            if($approval->rec === $number)
            {
                return redirect('/approvals/creditapproval')->with('error','SENDER AND RECEIVER CANNOT BE SAME');
            }
            $data = $request->all();
            $approval->update($data);
            $t01 = User::where('roll',$approval->rec)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' , $t21);
            $b =   $t22;
            $user = User::find($b);
            Mail::to($user)->send(new CreditApproval($approval));
            $user->notify(new ApprovalNote()); 
            $c01 = User::where('roll',$approval->rec)->pluck('credit');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('credit' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('credit' => ($count)));
            }
            $approval = CreditForward::where('reference',$conc)->update(array('rec2' => $approval->rec));
            $approval = CreditForward::where('reference',$conc)->update(array('update2' => Carbon::now()));
            $approval = CreditForward::where('reference',$conc)->update(array('ip2' => \Request::ip()));
            alert()->success('THANK YOU','FORWARDED SUCCESSFULLY');
            return redirect('/approvals/creditapproval')->with('success','FORWARDED SUCCESSFULLY');
        }
        elseif($b === $number && (int)$c === 0)
        {
              $t01 = User::where('roll',$approval->ref)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' ,$t21);
            $b =   $t22;
            $user = User::find($b);
            Mail::to($user)->send(new Credits($approval));
            //$user->notify(new MailNotification($approval->id)); 
            $approval = CreditForward::where('reference',$conc)->update(array('update2' => Carbon::now()));
            $approval = CreditForward::where('reference',$conc)->update(array('ip2' => \Request::ip())); 
            alert()->success('THANK YOU','APPROVED SUCCESSFULLY'); 
            return redirect('/approvals/creditapproval')->with('success','APPROVED SUCCESSFULLY'); 
        }
        elseif($c ===  $number && (int)$d!==0)
        {
            $approval->rec = $d;
            if($approval->rec === $number)
            {
                return redirect('/approvals/creditapproval')->with('error','SENDER AND RECEIVER CANNOT BE SAME');
            }
            $data = $request->all();
            $approval->update($data);
            $t01 = User::where('roll',$approval->rec)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' , $t21);
            $b =   $t22;
            $user = User::find($b);
            $user->notify(new ApprovalNote());
            Mail::to($user)->send(new CreditApproval($approval));
             $c01 = User::where('roll',$approval->rec)->pluck('credit');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('credit' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('credit' => ($count)));
            }
            $approval = CreditForward::where('reference',$conc)->update(array('rec3' => $approval->rec));
            $approval = CreditForward::where('reference',$conc)->update(array('update3' => Carbon::now()));
            $approval = CreditForward::where('reference',$conc)->update(array('ip3' => \Request::ip()));
            alert()->success('THANK YOU','FORWARDED SUCCESSFULLY');
            return redirect('/approvals/creditapproval')->with('success','FORWARDED SUCCESSFULLY');
        }
        elseif($c ===  $number && (int)$d === 0)
        {
              $t01 = User::where('roll',$approval->ref)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' ,$t21);
            $b =   $t22;
            $user = User::find($b);
            Mail::to($user)->send(new Credits($approval));
            //$user->notify(new MailNotification($approval->id)); 
            $approval = CreditForward::where('reference',$conc)->update(array('update3' => Carbon::now()));
            $approval = CreditForward::where('reference',$conc)->update(array('ip3' => \Request::ip()));  
            alert()->success('THANK YOU','APPROVED SUCCESSFULLY');
            return redirect('/approvals/creditapproval')->with('success','APPROVED SUCCESSFULLY');
        }
        elseif($d  === $number)
        {
            if($approval->rec === $d)
            {
                return redirect('/approvals/creditapproval')->with('error','SENDER AND RECEIVER CANNOT BE SAME');
            }
              $t01 = User::where('roll',$approval->ref)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' ,$t21);
            $b =   $t22;
            $user = User::find($b);
            Mail::to($user)->send(new Credits($approval));
            //$user->notify(new MailNotification($approval->id)); 
            $approval = CreditForward::where('reference',$conc)->update(array('update4' => Carbon::now()));
            $approval = CreditForward::where('reference',$conc)->update(array('ip4' => \Request::ip()));
            alert()->success('THANK YOU','APPROVED SUCCESSFULLY');  
            return redirect('/approvals/creditapproval')->with('success','APPROVED SUCCESSFULLY');

        }
        else
        {
            alert()->error('OOPS...','SOME ERROR OCCURED'); 
            return redirect('/approvals/creditapproval')->with('error','FAILED :-(');
        }   
    }

    public function edit($id)
    {
        $credit = CreditForward::find($id);
        return view('forms.credit.creditresend')->with('credit',$credit);
    }
    public function editsend($id,Request $request)
    {
    $approval = new creditForward;
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
        $approval->title = $request->title;
        $approval->address = $request->address;
        $approval->telephone = $request->telephone;
        $approval->constitution = $request->constitution;
        $approval->year = $request->year;
        $approval->mobile = $request->mobile;
        $approval->email = $request->email;
        $approval->pan = $request->pan;
        $approval->cin = $request->cin;
        $approval->gst = $request->gst;
        $approval->state = $request->state;
        $approval->currency = $request->currency;
        $approval->bankname = $request->bankname;
        $approval->bankbranch = $request->bankbranch;
        $approval->bankaccno = $request->bankaccno;
        $approval->bankifsc = $request->bankifsc;
        $approval->setup = $request->setup;
        $approval->component = $request->component;
        $approval->supplied = $request->supplied;
        $approval->cuttools = $request->cuttools;
        $approval->duration = $request->duration;
        $approval->source = $request->source;
        $approval->brands = $request->brands;
        $approval->sales1 = $request->sales1;
        $approval->sales2 = $request->sales2;
        $approval->sales3 = $request->sales3;
        $approval->employees= $request->employees;
        $approval->transaction = $request->transaction;
        $approval->annual = $request->annual;
        $approval->payment = $request->payment;
        $approval->justify = $request->justify;
        $approval->remarks = $request->remarks;
        $approval->doc1 = "NO FILE ATTACHED";
        $approval->doc3 = "NO FILE ATTACHED";
        $approval->doc2 = "NO FILE ATTACHED";
        $approval->des = $request->des;

         $reference = ($request->ref3.$request->ref);

            $t01 = Credit::where('reference',$reference)->pluck('rec');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t31 = str_replace('"', '' , $t21);
            $a1 =   $t31;

            $t02 = Credit::where('reference',$reference)->pluck('rec1');
            $t12 = str_replace('[', '' , $t02);
            $t22 = str_replace(']', '' , $t12);
            $t32 = str_replace('"', '' , $t22);
            $b1 =   $t32;

            $t03 = Credit::where('reference',$reference)->pluck('rec2');
            $t13 = str_replace('[', '' , $t03);
            $t23 = str_replace(']', '' , $t13);
            $t23 = str_replace('"', '' , $t23);
            $c1 =   $t23;

            $t04 = Credit::where('reference',$reference)->pluck('rec3');
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
                $c01 = User::where('roll',$approval->rec)->pluck('credit');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('credit' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('credit' => ($count)));
            }
                $user1->notify(new ResendNotification());
                $approval->save();
                CreditForward::where('reference',$reference)->where('rec',$a1)->update(array('rec' => null));
                CreditForward::where('reference',$reference)->update(array('update1' => null));
                CreditForward::where('reference',$reference)->update(array('ip1' => null));
                
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
                     $c01 = User::where('roll',$approval->rec)->pluck('credit');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('credit' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('credit' => ($count)));
            }
                $user1->notify(new ResendNotification());
                $approval->save();
                CreditForward::where('reference',$reference)->where('rec1',$b1)->update(array('rec1' => null));
                CreditForward::where('reference',$reference)->update(array('update2' => null));
                CreditForward::where('reference',$reference)->update(array('ip2' => null));
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
                 $c01 = User::where('roll',$approval->rec)->pluck('credit');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('credit' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('credit' => ($count)));
            }
                $user1->notify(new ResendNotification());
                CreditForward::where('reference',$reference)->where('rec2',$c1)->update(array('rec2' => null));
                CreditForward::where('reference',$reference)->update(array('update3' => null));
                CreditForward::where('reference',$reference)->update(array('ip3' => null));
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
                 $c01 = User::where('roll',$approval->rec)->pluck('credit');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('credit' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('credit' => ($count)));
            }
                $user1->notify(new ResendNotification());
                 CreditForward::where('reference',$reference)->where('rec3',$d1)->update(array('rec3' => null));

                $approval->save();
                  
            } 
          return redirect('/approvals/creditapproval')->with('success','RESENT SUCCESSFULLY');}

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
        $approval = new CreditForward;
        $approval->sen = Auth::user()->roll;
        $approval->gen = $request->gen;
        $approval->ref = $request->ref;
        $approval->ref2 = $request->ref2;
        $approval->ref3 = $request->ref3;
        //FORMING A UNIQUE REFERENCE FOR THE CURRENT APPROVAL
            $a =  $request->ref;
            $c =  $request->ref3;
            $conc = ($c.$a);
        $approval->reference = $conc;
        $approval->title = $request->title;
        $approval->address = $request->address;
        $approval->telephone = $request->telephone;
        $approval->constitution = $request->constitution;
        $approval->year = $request->year;
        $approval->mobile = $request->mobile;
        $approval->email = $request->email;
        $approval->pan = $request->pan;
        $approval->cin = $request->cin;
        $approval->gst = $request->gst;
        $approval->state = $request->state;
        $approval->currency = $request->currency;
        $approval->bankname = $request->bankname;
        $approval->bankbranch = $request->bankbranch;
        $approval->bankaccno = $request->bankaccno;
        $approval->bankifsc = $request->bankifsc;
        $approval->setup = $request->setup;
        $approval->component = $request->component;
        $approval->supplied = $request->supplied;
        $approval->cuttools = $request->cuttools;
        $approval->duration = $request->duration;
        $approval->source = $request->source;
        $approval->brands = $request->brands;
        $approval->sales1 = $request->sales1;
        $approval->sales2 = $request->sales2;
        $approval->sales3 = $request->sales3;
        $approval->employees= $request->employees;
        $approval->transaction = $request->transaction;
        $approval->annual = $request->annual;
        $approval->payment = $request->payment;
        $approval->justify = $request->justify;
        $approval->remarks = $request->remarks;
        $approval->doc1 = $fsname;
        $approval->doc3 = $fsname1;
        $approval->doc2 = $fsname2;
        $approval->des = $request->des;
           $data = request()->except(['_token']);
            $data1 = request()->except(array('_token','rec1','rec2','rec3'));

        if($fsize > 8000000 || $fsize1 > 8000000)
        {
            return back()->with('error','FILE SHOULD NOT EXCEED 10MB');   
        }

        $t01 = CreditForward::where('id',$id)->pluck('ref');
        $t11 = str_replace('[', '' , $t01);
        $t21 = str_replace(']', '' , $t11);
        $t31 = str_replace('"', '' , $t21);
        $a =  $t31;

        $t02 = CreditForward::where('id',$id)->pluck('ref3');
        $t12 = str_replace('[', '' , $t02);
        $t22 = str_replace(']', '' , $t12);
        $t32 = str_replace('"', '' , $t22);
        $b =  $t32;



        $forward = $b.$a;
        
        Credit::where('reference',$forward)->update($data);
        CreditForward::where('reference',$forward)->update($data1);

        
            $t01 = Credit::where('reference',$forward)->pluck('rec');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t31 = str_replace('"', '' , $t21);
            $a1 =  $t31;

            $t02 = Credit::where('reference',$forward)->pluck('rec1');
            $t12 = str_replace('[', '' , $t02);
            $t22 = str_replace(']', '' , $t12);
            $t32 = str_replace('"', '' , $t22);
            $b1 =   $t32;

            $t03 = Credit::where('reference',$forward)->pluck('rec2');
            $t13 = str_replace('[', '' , $t03);
            $t23 = str_replace(']', '' , $t13);
            $t23 = str_replace('"', '' , $t23);
            $c1 =  $t23;

            $t04 = Credit::where('reference',$forward)->pluck('rec3');
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


                $c01 = User::where('roll',$a1)->pluck('credit');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 === null)
                {   
                    User::where('roll',$a1)->update(array('credit' => 1));
                }
                else
                {
                    $count = $c31+1;
                    User::where('roll',$a1)->update(array('credit' => ($count)));
                }
                CreditForward::where('reference',$forward)->update(array('rec' => $a1));
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


                $c01 = User::where('roll',$b1)->pluck('credit');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 === null)
                {   
                    User::where('roll',$b1)->update(array('credit' => 1));
                }
                else
                {
                    $count = $c31+1;
                    User::where('roll',$b1)->update(array('credit' => ($count)));
                }
                CreditForward::where('reference',$forward)->update(array('rec1' => $b1));
                CreditForward::where('reference',$forward)->update(array('update1' => Carbon::now()));
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


                $c01 = User::where('roll',$c1)->pluck('credit');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 === null)
                {   
                    User::where('roll',$c1)->update(array('credit' => 1));
                }
                else
                {
                    $count = $c31+1;
                    User::where('roll',$c1)->update(array('credit' => ($count)));
                }
                CreditForward::where('reference',$forward)->update(array('rec2' => $c1));
                CreditForward::where('reference',$forward)->update(array('update2' => Carbon::now()));
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


                $c01 = User::where('roll',$d1)->pluck('credit');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 === null)
                {   
                    User::where('roll',$d1)->update(array('credit' => 1));
                }
                else
                {
                    $count = $c31+1;
                    User::where('roll',$d1)->update(array('credit' => ($count)));
                }
                CreditForward::where('reference',$forward)->update(array('rec3' => $d1));
                CreditForward::where('reference',$forward)->update(array('update3' => Carbon::now()));
            }

            alert()->success('THANK YOU','APPROVAL SENT SUCCESSFULLY');
            return redirect('/approvals/creditapproval')->with('success','APPROVAL SENT SUCCESSFULLY');
    
    }

}


