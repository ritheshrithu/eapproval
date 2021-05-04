<?php

namespace App\Http\Controllers;

use App\Capex;
use App\CapexForward;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Http\FormRequest;
use App\Http\Requests;
use Storage;
use App\Resend;
use App\Forward;
use App\Mail\Capexes;
use App\Mail\CapexApproval;
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

class CapexController extends Controller
{
    
    public function home()
    {
        if(!Auth::check()) 
            { 
                return redirect('/login');
            }
            else
            {
                 $capex = Capex::sortable()->where('ref',Auth::user()->roll)->orderBy('created_at','desc')->paginate(5);
        return view('forms.capex.capexhomesen',array('capex' => $capex));
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
        $capex = CapexForward::sortable()->orderBy('created_at','desc')->paginate(5);
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

        return view('forms.capex.capexhomerec',array('capex'=>$capex,'note1' => $note1,'note2' => $note2,'note3' => $note3,'note4' => $note4,'note5' => $note5));
        }
    }
    public function index()
    {
    $off1 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", DB::table('users')->where('roll',Auth::user()->manager)->pluck('name'));
    $off2 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", DB::table('users')->where('roll',Auth::user()->superuser)->pluck('name'));
    $off3 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", DB::table('users')->where('roll',Auth::user()->supervisor)->pluck('name'));
    $off4 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", DB::table('users')->where('roll',Auth::user()->planthead)->pluck('name'));
    $off5 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", DB::table('users')->where('roll',Auth::user()->vpo)->pluck('name'));
    $off6 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", DB::table('users')->where('roll',Auth::user()->vpca)->pluck('name'));
    $off7 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", DB::table('users')->where('roll',Auth::user()->director)->pluck('name'));
    return view('forms.capex.newcapex', array('off1' => $off1,'off2' => $off2,'off3' => $off3,'off4' => $off4,'off5' => $off5,'off6' => $off6,'off7' => $off7));
    }

        public function indexcorrect($id)
    {
        $t01 = CapexForward::where('id',$id)->pluck('ref');
        $t11 = str_replace('[', '' , $t01);
        $t21 = str_replace(']', '' , $t11);
        $t31 = str_replace('"', '' , $t21);
        $a =  $t31;

        $t02 = CapexForward::where('id',$id)->pluck('ref3');
        $t12 = str_replace('[', '' , $t02);
        $t22 = str_replace(']', '' , $t12);
        $t32 = str_replace('"', '' , $t22);
        $b =  $t32;

        $forward = $b.$a;

        $capex = Capex::where('reference',$forward)->first();

    $off1 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->manager)->pluck('name'));
    $off2 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->superuser)->pluck('name'));
    $off3 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->supervisor)->pluck('name'));
    $off4 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->planthead)->pluck('name'));
    $off5 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->vpo)->pluck('name'));
    $off6 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->vpca)->pluck('name'));
    $off7 = preg_replace("/[^A-Z.a-z.0-9\-]/"," ", User::where('roll',Auth::user()->director)->pluck('name'));
    return view('forms.capex.newcapexcorrect', array('capex'=> $capex,'off1' => $off1,'off2' => $off2,'off3' => $off3,'off4' => $off4,'off5' => $off5,'off6' => $off6,'off7' => $off7));
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
        $approval = new Capex;
        $approval->sen = Auth::user()->roll;
        $approval->gen = Auth::user()->name;
        $approval->ref = $request->ref;
        $approval->ref2 = "CAPEX";
        $approval->ref3 = Carbon::now()->format('dmHi');
        //FORMING A UNIQUE REFERENCE FOR THE CURRENT APPROVAL
            $a =  Auth::user()->roll;
            $c =  Carbon::now()->format('dmHi');
            $conc = ($c.$a);
        $approval->reference = $conc;
        $approval->title = $request->title;
        $approval->quantity = $request->quantity;
        $approval->reason = $request->reason;
        $approval->manu = $request->manu;
        $approval->import = $request->import;
        $approval->agent = $request->agent;
        $approval->doc1 = $request->doc1;
        $approval->doc2 = $request->doc2;
        $approval->doc3 = $request->doc3;
        $approval->capacity = $request->capacity;
        $approval->base = $request->base;
        $approval->eqcost = $request->eqcost;
        $approval->duty = $request->duty;
        $approval->vattable = $request->vattable;
        $approval->electrical = $request->electrical;
        $approval->total = $request->total;
        $approval->transport = $request->transport;
        $approval->order = $request->order;
        $approval->terms = $request->terms;
        $approval->warranty = $request->warranty;
        $approval->time = $request->time;
        $approval->purpose = $request->purpose;
        $approval->repname = $request->repname;
        $approval->repold = $request->repold;
        $approval->repreason = $request->repreason;
        $approval->repmode = $request->repmode;
        $approval->capcat = $request->capcat;
        $approval->capadd = $request->capadd;
        $approval->capquality = $request->capquality;
        $approval->capred = $request->capred;
        $approval->capcomm = $request->capcomm;
        $approval->capminmaj = $request->capminmaj;
        $approval->capspe = $request->capspe;
        $approval->acplants = $request->acplants;
        $approval->acfume = $request->acfume;
        $approval->acmeasure = $request->acmeasure;
        $approval->acvoltage = $request->acvoltage;
        $approval->acoil = $request->acoil;
        $approval->acmaterial = $request->acmaterial;
        $approval->accabin = $request->accabin;
        $approval->acfurniture = $request->acfurniture;
        $approval->accivil = $request->accivil;
        $approval->acelectrical = $request->acelectrical;
        $approval->space = $request->space;
        $approval->installapprox = $request->installapprox;
        $approval->travel = $request->travel;
        $approval->maintenance = $request->maintenance;
        $approval->speinstruction = $request->speinstruction;
        $approval->training = $request->training;
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
            return redirect('/capexapproval')->with('error',"CHOOSE RECEIVERS CORRECTLY"); 
        }
//DIRECTOR IS THE FINAL APPROVER
        if($request->rec === "DIRECTOR" && $request->rec1 !== null || 
           $request->rec === "DIRECTOR" && $request->rec2 !== null ||
           $request->rec === "DIRECTOR" && $request->rec3 !== null )
        {
             return redirect('/capexapproval')->with('error','DIRECTOR HAS TO APPROVE FINALLY');  
        }
       $approval->save();

//CAPEXEFORWARDS TABLE CONTENT

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
        $approval = new CapexForward;
        $approval->sen = Auth::user()->roll;
        $approval->gen = Auth::user()->name;
        $approval->ref = $request->ref;
        $approval->ref2 = "CAPITAL";
        $approval->ref3 = Carbon::now()->format('dmHi');
        //FORMING A UNIQUE REFERENCE FOR THE CURRENT APPROVAL
            $a =  Auth::user()->roll;
            $c =  Carbon::now()->format('dmHi');
            $conc = ($c.$a);
        $approval->reference = $conc;
        $approval->title = $request->title;
        $approval->quantity = $request->quantity;
        $approval->reason = $request->reason;
        $approval->manu = $request->manu;
        $approval->import = $request->import;
        $approval->agent = $request->agent;
        $approval->doc1 = $request->doc1;
        $approval->doc2 = $request->doc2;
        $approval->doc3 = $request->doc3;
        $approval->capacity = $request->capacity;
        $approval->base = $request->base;
        $approval->eqcost = $request->eqcost;
        $approval->duty = $request->duty;
        $approval->vattable = $request->vattable;
        $approval->electrical = $request->electrical;
        $approval->total = $request->total;
        $approval->transport = $request->transport;
        $approval->order = $request->order;
        $approval->terms = $request->terms;
        $approval->warranty = $request->warranty;
        $approval->time = $request->time;
        $approval->purpose = $request->purpose;
        $approval->repname = $request->repname;
        $approval->repold = $request->repold;
        $approval->repreason = $request->repreason;
        $approval->repmode = $request->repmode;
        $approval->capcat = $request->capcat;
        $approval->capadd = $request->capadd;
        $approval->capquality = $request->capquality;
        $approval->capred = $request->capred;
        $approval->capcomm = $request->capcomm;
        $approval->capminmaj = $request->capminmaj;
        $approval->capspe = $request->capspe;
        $approval->acplants = $request->acplants;
        $approval->acfume = $request->acfume;
        $approval->acmeasure = $request->acmeasure;
        $approval->acvoltage = $request->acvoltage;
        $approval->acoil = $request->acoil;
        $approval->acmaterial = $request->acmaterial;
        $approval->accabin = $request->accabin;
        $approval->acfurniture = $request->acfurniture;
        $approval->accivil = $request->accivil;
        $approval->acelectrical = $request->acelectrical;
        $approval->space = $request->space;
        $approval->installapprox = $request->installapprox;
        $approval->travel = $request->travel;
        $approval->maintenance = $request->maintenance;
        $approval->speinstruction = $request->speinstruction;
        $approval->training = $request->training;
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
         $c01 = User::where('roll',$approval->rec)->pluck('capex');
        $c11 = str_replace('[', '' , $c01);
        $c21 = str_replace(']', '' , $c11);
        $c31 = (int)str_replace('"', '' , $c21);
        if($c31 === null)
        {
            User::where('roll',$approval->rec)->update(array('capex' => 1));
        }
        else
        {
            $count = $c31+1;
            User::where('roll',$approval->rec)->update(array('capex' => ($count)));
        }
        $approval->save(); 
        $user = User::find($a);
        Mail::to($user)->send(new CapexApproval($approval));
        $user->notify(new ApprovalNote($approval));  
        alert()->success('SUCCESS','APPROVAL SENT SUCCESSFULLY');
       return redirect('/oldapprovals/capexapproval/')->with('success','APPROVAL SENT SUCCESSFULLY');  
    }
//FOR SENDER IN OLD APPROVALS -> CAPEX APPROVALS PANEL
    public function showold($id)
    {
        $capex = Capex::find($id);
        if(Auth::user()->roll === $capex->ref)
            {
                return view('forms.capex.showcapexsen',array('capex' => $capex));
            }
        else
            {
                return redirect('/capexapproval')->with('error','NO ACCESS TO THIS PAGE');
            }
    } 

//FOR RECEIVER IN APPROVALS->CAPEX APPROVALS PANEL

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
            $approval = Forward::where('id',$id)->update(array('doc1' => $fsname));
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
            $approval = Forward::where('id',$id)->update(array('doc2' => $fsname1));
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
            $approval = Forward::where('id',$id)->update(array('doc3' => $fsname2));
        }
        else
        {
            $fsname2 = "NO FILE ATTACHED";
            $fsize2=0;
        }
            $approval = new CapexForward;
        $approval->sen = $request->sen;
        $approval->gen = $request->gen;
        $approval->ref = $request->ref;
        $approval->ref2 =$request->ref2;
        $approval->ref3 = $request->ref3;
        //FORMING A UNIQUE REFERENCE FOR THE CURRENT APPROVAL
            
        $approval->reference = $request->reference;
        $approval->title = $request->title;
        $approval->quantity = $request->quantity;
        $approval->reason = $request->reason;
        $approval->manu = $request->manu;
        $approval->import = $request->import;
        $approval->agent = $request->agent;
        $approval->doc1 = $request->doc1;
        $approval->doc2 = $request->doc2;
        $approval->doc3 = $request->doc3;
        $approval->capacity = $request->capacity;
        $approval->base = $request->base;
        $approval->eqcost = $request->eqcost;
        $approval->duty = $request->duty;
        $approval->vattable = $request->vattable;
        $approval->electrical = $request->electrical;
        $approval->total = $request->total;
        $approval->order = $request->order;
        $approval->terms = $request->terms;
        $approval->warranty = $request->warranty;
        $approval->time = $request->time;
        $approval->purpose = $request->purpose;
        $approval->repname = $request->repname;
        $approval->repold = $request->repold;
        $approval->repreason = $request->repreason;
        $approval->repmode = $request->repmode;
        $approval->capcat = $request->capcat;
        $approval->capadd = $request->capadd;
        $approval->capquality = $request->capquality;
        $approval->capred = $request->capred;
        $approval->capcomm = $request->capcomm;
        $approval->capminmaj = $request->capminmaj;
        $approval->capspe = $request->capspe;
        $approval->acplants = $request->acplants;
        $approval->acfume = $request->acfume;
        $approval->acmeasure = $request->acmeasure;
        $approval->acvoltage = $request->acvoltage;
        $approval->acoil = $request->acoil;
        $approval->acmaterial = $request->acmaterial;
        $approval->accabin = $request->accabin;
        $approval->acfurniture = $request->acfurniture;
        $approval->accivil = $request->accivil;
        $approval->acelectrical = $request->acelectrical;
        $approval->space = $request->space;
        $approval->installapprox = $request->installapprox;
        $approval->travel = $request->travel;
        $approval->maintenance = $request->maintenance;
        $approval->speinstruction = $request->speinstruction;
        $approval->training = $request->training;
        $approval->doc1 = $request->fsname;
        $approval->doc2 = $request->fsname1;
        $approval->doc3 = $request->fsname2;
             $data = request()->except(['_token']);
            $data1 = request()->except(array('_token','rec1','rec2','rec3'));

        if($fsize > 8000000 || $fsize1 > 8000000)
        {
            return back()->with('error','FILE SHOULD NOT EXCEED 10MB');   
        }

        $t01 = CapexForward::where('id',$id)->pluck('ref');
        $t11 = str_replace('[', '' , $t01);
        $t21 = str_replace(']', '' , $t11);
        $t31 = str_replace('"', '' , $t21);
        $a =  $t31;

        $t02 = CapexForward::where('id',$id)->pluck('ref3');
        $t12 = str_replace('[', '' , $t02);
        $t22 = str_replace(']', '' , $t12);
        $t32 = str_replace('"', '' , $t22);
        $b =  $t32;



        $forward = $b.$a;
        
        Capex::where('reference',$forward)->update($data);
        CapexForward::where('reference',$forward)->update($data1);

        
            $t01 = Capex::where('reference',$forward)->pluck('rec');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t31 = str_replace('"', '' , $t21);
            $a1 =  $t31;

            $t02 = Capex::where('reference',$forward)->pluck('rec1');
            $t12 = str_replace('[', '' , $t02);
            $t22 = str_replace(']', '' , $t12);
            $t32 = str_replace('"', '' , $t22);
            $b1 =   $t32;

            $t03 = Capex::where('reference',$forward)->pluck('rec2');
            $t13 = str_replace('[', '' , $t03);
            $t23 = str_replace(']', '' , $t13);
            $t23 = str_replace('"', '' , $t23);
            $c1 =  $t23;

            $t04 = Capex::where('reference',$forward)->pluck('rec3');
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


                $c01 = User::where('roll',$a1)->pluck('capex');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 === null)
                {   
                    User::where('roll',$a1)->update(array('capex' => 1));
                }
                else
                {
                    $count = $c31+1;
                    User::where('roll',$a1)->update(array('capex' => ($count)));
                }
                CapexForward::where('reference',$forward)->update(array('rec' => $a1));
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


                $c01 = User::where('roll',$b1)->pluck('capex');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 === null)
                {   
                    User::where('roll',$b1)->update(array('capex' => 1));
                }
                else
                {
                    $count = $c31+1;
                    User::where('roll',$b1)->update(array('capex' => ($count)));
                }
                CapexForward::where('reference',$forward)->update(array('rec1' => $b1));
                CapexForward::where('reference',$forward)->update(array('update1' => Carbon::now()));
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


                $c01 = User::where('roll',$c1)->pluck('capex');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 === null)
                {   
                    User::where('roll',$c1)->update(array('capex' => 1));
                }
                else
                {
                    $count = $c31+1;
                    User::where('roll',$c1)->update(array('capex' => ($count)));
                }
                CapexForward::where('reference',$forward)->update(array('rec2' => $c1));
                CapexForward::where('reference',$forward)->update(array('update2' => Carbon::now()));
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


                $c01 = User::where('roll',$d1)->pluck('capex');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 === null)
                {   
                    User::where('roll',$d1)->update(array('capex' => 1));
                }
                else
                {
                    $count = $c31+1;
                    User::where('roll',$d1)->update(array('capex' => ($count)));
                }
                CapexForward::where('reference',$forward)->update(array('rec3' => $d1));
                CapexForward::where('reference',$forward)->update(array('update3' => Carbon::now()));
            }

            alert()->success('THANK YOU','APPROVAL SENT SUCCESSFULLY');
            return redirect('/approvals/capexapproval')->with('success','APPROVAL SENT SUCCESSFULLY');

    }
    public function display($id)
    {
        $capex = CapexForward::find($id);
//TO FIND THE RECEIVERS OF THE CURRENT APPROVAL
        //$t01 = DB::table('sendapprovals')->where('reference',$approvals->reference)->pluck('rec');
        $t01 = Capex::where('reference',$capex->reference)->pluck('rec');
        $t11 = str_replace('[', '' , $t01);
        $t21 = str_replace(']', '' , $t11);
        $t31 = str_replace('"', '' , $t21);
        $a =  $t31;
                
        $t02 = Capex::where('reference',$capex->reference)->pluck('rec1');
        $t12 = str_replace('[', '' , $t02);
        $t22 = str_replace(']', '' , $t12);
        $t32 = str_replace('"', '' , $t22);
        $b =  $t32;
                
        $t03 = Capex::where('reference',$capex->reference)->pluck('rec2');
        $t13 = str_replace('[', '' , $t03);
        $t23 = str_replace(']', '' , $t13);
        $t33 = str_replace('"', '' , $t23);
        $c =  $t33;
                
        $t04 = Capex::where('reference',$capex->reference)->pluck('rec3');
        $t14 = str_replace('[', '' , $t04);
        $t24 = str_replace(']', '' , $t14);
        $t34 = str_replace('"', '' , $t24);
        $d =  $t34;

//END
//CHECHING IF THE CURRENT USER IS A RECEIVER OF CURRENT APPROVAL
        if(Auth::user()->roll === $a)
            {   
                $t01 = User::where('roll',$capex->rec)->pluck('id');
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
                $c01 = User::where('roll',$capex->rec)->pluck('capex');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 !== null)
                {
                   $count = $c31-1;
                   if($count > 0)
                   {
                        User::where('roll',$capex->rec)->update(array('capex' => ($count)));
                   }
                   else{
                    User::where('roll',$capex->rec)->update(array('capex' => (null)));
                }  
                    
                } 
                else{
                    User::where('roll',$capex->rec)->update(array('capex' => (null)));
                }  
                CapexForward::where('reference',$capex->reference)->update(array('readat1' => Carbon::now()));
                return view('forms.capex.showcapexrec', array('capex' => $capex,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d));
            }

        elseif(Auth::user()->roll === $b)
            {

                $u01 = User::where('roll',$capex->rec1)->pluck('id');
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
                $c01 = User::where('roll',$capex->rec1)->pluck('capex');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 !== null)
                {
                   $count = $c31-1;
                   if($count > 0)
                   {
                        User::where('roll',$capex->rec1)->update(array('capex' => ($count)));
                   }
                   else{
                    User::where('roll',$capex->rec1)->update(array('capex' => (null)));
                }  
                    
                } 
                else{
                    User::where('roll',$capex->rec1)->update(array('capex' => (null)));
                } 
                CapexForward::where('reference',$capex->reference)->update(array('readat2' => Carbon::now()));
                return view('forms.capex.showcapexrec', array('capex' => $capex,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d));
            }
        elseif(Auth::user()->roll === $c)
            {
                $v01 = User::where('roll',$capex->rec2)->pluck('id');
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
                $c01 = User::where('roll',$capex->rec2)->pluck('capex');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 !== null)
                {
                   $count = $c31-1;
                   if($count > 0)
                   {
                        User::where('roll',$capex->rec2)->update(array('capex' => ($count)));
                   }
                   else{
                    User::where('roll',$capex->rec2)->update(array('capex' => (null)));
                }  
                    
                } 
                else{
                    User::where('roll',$capex->rec2)->update(array('capex' => (null)));
                } 
                CapexForward::where('reference',$capex->reference)->update(array('readat3' => Carbon::now()));
                return view('forms.capex.showcapexrec', array('capex' => $capex,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d));
            }
        elseif(Auth::user()->roll === $d)
            {
                $w01 = DB::table('users')->where('roll',$capex->rec3)->pluck('id');
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
                $c01 = User::where('roll',$capex->rec3)->pluck('capex');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);
                if($c31 !== null)
                {
                   $count = $c31-1;
                   if($count > 0)
                   {
                        User::where('roll',$capex->rec3)->update(array('capex' => ($count)));
                   }
                   else{
                    User::where('roll',$capex->rec3)->update(array('capex' => (null)));
                }  
                    
                } 
                else{
                    User::where('roll',$capex->rec3)->update(array('capex' => (null)));
                } 
                CapexForward::where('reference',$capex->reference)->update(array('readat4' => Carbon::now()));
                return view('forms.capex.showcapexrec', array('capex' => $capex,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d));
            }
             else
            {
                $x01 = User::where('roll',$capex->ref)->pluck('id');
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
                
                $u01 = User::where('roll',$capex->sen)->pluck('name');
                $u11 = str_replace('[', '' , $u01);
                $u21 = str_replace(']', '' , $u11);
                $u31 = str_replace('"', '' , $u21);
                $user2 =  $u31;

                $c01 = User::where('roll',$capex->rec)->pluck('capex');
                $c11 = str_replace('[', '' , $c01);
                $c21 = str_replace(']', '' , $c11);
                $c31 = (int)str_replace('"', '' , $c21);

                $t01 = User::where('roll',$capex->rec)->pluck('id');
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
                        User::where('roll',$capex->rec)->update(array('capex' => ($count)));
                   }
                   else{
                    User::where('roll',$capex->rec)->update(array('capex' => (null)));
                }  
                    
                } 
                else{
                    User::where('roll',$capex->rec)->update(array('capex' => (null)));
                }       
                return view('forms.capex.showcapexresend', array('capex' => $capex,'user' => $user2,'rec' => $a,'rec1' => $b,'rec2' => $c,'rec3' => $d));
            }
    }
        public function PDF($id)
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
            $r1 = Capex::where('reference',$con)->pluck('id');
            $r11 = str_replace('[', '' , $r1);
            $r21 = str_replace(']', '' , $r11);
            $r31 = str_replace('"', '' , $r21);
           
            $capex = Capex::find($r31);

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
                
                $pdf = PDF::loadview('forms.capex.capexpdf',['capex' => $capex,'rec' => $a,'name' => $a1,'name1' => $b1,'name2' => $c1,'name3' => $d1,'rec1' => $b,'rec2' => $c,'rec3' => $d]);
                return $pdf->stream('capexapproval.pdf');
       
    }

    public function forward($id)
    {
        $capex = CapexForward::find($id);
        return view('forms.capex.capexforward')->with('capex',$capex);
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
            $approval = CapexForward::where('id',$id)->update(array('doc1' => $fsname));
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
            $approval = CapexForward::where('id',$id)->update(array('doc2' => $fsname1));
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
            $approval = CapexForward::where('id',$id)->update(array('doc3' => $fsname1));
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
        $approval = new CapexForward;
        $approval->sen = Auth::user()->roll;
        $approval->gen = $request->gen;
        $approval->ref = $request->ref;
        $approval->ref2 = $request->ref2;
        $approval->ref3 = $request->ref3;
        //FORMING A UNIQUE REFERENCE FOR THE CURRENT APPROVAL
            $a =  $request->ref;
            $c =  $request->ref3;
            $conc = ($c.$a);
        $approval->reference = 0;
        $approval->title = $request->title;
        $approval->quantity = $request->quantity;
        $approval->reason = $request->reason;
        $approval->manu = $request->manu;
        $approval->import = $request->import;
        $approval->agent = $request->agent;
        $approval->doc1 = $fsname;
        $approval->doc2 = $fsname1;
        $approval->doc3 = $fsname2;
        $approval->capacity = $request->capacity;
        $approval->base = $request->base;
        $approval->eqcost = $request->eqcost;
        $approval->duty = $request->duty;
        $approval->vattable = $request->vattable;
        $approval->electrical = $request->electrical;
        $approval->total = $request->total;
        $approval->transport = $request->transport;
        $approval->order = $request->order;
        $approval->terms = $request->terms;
        $approval->warranty = $request->warranty;
        $approval->time = $request->time;
        $approval->purpose = $request->purpose;
        $approval->repname = $request->repname;
        $approval->repold = $request->repold;
        $approval->repreason = $request->repreason;
        $approval->repmode = $request->repmode;
        $approval->capcat = $request->capcat;
        $approval->capadd = $request->capadd;
        $approval->capquality = $request->capquality;
        $approval->capred = $request->capred;
        $approval->capcomm = $request->capcomm;
        $approval->capminmaj = $request->capminmaj;
        $approval->capspe = $request->capspe;
        $approval->acplants = $request->acplants;
        $approval->acfume = $request->acfume;
        $approval->acmeasure = $request->acmeasure;
        $approval->acvoltage = $request->acvoltage;
        $approval->acoil = $request->acoil;
        $approval->acmaterial = $request->acmaterial;
        $approval->accabin = $request->accabin;
        $approval->acfurniture = $request->acfurniture;
        $approval->accivil = $request->accivil;
        $approval->acelectrical = $request->acelectrical;
        $approval->space = $request->space;
        $approval->installapprox = $request->installapprox;
        $approval->travel = $request->travel;
        $approval->maintenance = $request->maintenance;
        $approval->speinstruction = $request->speinstruction;
        $approval->training = $request->training;



        $t01 = Capex::where('reference',$conc)->pluck('rec');
        $t11 = str_replace('[', '' , $t01);
        $t21 = str_replace(']', '' , $t11);
        $t31 = str_replace('"', '' , $t21);
        $a = $t31;

        $t02 = Capex::where('reference',$conc)->pluck('rec1');
        $t12 = str_replace('[', '' , $t02);
        $t22 = str_replace(']', '' , $t12);
        $t23 = str_replace('"', '' , $t22);
        $b = $t23; 

        $t03 = Capex::where('reference',$conc)->pluck('rec2');
        $t13 = str_replace('[', '' , $t03);
        $t23 = str_replace(']', '' , $t13);
        $t33 = str_replace('"', '' , $t23);
        $c = $t33; 
        
        $t04 = Capex::where('reference',$conc)->pluck('rec3');
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
                return redirect('/approvals/capexapproval')->with('error','SENDER AND RECEIVER CANNOT BE SAME');
            }
            $data = $request->all();
            $approval->update($data); 
            $t01 = User::where('roll',$approval->rec)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' ,$t21);
            $b =   $t22;
            $user = User::find($b);
             $c01 = User::where('roll',$approval->rec)->pluck('capex');
        $c11 = str_replace('[', '' , $c01);
        $c21 = str_replace(']', '' , $c11);
        $c31 = (int)str_replace('"', '' , $c21);
        if($c31 === null)
        {
            User::where('roll',$approval->rec)->update(array('capex' => 1));
        }
        else
        {
            $count = $c31+1;
            User::where('roll',$approval->rec)->update(array('capex' => ($count)));
        }

            $user->notify(new ApprovalNote()); 
            Mail::to($user)->send(new CapexApproval($approval));  
            $approval = CapexForward::where('reference',$conc)->update(array('rec1' => $approval->rec));
            $approval = CapexForward::where('reference',$conc)->update(array('update1' => Carbon::now()));
            $approval = CapexForward::where('reference',$conc)->update(array('ip1' => \Request::ip()));
            alert()->success('THANK YOU','FORWARDED SUCCESSFULLY');
            return redirect('/approvals/capexapproval')->with('success','FORWARDED SUCCESSFULLY');
        }
        elseif($a === $number && (int)$b === 0)
        {
            $t01 = User::where('roll',$approval->ref)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' ,$t21);
            $b =   $t22;
            $user = User::find($b);      
            $approvals = CapexForward::where('reference',$conc)->first();
            Mail::to($user)->send(new Capexes($approval));
            $approval = CapexForward::where('reference',$conc)->update(array('update1' => Carbon::now()));
            $approval = CapexForward::where('reference',$conc)->update(array('ip1' => \Request::ip()));  
            alert()->success('THANK YOU','APPROVED SUCCESSFULLY');
            return redirect('/approvals/capexapproval')->with('success','APPROVED SUCCESSFULLY');
        }
        elseif ($b === $number && (int)$c!== 0)
        {
            $approval->rec = $c;
            if($approval->rec === $number)
            {
                return redirect('/approvals/capexapproval')->with('error','SENDER AND RECEIVER CANNOT BE SAME');
            }
            $data = $request->all();
            $approval->update($data);
            $t01 = User::where('roll',$approval->rec)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' , $t21);
            $b =   $t22;
            $user = User::find($b);
            Mail::to($user)->send(new CapexApproval($approval));
            $user->notify(new ApprovalNote()); 
             $c01 = User::where('roll',$approval->rec)->pluck('capex');
        $c11 = str_replace('[', '' , $c01);
        $c21 = str_replace(']', '' , $c11);
        $c31 = (int)str_replace('"', '' , $c21);
        if($c31 === null)
        {
            User::where('roll',$approval->rec)->update(array('capex' => 1));
        }
        else
        {
            $count = $c31+1;
            User::where('roll',$approval->rec)->update(array('capex' => ($count)));
        }
            $approval = CapexForward::where('reference',$conc)->update(array('rec2' => $approval->rec));
            $approval = CapexForward::where('reference',$conc)->update(array('update2' => Carbon::now()));
            $approval = CapexForward::where('reference',$conc)->update(array('ip2' => \Request::ip()));
            alert()->success('THANK YOU','FORWARDED SUCCESSFULLY');
            return redirect('/approvals/capexapproval')->with('success','FORWARDED SUCCESSFULLY');
        }
        elseif($b === $number && (int)$c === 0)
        {
            $t01 = User::where('roll',$approval->ref)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' ,$t21);
            $b =   $t22;
            $user = User::find($b);      
            $approvals = CapexForward::where('reference',$conc)->first();
            Mail::to($user)->send(new Capexes($approval));
            $approval = CapexForward::where('reference',$conc)->update(array('update2' => Carbon::now()));
            $approval = CapexForward::where('reference',$conc)->update(array('ip2' => \Request::ip())); 
            alert()->success('THANK YOU','APPROVED SUCCESSFULLY'); 
            return redirect('/approvals/capexapproval')->with('success','APPROVED SUCCESSFULLY'); 
        }
        elseif($c ===  $number && (int)$d!==0)
        {
            $approval->rec = $d;
            if($approval->rec === $number)
            {
                return redirect('/approvals/capexapproval')->with('error','SENDER AND RECEIVER CANNOT BE SAME');
            }
            $data = $request->all();
            $approval->update($data);
            $t01 = User::where('roll',$approval->rec)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' , $t21);
            $b =   $t22;
            $user = User::find($b);
            Mail::to($user)->send(new CapexApproval($approval));
            $user->notify(new ApprovalNote());
             $c01 = User::where('roll',$approval->rec)->pluck('capex');
        $c11 = str_replace('[', '' , $c01);
        $c21 = str_replace(']', '' , $c11);
        $c31 = (int)str_replace('"', '' , $c21);
        if($c31 === null)
        {
            User::where('roll',$approval->rec)->update(array('capex' => 1));
        }
        else
        {
            $count = $c31+1;
            User::where('roll',$approval->rec)->update(array('capex' => ($count)));
        }
            $approval = CapexForward::where('reference',$conc)->update(array('rec3' => $approval->rec));
            $approval = CapexForward::where('reference',$conc)->update(array('update3' => Carbon::now()));
            $approval = CapexForward::where('reference',$conc)->update(array('ip3' => \Request::ip()));
            alert()->success('THANK YOU','FORWARDED SUCCESSFULLY');
            return redirect('/approvals/capexapproval')->with('success','FORWARDED SUCCESSFULLY');
        }
        elseif($c ===  $number && (int)$d === 0)
        {
            $t01 = User::where('roll',$approval->ref)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' ,$t21);
            $b =   $t22;
            $user = User::find($b);      
            $approvals = CapexForward::where('reference',$conc)->first();
            Mail::to($user)->send(new Capexes($approval));
            $approval = CapexForward::where('reference',$conc)->update(array('update3' => Carbon::now()));
            $approval = CapexForward::where('reference',$conc)->update(array('ip3' => \Request::ip()));  
            alert()->success('THANK YOU','APPROVED SUCCESSFULLY');
            return redirect('/approvals/capexapproval')->with('success','APPROVED SUCCESSFULLY');
        }
        elseif($d  === $number)
        {
            $t01 = User::where('roll',$approval->ref)->pluck('id');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t22 = str_replace('"', '' ,$t21);
            $b =   $t22;
            $user = User::find($b);      
            $approvals = CapexForward::where('reference',$conc)->first();
            Mail::to($user)->send(new Capexes($approval));
            $approval = CapexForward::where('reference',$conc)->update(array('update4' => Carbon::now()));
            $approval = CapexForward::where('reference',$conc)->update(array('ip4' => \Request::ip()));
            alert()->success('THANK YOU','APPROVED SUCCESSFULLY');  
            return redirect('/approvals/capexapproval')->with('success','APPROVED SUCCESSFULLY');

        }
        else
        {
            return redirect('/approvals/capexapproval')->with('error','FAILED :-(');
        }   
    }

    public function edit($id)
    {
        $capex = CapexForward::find($id);
        return view('forms.capex.capexresend')->with('capex',$capex);
    }
    public function editsend($id,Request $request)
    {
        $approval = new CapexForward;
        $approval->sen = Auth::user()->roll;
        $approval->gen = Auth::user()->name;
        $approval->ref = $request->ref;
        $approval->ref2 = $request->ref2;
        $approval->ref3 = $request->ref3;
        //FORMING A UNIQUE REFERENCE FOR THE CURRENT APPROVAL
            $a =  $request->ref;
            $c =   Carbon::now()->format('dmHi');
            $conc = ($c.$a);
        $approval->reference = null;
        $approval->title = $request->title;
        $approval->quantity = $request->quantity;
        $approval->reason = $request->reason;
        $approval->manu = $request->manu;
        $approval->import = $request->import;
        $approval->agent = $request->agent;
        $approval->capacity = $request->capacity;
        $approval->base = $request->base;
        $approval->eqcost = $request->eqcost;
        $approval->duty = $request->duty;
        $approval->vattable = $request->vattable;
        $approval->electrical = $request->electrical;
        $approval->total = $request->total;
        $approval->order = $request->order;
        $approval->terms = $request->terms;
        $approval->warranty = $request->warranty;
        $approval->time = $request->time;
        $approval->purpose = $request->purpose;
        $approval->repname = $request->repname;
        $approval->repold = $request->repold;
        $approval->repreason = $request->repreason;
        $approval->repmode = $request->repmode;
        $approval->capcat = $request->capcat;
        $approval->capadd = $request->capadd;
        $approval->capquality = $request->capquality;
        $approval->capred = $request->capred;
        $approval->capcomm = $request->capcomm;
        $approval->capminmaj = $request->capminmaj;
        $approval->capspe = $request->capspe;
        $approval->acplants = $request->acplants;
        $approval->acfume = $request->acfume;
        $approval->acmeasure = $request->acmeasure;
        $approval->acvoltage = $request->acvoltage;
        $approval->acoil = $request->acoil;
        $approval->acmaterial = $request->acmaterial;
        $approval->accabin = $request->accabin;
        $approval->acfurniture = $request->acfurniture;
        $approval->accivil = $request->accivil;
        $approval->acelectrical = $request->acelectrical;
        $approval->space = $request->space;
        $approval->installapprox = $request->installapprox;
        $approval->travel = $request->travel;
        $approval->maintenance = $request->maintenance;
        $approval->speinstruction = $request->speinstruction;
        $approval->training = $request->training;
        $approval->doc1 = "NO FILE ATTACHED";
        $approval->doc3 = "NO FILE ATTACHED";
        $approval->doc2 = "NO FILE ATTACHED";
        $approval->des = $request->des;

         $reference = ($request->ref3.$request->ref);

            $t01 = Capex::where('reference',$reference)->pluck('rec');
            $t11 = str_replace('[', '' , $t01);
            $t21 = str_replace(']', '' , $t11);
            $t31 = str_replace('"', '' , $t21);
            $a1 =   $t31;

            $t02 = Capex::where('reference',$reference)->pluck('rec1');
            $t12 = str_replace('[', '' , $t02);
            $t22 = str_replace(']', '' , $t12);
            $t32 = str_replace('"', '' , $t22);
            $b1 =   $t32;

            $t03 = Capex::where('reference',$reference)->pluck('rec2');
            $t13 = str_replace('[', '' , $t03);
            $t23 = str_replace(']', '' , $t13);
            $t23 = str_replace('"', '' , $t23);
            $c1 =   $t23;

            $t04 = Capex::where('reference',$reference)->pluck('rec3');
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
                $c01 = User::where('roll',$approval->rec)->pluck('capex');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('capex' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('capex' => ($count)));
            }
                $user1->notify(new ResendNotification());
                $approval->save();
                CapexForward::where('reference',$reference)->where('rec',$a1)->update(array('rec' => null));
                CapexForward::where('reference',$reference)->update(array('update1' => null));
                CapexForward::where('reference',$reference)->update(array('ip1' => null));
                
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
                     $c01 = User::where('roll',$approval->rec)->pluck('capex');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('capex' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('capex' => ($count)));
            }
                $user1->notify(new ResendNotification());
                $approval->save();
                CapexForward::where('reference',$reference)->where('rec1',$b1)->update(array('rec1' => null));
                CapexForward::where('reference',$reference)->update(array('update2' => null));
                CapexForward::where('reference',$reference)->update(array('ip2' => null));
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
                 $c01 = User::where('roll',$approval->rec)->pluck('capex');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('capex' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('capex' => ($count)));
            }
                $user1->notify(new ResendNotification());
                CapexForward::where('reference',$reference)->where('rec2',$c1)->update(array('rec2' => null));
                CapexForward::where('reference',$reference)->update(array('update3' => null));
                CapexForward::where('reference',$reference)->update(array('ip3' => null));
                $approval->save();
                  
            }
            elseif(Auth::user()->roll === $d1)
            {
                $approval->rec = $c1;
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
                 $c01 = User::where('roll',$approval->rec)->pluck('capex');
            $c11 = str_replace('[', '' , $c01);
            $c21 = str_replace(']', '' , $c11);
            $c31 = (int)str_replace('"', '' , $c21);
            if($c31 === null)
            {
                User::where('roll',$approval->rec)->update(array('capex' => 1));
            }
            else
            {
                $count = $c31+1;
                User::where('roll',$approval->rec)->update(array('capex' => ($count)));
            }
                $user1->notify(new ResendNotification());
                 CapexForward::where('reference',$reference)->where('rec3',$d1)->update(array('rec3' => null));
                 
                $approval->save();
                  
            } 
          return redirect('/approvals/capexapproval')->with('success','RESENT SUCCESSFULLY');
    }
}


