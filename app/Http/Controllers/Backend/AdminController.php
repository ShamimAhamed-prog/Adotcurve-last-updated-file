<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Startup;
use App\Models\Investor;
use App\Models\Message;
use App\Models\Admin;
use App\Models\Founder;
use App\Models\Fund;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\File;
use validator;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use PDF;
use App\Models\Appointment;
use App\Models\AppointmentBooked;
use App\Models\RaiseFund;

use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function adminLoginForm(){
        return view('backend.admin.admin_Login');
    }
    public function adminProfile(){
        return view('backend.admin.adminprofile');
    }
    public function startupManager(){
        $startup = Startup::all();
        return view('backend.admin.startupManager',compact('startup'));
    }

    public function editStartup($id){
        $startup = Startup::find($id);
        if($startup){
            return response()->json(
                [
                    'status'=>200,
                    'startup'=>$startup,
                ]);
        }
        else{
            return response()->json(
                [
                    'status'=>404,
                    'message'=>'startup not found',
                ]);

        }
    }



    public function investorManager(){
        $investor = Investor::all();
        return view('backend.admin.investorManager',compact('investor'));
    }

    public function editInvestor($id){
        $investor = Investor::find($id);
        if($investor){
            return response()->json(
                [
                    'status'=>200,
                    'investor'=>$investor,
                ]);
        }
        else{
            return response()->json(
                [
                    'status'=>404,
                    'message'=>'Investor not found',
                ]);

        }
    }
    public function update_Startup(Request $request)
    {
        $id =$request->input('id');
        $startup= Startup::find($id);
        $startup->s_name = $request->s_name;
        $startup->email =$request->email;
        $startup->phone =$request->phone;
        $startup->experienced =$request->experienced;
        $startup->company_name =$request->company_name;
        $startup->company_website =$request->company_website;
        $startup->address =$request->address;
        $startup->update();
        return redirect()->back()->with('status','Startup Updated Successfully');
    }
    public function update_Investor(Request $request)
    {
        $id =$request->input('id');
        $investor= Investor::find($id);
        $investor->name = $request->name;
        $investor->email =$request->email;
        $investor->phone =$request->phone;
        $investor->designation =$request->designation;
        $investor->company_name =$request->company_name;
        $investor->company_website =$request->company_website;
        $investor->company_address =$request->company_address;
        $investor->update();
        return redirect()->back()->with('status','Investor Updated Successfully');

    }



    public function adminLogin( Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect('/admin/dashboard');

        }else{
            Session::flash('error-msg','Invalid email or password');
            return redirect()->back();
        }

    }


    public function logout(Request $request) {
        Auth::logout();
        Session::flush();
        return redirect('/login/admin');
    }



    ///////////////founder management//////////////////

    public function manageFounder() {
        $founder = Founder::all();
        return view('backend.admin.founder',compact('founder'));
    }
    public function FounderRegister(Request $request)
    {
//          return $request;

        $request->validate([
            'f_name'            =>'required',
            'email'             =>'required|email|unique:founders',
            'linkedin'          =>'required',
            'phone'             =>'required',
            'experienced'       =>'required',
            'own_portfolio'     =>'required|mimes:csv,txt,xlx,xls,pdf',
            'company_name'      =>'required',
            'company_website'   =>'required',
            'company_portfolio' =>'required|mimes:csv,txt,xlx,xls,pdf',
            'address'           =>'required',
            'photo'             =>'image|mimes:jpeg,png,jpg,gif,svg',
        ]);



        $register=new Founder();

        $register->f_name = $request->f_name;
        $register->email =$request->email;
        $register->linkedin =$request->linkedin;
        $register->phone =$request->phone;
        $register->experienced =$request->experienced;
        $file =$request->own_portfolio;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->own_portfolio->move('assets/files/',$filename);
        $register->own_portfolio=$filename;
        // $register->own_portfolio =$request->own_portfolio;
        $register->company_name =$request->company_name;
        // $register->company_portfolio =$request->company_portfolio;
        $register->company_website =$request->company_website;

        $file =$request->company_portfolio;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->company_portfolio->move('assets/files/',$filename);
        $register->company_portfolio=$filename;
        $register->address =$request->address;
        $file =$request->photo;
        $filename=time().'.'.$file->getClientOriginalName();
        $request->photo->move('assets/photos/',$filename);
        $register->photo=$filename;

        $register->save();

        return redirect()->back()->with('status', 'Account Succesfully Created');
    }
    public function FounderProfile($id) {
        $founder=Founder::where('id', $id)->get();
        return view('backend.admin.founderProfile',compact('founder'));
    }
    public function editFounder($id){
        $founder = Founder::find($id);
        if($founder){
            return response()->json(
                [
                    'status'=>200,
                    'founder'=>$founder,
                ]);
        }
        else{
            return response()->json(
                [
                    'status'=>404,
                    'message'=>'founder not found',
                ]);

        }
    }
    public function update_Founder(Request $request)
    {
        $id =$request->input('id');
        $founder= Founder::find($id);
        $founder->f_name = $request->f_name;
        $founder->email =$request->email;
        $founder->linkedin =$request->linkedin;
        $founder->phone =$request->phone;
        $founder->company_website =$request->company_website;
        $founder->address =$request->address;
        $founder->update();
        return redirect()->back()->with('status','Founder Updated Successfully');
    }
    public function StartupProject() {
          $startup =Startup::all();
          $projects = DB::table('projects')
              ->join('startups', 'startups.id', '=', 'projects.s_id')
              ->select('projects.id','p_name',  'type', 'business_idea', 'projects_goal',  'contact_person', 'projects.phone','startups.s_name')
              ->get();

        return view('backend.admin.StartupProjects',compact(['projects','startup']));
      }
      public function editProject($id){
        $projects = Project::find($id);
        if($projects){
            return response()->json(
                [
                    'status'=>200,
                    'projects'=>$projects,
                ]);
        }
        else{
            return response()->json(
                [
                    'status'=>404,
                    'message'=>'projects not found',
                ]);

        }
    }
    public function update_Project(Request $request)
    {
        $id =$request->input('id');
        $projects= Project::find($id);
        $projects->p_name = $request->p_name;
        $projects->type =$request->type;
        $projects->business_idea =$request->business_idea;
        $projects->projects_goal =$request->projects_goal;
        $projects->contact_person =$request->contact_person;
        $projects->phone =$request->phone;
        $projects->update();
        return redirect()->back()->with('status','Projects Information Updated Successfully');
    }
      public function StartupFund(Request $request) {
        $funds = DB::table('funds')
        ->join('startups', 'startups.id','=', 'funds.s_id')
        ->join('investors','investors.id','=','funds.inv_id')
        ->select('funds.id','f_ammount',  'percentage', 'status','startups.s_name','investors.name')
        ->get();
        $startup =Startup::all();
        $investor=Investor::all();
        return view('backend.admin.startupfunds',compact('funds','startup','investor'));
    }
    public function InvestorFund(){
        $raisedfunds = RaiseFund::all();
        $investor =Investor::all();
        $raisefund = DB::table('raise_funds')
            ->join('investors', 'investors.id', '=', 'raise_funds.inv_name')
            ->select('raise_funds.id','description', 'f_ammount')
            ->get();
       return view('backend.admin.investorfund',compact('investor','raisefund','raisedfunds'));
     }

    function pdf(){
        $pdf= \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_fund_data_to_html());
        return $pdf->stream();
    }

    function convert_fund_data_to_html()
    {
        $fund = DB::table('funds')
        ->join('startups', 'startups.id','=', 'funds.s_id')
        ->join('investors','investors.id','=','funds.inv_id')
        ->select('funds.id','f_ammount',  'percentage', 'status','startups.s_name','investors.name')
        ->get();
        $output = '
     <h3 align="center">Fund Data</h3>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">ID</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Investor Name</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Total Amount</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Percentage</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Startup Name:</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Status:</th>
   </tr>
     ';
        foreach($fund as $customer)
        {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->f_ammount.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->percentage.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->s_name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->status.'</td>
      </tr>
      ';
        }
        $output .= '</table>';
        return $output;
    }
    public function ApprovedFund($id) {
        $data=Fund::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back()->with('status', 'Fund Approved Successfully');
    }
    public function CanceledFund($id) {
        $data=Fund::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back()->with('status', 'Fund Canceled');
    }
    public function Appoinment(){
        $datas=Appointment::all();
    //  $data=explode(',',$datas);
    //  for($i=0; $i<sizeof($data); $i++)
    //  {
    //     echo $data[$i];
    //     echo "<br>";
    //     echo "<br>";
    //     echo "<br>";
    //  }
    return view('backend.admin.appointment',compact('datas'));
    }

    public function Appoinmentcopy(){
        $datas=Appointment::all();
        return view('backend.admin.appointmentcopy',compact('data'));
    }

    public function AddAppoinment(Request $request){

   $input = new Appointment();
   $input->slotdate = $request->input('slotdate');
   $time = $request->input('timeslot');
   foreach($time as $times)
   {
        $insert = [
            'slotdate' => $request->slotdate,
            'timeslot' => $times
        ];
        Appointment::create($insert);

   }
  return redirect()->back()->with('status','Appointment Slots Added Successfully');
}
public function StartupApointmentList(Request $request) {
     $list = DB::table('appointment_bookeds')
    ->join('startups', 'startups.id','=', 'appointment_bookeds.s_id')
    ->join('appointments','appointments.id','=','appointment_bookeds.book_id')
    ->select('appointment_bookeds.id','s_id','note','appointment_bookeds.slotdate', 'appointment_bookeds.timeslot','status','startups.s_name')
    ->get();
    $startup =Startup::all();
    $appointment= Appointment::all();
    return view('backend.admin.startupappointmentlist',compact('list','startup','appointment'));
}
public function InvestorApointmentList(Request $request) {
    $list = DB::table('appointment_bookeds')
   ->join('investors', 'investors.id','=', 'appointment_bookeds.inv_id')
   ->join('appointments','appointments.id','=','appointment_bookeds.book_id')
   ->select('appointment_bookeds.id','inv_id','note','appointment_bookeds.slotdate', 'appointment_bookeds.timeslot','status','investors.name')
   ->get();
   $investor =Investor::all();
   $appointment= Appointment::all();
   return view('backend.admin.investorappointmentlist',compact('list','investor','appointment'));
}
public function ApprovedStartupAppointment($id) {

    $approve_procedures = AppointmentBooked::all();
    $data=AppointmentBooked::find($id);
    $data->status='1';
    $data->save();

    foreach($approve_procedures as $approve_procedure)
    {
        if($data->slotdate == $approve_procedure->slotdate && $data->timeslot == $approve_procedure->timeslot )
        {
            $appointment_request = AppointmentBooked::where('timeslot','=',$data->timeslot)
                ->where('slotdate','=',$data->slotdate)
                ->where('id','!=',$id);
            $appointment_request->delete();
        }
    }
    return redirect()->back()->with('status', 'Appointment Approved Successfully');
}
public function CanceledStartupAppointment($id) {
    $data=AppointmentBooked::find($id);
    $data->status='2';
    $data->save();
    return redirect()->back()->with('status', 'Appointment Canceled');
}
public function ApprovedInvestorAppointment($id) {

    $approve_procedures = AppointmentBooked::all();
    $data=AppointmentBooked::find($id);
    $data->status='1';
    $data->save();

    foreach($approve_procedures as $approve_procedure)
    {
        if($data->slotdate == $approve_procedure->slotdate && $data->timeslot == $approve_procedure->timeslot )
        {
            $appointment_request = AppointmentBooked::where('timeslot','=',$data->timeslot)
                ->where('slotdate','=',$data->slotdate)
                ->where('id','!=',$id);
            $appointment_request->delete();
        }
    }
    return redirect()->back()->with('status', 'Appointment Approved Successfully');
}
public function CanceledInvestorAppointment($id) {
    $data=AppointmentBooked::find($id);
    $data->status='2';
    $data->save();
    return redirect()->back()->with('status', 'Appointment Canceled');
}

    public function BlogCategories(){
        $category=PostCategory::all();
        return view('backend.admin.blogcategories',compact('category'));
    }

    public function BlogCategoriesStore(Request $request){

        $request->validate([
            'c_name'            =>'required',
            'description'       =>'required',
        ]);
        $register=new PostCategory();
        $register->c_name = $request->c_name;
        $register->description =$request->description;
        $register->save();
        return redirect()->back()->with('status', 'Categories Created Successfully');
    }

// Delete Section

    public function deleteStartup($id)
    {
        $startup = Startup::find($id);

        if (unlink("assets/photos/" . $startup->photo) && unlink("assets/files/" . $startup->own_portfolio) && unlink("assets/files/" . $startup->company_portfolio)) {

            $startup->delete();
        }
        return redirect()->back()->with('status', 'Startup Info Delete Successfully.');
    }
    public function deleteInvestor($id)
    {
        $investor = Investor::find($id);
        if (unlink("assets/photos/" . $investor->photo) && unlink("assets/files/" . $investor->company_portfolio)) {

            $investor->delete();
        }
        return redirect()->back()->with('status', 'Investor Info Delete Successfully.');
    }
    public function deleteFounder($id)
    {
        $founder= Founder::find($id);

        if (unlink("assets/photos/" . $founder->photo) && unlink("assets/files/" . $founder->own_portfolio) && unlink("assets/files/" . $founder->company_portfolio)) {

            $founder->delete();
        }
        return redirect()->back()->with('status', 'Founder Info Delete Successfully.');
    }

    public function deleteProject($id)
    {
        $investor = Project::find($id);
        $investor->delete();
        return redirect()->back()->with('status', 'Project Info Delete Successfully.');
    }

}
