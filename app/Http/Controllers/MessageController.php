<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminMessage;
use App\Models\Investor;
use App\Models\Message;
use App\Models\Startup;
use App\Models\StartupMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //admin dashboard messages
    public function startupView()
    {
        $data['startups'] = Startup::all();
        return view('backend.admin.message.startup_message_send', $data);
    }
    public function startupMessageStore(Request $request)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);
        $multiple_ids = $request->startup_ids;
        $adminId = Auth::guard('admin')->user()->id;
        $adminName = Auth::guard('admin')->user()->name;
        if ($multiple_ids != null) {
            foreach ($multiple_ids as $key => $id) {
                $startupMessage = new Message();
                $startupMessage->admin_id = $adminId;
                $startupMessage->startup_id = $id;
                $startupMessage->message = $request->message;
                $startupMessage->sent_by = $adminName;
                $startupMessage->save();
            }
        }
        return redirect()->back()->with('message', 'Startup Message Send Successfully.');
    }

    public function startupMessageInbox()
    {
        $adminId = Auth::guard('admin')->user()->id;
        $messages= Message::with('startup')->OrderBy('id','DESC')->where('admin_id','=',$adminId)->get()->unique('startup_id');
        //$messages = Message::with('startup')->OrderBy('id', 'DESC')->get()->unique('startup_id');
        return view('backend.admin.message.startup_inbox', compact('messages'));
    }

    public function startupConversation(Request $request, $startup_id)
    {
        $adminId = Auth::guard('admin')->user()->id;
        $messages = Message::where('admin_id', '=',$adminId)->where('startup_id','=',$startup_id)->OrderBy('id', 'ASC')->get();
//
//        return $startup_id;
       // $messages = Message::where('startup_id', '=', $startup_id)->OrderBy('id', 'ASC')->get();

        return view('backend.admin.message.startup_conversation', compact('messages'));
    }

    public function sendStartupMessage(Request $request)
    {
        $newMessage = new Message();
        $newMessage->admin_id = $request->admin_id;
        $newMessage->startup_id = $request->startup_id;
        $newMessage->sent_by = $request->sent_by;
        $newMessage->message = $request->message;

        $newMessage->save();
        return redirect()->back();
    }

    //-------------------------------------------startup dashboard Section------------------------------------------
    public function adminView()
    {
        $data['admins'] = Admin::all();
        return view('backend.startup.message.admin_message_send', $data);
    }

    public function adminMessageStore(Request $request)
    {
        //return $request;

        $this->validate($request, [
            'message' => 'required'
        ]);
        $multiple_ids = $request->admin_ids;
        $startupId = Auth::guard('startup')->user()->id;
        $startupName = Auth::guard('startup')->user()->name;
        if ($multiple_ids != null) {
            foreach ($multiple_ids as $key => $id) {
                $adminMessage = new Message();
                $adminMessage->startup_id = $startupId;
                $adminMessage->admin_id = $id;
                $adminMessage->message = $request->message;
                $adminMessage->sent_by = $startupName;
                $adminMessage->save();
//                return $adminMessage;
            }
        }
        return redirect()->back()->with('message','Admin Message Send Successfully.');

    }
    public function adminInbox()
    {
        $startupId = Auth::guard('startup')->user()->id;
        $messages= Message::with('admin')->OrderBy('id','DESC')->where('startup_id','=',$startupId)->get()->unique('admin_id');
//        dd($messages);
        return view('backend.startup.message.admin_index',compact('messages'));
    }

    public function adminConversation(Request $request, $adminId)
    {
        $startupId = Auth::guard('startup')->user()->id;
        $messages = Message::where('startup_id', '=',$startupId)->where('admin_id','=',$adminId)->OrderBy('id', 'ASC')->get();
//        dd($messages);
        return view('backend.startup.message.admin_conversation', compact('messages'));
    }

    public function sendAdminMessage(Request $request)
    {
        $newMessage = new Message();
        $newMessage->admin_id = $request->admin_id;
        $newMessage->startup_id = $request->startup_id;
        $newMessage->sent_by = $request->sent_by;
        $newMessage->message = $request->message;
        $newMessage->save();
        return redirect()->back();
    }

    // Investor Message

    public function investorView()
    {
        $data['investors'] = Investor::all();
        return view('backend.admin.message.investor.investor_message_send',$data);
    }

    public function investorMessageStore(Request $request)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);
        $multiple_ids = $request->investor_ids;
        $adminId = Auth::guard('admin')->user()->id;
        $adminName = Auth::guard('admin')->user()->name;
        if ($multiple_ids != null) {
            foreach ($multiple_ids as $key => $id) {
                $investorMessage = new Message();
                $investorMessage->admin_id = $adminId;
                $investorMessage->investor_id  = $id;
                $investorMessage->message = $request->message;
                $investorMessage->sent_by = $adminName;
                $investorMessage->save();
            }
        }
        return redirect()->back()->with('message', 'Investor Message Send Successfully.');
    }

    public function investorMessageInbox()
    {
        $adminId = Auth::guard('admin')->user()->id;
        $messages= Message::with('investor')->OrderBy('id','DESC')->where('admin_id','=',$adminId)->get()->unique('investor_id');
      //  $messages = Message::with('investor')->OrderBy('id', 'DESC')->get()->unique('investor_id');
        return view('backend.admin.message.investor.investor_inbox', compact('messages'));
    }

    public function investorConversation(Request $request, $investorId)
    {
        $adminId = Auth::guard('admin')->user()->id;
        $messages = Message::where('investor_id', '=',$investorId)->where('admin_id','=',$adminId)->OrderBy('id', 'ASC')->get();
       // $messages = Message::where('investor_id', '=', $investor_id)->OrderBy('id', 'ASC')->get();

        return view('backend.admin.message.investor.investor_conversation', compact('messages'));
    }

    public function sendInvestorMessage(Request $request)
    {
        $newMessage = new Message();
        $newMessage->admin_id = $request->admin_id;
        $newMessage->investor_id = $request->investor_id;
        $newMessage->sent_by = $request->sent_by;
        $newMessage->message = $request->message;

        $newMessage->save();
        return redirect()->back();
    }

//    ----------------------------------------------Investor Section------------------------------------------------------------------
    public function investorAdminView()
    {
        $data['admins'] = Admin::all();
        return view('backend.investor.message.admin.admin_message_send', $data);
    }

    public function InvestorAdminMessageStore(Request $request)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);
        $multiple_ids = $request->admin_ids;
        $investorId = Auth::guard('investor')->user()->id;
        $investorName = Auth::guard('investor')->user()->name;
        if ($multiple_ids != null) {
            foreach ($multiple_ids as $key => $id) {
                $adminMessage = new Message();
                $adminMessage->investor_id = $investorId;
                $adminMessage->admin_id = $id;
                $adminMessage->message = $request->message;
                $adminMessage->sent_by = $investorName;
                $adminMessage->save();
//                return $adminMessage;
            }
        }
        return redirect()->back()->with('message','Admin Message Send Successfully.');
    }

    public function investorAdminInbox()
    {
        $investorId = Auth::guard('investor')->user()->id;
        $messages= Message::with('admin')->OrderBy('id','DESC')->where('investor_id','=',$investorId)->get()->unique('admin_id');
        return view('backend.investor.message.admin.admin_index',compact('messages'));
    }

    public function investorAdminConversation(Request $request, $adminId)
    {
        $investorId = Auth::guard('investor')->user()->id;
        $messages = Message::where('investor_id', '=',$investorId)->where('admin_id','=',$adminId)->OrderBy('id', 'ASC')->get();
//        $messages = Message::where('admin_id', '=', $admin_id)->OrderBy('id', 'ASC')->get();

        return view('backend.investor.message.admin.admin_conversation', compact('messages'));
    }

    public function investorSendAdminMessage(Request $request)
    {
        $newMessage = new Message();
        $newMessage->admin_id = $request->admin_id;
        $newMessage->investor_id = $request->investor_id;
        $newMessage->sent_by = $request->sent_by;
        $newMessage->message = $request->message;
        $newMessage->save();
        return redirect()->back();
    }

    // Startup To Investor

    public function startupInvestorView()
    {
        $data['investors'] = Investor::all();
        return view('backend.startup.message.investor.investor_message_send',$data);
    }

    public function startupInvestorMessageStore(Request $request)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);
        $multiple_ids = $request->investor_ids;
        $startupId = Auth::guard('startup')->user()->id;
        $startupName = Auth::guard('startup')->user()->name;
        if ($multiple_ids != null) {
            foreach ($multiple_ids as $key => $id) {
                $investorMessage = new Message();
                $investorMessage->startup_id = $startupId;
                $investorMessage->investor_id  = $id;
                $investorMessage->message = $request->message;
                $investorMessage->sent_by = $startupName;
                $investorMessage->save();
            }
        }
        return redirect()->back()->with('message', 'Investor Message Send Successfully.');
    }

    public function startupInvestorInbox()
    {
        $startupId = Auth::guard('startup')->user()->id;
        $messages= Message::with('investor')->OrderBy('id','DESC')->where('startup_id','=',$startupId)->get()->unique('investor_id');
        return view('backend.startup.message.investor.investor_inbox', compact('messages'));
    }

    public function startupInvestorConversation(Request $request, $investorId)
    {

        $startupId = Auth::guard('startup')->user()->id;
        $messages = Message::where('startup_id', '=',$startupId)->where('investor_id','=',$investorId)->OrderBy('id', 'ASC')->get();


        return view('backend.startup.message.investor.investor_conversation', compact('messages'));
    }

    public function startupSendInvestorMessage(Request $request)
    {
        $newMessage = new Message();
        $newMessage->startup_id = $request->startup_id;
        $newMessage->investor_id = $request->investor_id;
        $newMessage->sent_by = $request->sent_by;
        $newMessage->message = $request->message;

        $newMessage->save();
        return redirect()->back();
    }

    // Investor To Startup

    public function investorStartupView()
    {
        $data['startups'] = Startup::all();
        return view('backend.investor.message.startup.startup_message_send', $data);
    }

    public function InvestorStartupMessageStore(Request $request)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);
        $multiple_ids = $request->startup_ids;
        $investorId = Auth::guard('investor')->user()->id;
        $investorName = Auth::guard('investor')->user()->name;
        if ($multiple_ids != null) {
            foreach ($multiple_ids as $key => $id) {
                $startupMessage = new Message();
                $startupMessage->investor_id = $investorId;
                $startupMessage->startup_id = $id;
                $startupMessage->message = $request->message;
                $startupMessage->sent_by = $investorName;
                $startupMessage->save();
            }
        }
        return redirect()->back()->with('message', 'Startup Message Send Successfully.');
    }

    public function investorStartupInbox()
    {
        $investorId = Auth::guard('investor')->user()->id;
        $messages= Message::with('startup')->OrderBy('id','DESC')->where('investor_id','=',$investorId)->get()->unique('startup_id');
        return view('backend.investor.message.startup.startup_inbox', compact('messages'));
    }

    public function investorStartupConversation(Request $request, $startup_id)
    {
        $investorId = Auth::guard('investor')->user()->id;
        $messages = Message::where('investor_id', '=', $investorId)->where('startup_id','=',$startup_id)->OrderBy('id', 'ASC')->get();

        // $messages = Message::where('startup_id', '=', $startup_id)->OrderBy('id', 'ASC')->get();

        return view('backend.investor.message.startup.startup_conversation', compact('messages'));
    }

    public function investorSendStartupMessage(Request $request)
    {
        $newMessage = new Message();
        $newMessage->investor_id = $request->investor_id;
        $newMessage->startup_id = $request->startup_id;
        $newMessage->sent_by = $request->sent_by;
        $newMessage->message = $request->message;

        $newMessage->save();
        return redirect()->back();
    }
}
