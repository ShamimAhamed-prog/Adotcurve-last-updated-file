<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Startup;

class StartupDashboardController extends Controller
{
    public function startupDashboard(){
        $startup = Startup::all();
        return view('backend.startup.startup_Dashboard',compact('startup'));
    }
}