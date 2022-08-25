<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class InvestorRegisterController extends Controller
{
    public function  investorRegisterForm(){
        return view('backend.investor.InvestorRegister');
    }

    public function InvestorRegister(Request $request)
    {
    $request->validate([
        'name'              =>'required',
        'email'             =>'required|email|unique:investors',
        'phone'             =>'required',
        'designation'       =>'required',
        'password'          =>'required',
        'company_name'      =>'required',
        'company_website'   =>'required',
        'company_portfolio' =>'required|mimes:csv,txt,xlx,xls,pdf',
        'company_address'   =>'required',
        'photo'             =>'image|mimes:jpeg,png,jpg,gif,svg',
    ]);
    $register=new Investor();

    $register->name = $request->name;
    $register->email =$request->email;
    $register->phone =$request->phone;
    $register->designation =$request->designation;
    $register->company_name =$request->company_name;
    $register->company_website =$request->company_website;
    $file =$request->company_portfolio;
    $filename=time().'.'.$file->getClientOriginalName();
    $request->company_portfolio->move('assets/files/',$filename);
    $register->company_portfolio=$filename;
    $register->company_address =$request->company_address;

    $file =$request->photo;
    $filename=time().'.'.$file->getClientOriginalName();
    $request->photo->move('assets/photos/',$filename);
    $register->photo=$filename;

    $register->password = Hash::make($request->password);

    $register->save();

    return redirect()->back()->with('status','Investor Registration  Successfully');
    }
}
