<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Startup;
use App\Models\Project;
use App\Models\Fund;
use App\Models\Investor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;
use App\Models\AppointmentBooked;
class StartupController extends Controller
{
    public function startupLoginForm(){
        return view('backend.startup.startup_Login');
    }
    public function startupProfile(){
       return view('backend.startup.profile');
    }

    public function startupLogin( Request $request){
         $request->validate([
             'email'=>'required',
             'password'=>'required',
         ]);

         if(Auth::guard('startup')->attempt(['email'=>$request->email, 'password'=>$request->password, 'is_startup'=>1])){
             return redirect('/startup/dashboard');

         }else{
             Session::flash('error-msg','Invalid email or password');
             return redirect()->back();
         }


    }
    public function StartupAppointment(Request $req){
        $data = Appointment::where('slotdate',$req->slotdate)->get();
        return view('backend.startup.book_appointment',compact('data'));
    }
    public function bookAppointment($id){
        $data = Appointment::find($id);
        if($data){
            return response()->json(
                [
                    'status'=>200,
                    'data'=>$data,
                ]);
        }
        else{
            return response()->json(
                [
                    'status'=>404,
                    'message'=>'Data not found',
                ]);

        }
    }
    public function AppointmentBooking(Request $request)
    {
    $register=new AppointmentBooked();
    $register->inv_id = $request->inv_id;
    $register->s_id = $request->s_id;
    $register->note =$request->note;
    $register->slotdate =$request->slotdate;
    $register->timeslot =$request->timeslot;
    $register->book_id =$request->book_id;
    $register->save();
    return redirect()->back()->with('status', 'Appointment Booked Succesfully');
    }
        
    public function AppointmentList(){
        $startupID = Auth::guard('startup')->user()->id;
        $list = AppointmentBooked::where('s_id', '=', $startupID)->OrderBy('id', 'ASC')->get();
        return view('backend.startup.appointmentlist',compact('list'));
    }
    public function ManageProjects(){
         $startupID = Auth::guard('startup')->user()->id;
         $project = Project::where('s_id', '=', $startupID)->OrderBy('id', 'ASC')->get();
         return view('backend.startup.projects',compact('project'));
     }
     public function ManageFunds(){
        $startupID = Auth::guard('startup')->user()->id;
        $funds = DB::table('funds')
        ->join('startups', 'startups.id','=', 'funds.s_id')
        ->join('investors','investors.id','=','funds.inv_id')
        ->select('funds.id','f_ammount',  'percentage', 'status','startups.s_name','investors.name')->where('s_id', '=', $startupID)->OrderBy('id', 'ASC')
        ->get();
        // $funds = Fund::where('s_id', '=', $startupID)->OrderBy('id', 'ASC')->get();
        $investor=Investor::all();
       return view('backend.startup.funds',compact('funds','investor'));
     }


     public function ProjectsAdd(Request $request)
     {
//         return $request;

     $request->validate([
         'p_name'           =>'required',
         'type'             =>'required',
         'business_idea'    =>'required',
         'projects_goal'    =>'required',
         'contact_person'   =>'required',
         'phone'            =>'required',
//         's_name'           =>'required',
         's_id'           =>'required',

     ]);

     $register=new Project();
     $register->p_name = $request->p_name;
     $register->type =$request->type;
     $register->business_idea =$request->business_idea;
     $register->projects_goal =$request->projects_goal;
     $register->contact_person =$request->contact_person;
     $register->phone =$request->phone;
//     $register->s_name =$request->s_name;
     $register->s_id =$request->s_id;
     $register->save();
     return redirect()->back()->with('status', 'Account Succesfully Created');
     }
     public function FundsAdd(Request $request)
     {
//     $request->validate([
//         'f_ammount'            =>'required',
//         'percentage'           =>'required',
//
//     ]);
     $register=new Fund();
     $register->inv_id =$request->inv_id;
     $register->f_ammount =$request->f_ammount;
     $register->percentage =$request->percentage;
     $register->s_id =$request->s_id;
     $register->save();
     return redirect()->back()->with('status', 'Fund Request Created Succesfully');
     }
     public function logoutStartup(Request $request) {
         Auth::logout();
         Session::flush();
         return redirect('/login/startup');
       }

 }

