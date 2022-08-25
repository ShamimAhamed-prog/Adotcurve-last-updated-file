<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Startup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StartupRegisterController extends Controller
{
    public function  startupRegisterForm(){
        return view('backend.startup.StartupRegister');
    }
    public function StartupRegister(Request $request)
    {
    $request->validate([
        's_name'            =>'required',
        'email'             =>'required|email|unique:startups',
        'phone'             =>'required',
        'experienced'       =>'required',
        'own_portfolio'     =>'required|mimes:csv,txt,xlx,xls,pdf',
        'password'          =>'required',
        'company_name'      =>'required',
        'company_website'   =>'required',
        'company_portfolio' =>'required|mimes:csv,txt,xlx,xls,pdf',
        'address'           =>'required',
        'photo'             =>'image|mimes:jpeg,png,jpg,gif,svg',
    ]);
    $register=new Startup();

    $register->s_name = $request->s_name;
    $register->email =$request->email;
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
    $request->company_portfolio->move(public_path('/assets/files/'),$filename);
    $register->company_portfolio=$filename;
    $register->address =$request->address;

    $file =$request->photo;
    $filename=time().'.'.$file->getClientOriginalName();
    $request->photo->move(public_path('/assets/photos/'),$filename);
    $register->photo=$filename;

    $register->password = Hash::make($request->password);
    $register->save();


    return redirect()->back()->with('status','Startup Registration  Successfully');
    }
    }
