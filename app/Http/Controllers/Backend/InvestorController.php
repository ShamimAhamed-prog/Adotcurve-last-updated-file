<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Project;
use App\Models\Fund;
use App\Models\Investor;
use App\Models\RaiseFund;
use Illuminate\Support\Facades\DB;
Use App\Models\Appointment;
use App\Models\AppointmentBooked;
class InvestorController extends Controller
{
    public function investorLoginForm(){
        return view('backend.investor.investor_Login');
    }
    public function investorProfile(){
        return view('backend.investor.profile');
     }
     public function ManageProjects() {
        $project = Project::all();
        return view('backend.investor.projects',compact('project'));
      }

      public function ManageFunds(){
        $investorId = Auth::guard('investor')->user()->id;
        $funds = Fund::where('inv_id', '=', $investorId )->OrderBy('id', 'ASC')->get();
        $raisedfunds = RaiseFund::where('inv_name', '=', $investorId )->OrderBy('id', 'ASC')->get();
        $investor =Investor::all();
        $raisefund = DB::table('raise_funds')
            ->join('investors', 'investors.id', '=', 'raise_funds.inv_name')
            ->select('raise_funds.id','description', 'f_ammount')
            ->get();
       return view('backend.investor.funds',compact('funds','investor','raisefund','raisedfunds'));
     }
     public function InvestorAppointment(Request $req){
        $data = Appointment::where('slotdate',$req->slotdate)->get();
        return view('backend.investor.book_appointment',compact('data'));
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
     public function InvestorAppointmentList(){
        $investorID = Auth::guard('investor')->user()->id;
        $list = AppointmentBooked::where('inv_id', '=', $investorID)->OrderBy('id', 'ASC')->get();
        return view('backend.investor.appointmentlist',compact('list'));
    }
     public function RaiseFund(Request $request)
     {
     $register=new RaiseFund();
     $register->inv_name = $request->inv_name;
     $register->f_ammount =$request->f_ammount;
     $register->description =$request->description;
     $register->save();
     return redirect()->back()->with('status', 'New Fund Created Succesfully');
     }
    public function investorLogin( Request $request){
         $request->validate([
             'email'=>'required',
             'password'=>'required',
         ]);

         if(Auth::guard('investor')->attempt(['email'=>$request->email, 'password'=>$request->password, 'is_investor'=>1])){
             return redirect('/investor/dashboard');

         }else{
             Session::flash('error-msg','Invalid email or password');
             return redirect()->back();
         }

    }
}
