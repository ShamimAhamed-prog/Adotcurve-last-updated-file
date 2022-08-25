<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvestorDashboardController extends Controller
{
    public function investorDashboard(){
        return view('backend.investor.investor_Dashboard');
    }
}
